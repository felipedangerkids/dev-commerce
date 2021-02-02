<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Mails;
use Ramsey\Uuid\Uuid;
use App\Mail\UserCompra;
use App\Models\Shipping;
use App\Mail\AdminCompra;
use App\Models\UserOrder;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Joelsonm\Correios\Correios;
use App\Payment\PagSeguro\Boleto;
use FlyingLuscas\Correios\Client;
use FlyingLuscas\Correios\Service;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Payment\PagSeguro\CreditCard;
use App\Payment\PagSeguro\Notification;

class CheckoutController extends Controller
{

    public $result2;


    public function index()
    {


        $items = \Cart::getContent();
        $cartTqty = \Cart::getTotalQuantity();
        $total = \Cart::getTotal();


        $this->makePagSeguroSession();



        // session()->forget('pagseguro_session_code');

        session()->get('pagseguro_session_code');

        return view('site.checkout', compact('items', 'cartTqty', 'total'));
    }


    public function proccess(Request $request)
    {
        try {

            $dataPost = $request->all();
            // dd($dataPost);
            $items = \Cart::getContent();
            $cartTqty = \Cart::getTotalQuantity();
            $cartTotal = \Cart::getTotal();
            $user = auth()->user();
            $reference = Uuid::uuid4();

            $creditCardPayment = new CreditCard($items, $user, $dataPost, $reference, $cartTqty);

            $result = $creditCardPayment->doPayment();

            $userOrder = [
                'reference' => $reference,
                'pagseguro_code' => $result->getCode(),
                'pagseguro_status' => $result->getStatus(),
                'items' => serialize($items),
                'endereco' => serialize($dataPost),
                'total' =>  $cartTotal
            ];

            $shipping = [

                'metodo' => $dataPost['metodo'],
                'cep' => $dataPost['cep'],
                'rua' => $dataPost['rua'],
                'numero' => $dataPost['numero'],
                'cidade' => $dataPost['cidade'],
                'uf' => $dataPost['uf'],
                'bairro' => $dataPost['bairro'],
                'complemento' => $dataPost['complemento'],

            ];


            $user->orders()->create($userOrder)->shippings()->create($shipping);


            $mails = new Mails();
            $mails['name'] = auth()->user()->name;
            $mails['email'] = auth()->user()->email;
            $mails['assunto'] = "Compra efetuada pelo site";
            $mails['dd'] = $dataPost['dd'];
            $mails['telefone'] = $dataPost['telefone'];
            $mails['mensagem1'] = $items;
            $mails['metodo'] = $dataPost['metodo'];
            $mails['cep'] = $dataPost['cep'];
            $mails['rua'] = $dataPost['rua'];
            $mails['numero'] = $dataPost['numero'];
            $mails['cidade'] = $dataPost['cidade'];
            $mails['uf'] = $dataPost['uf'];
            $mails['bairro'] = $dataPost['bairro'];
            $mails['complemento'] = $dataPost['complemento'];

            Mail::to('felipephplow@gmail.com')->send(new AdminCompra($mails));

            $mails = new Mails();
            $mails['name'] = auth()->user()->name;
            $mails['email'] = auth()->user()->email;
            $mails['assunto'] = "Compra efetuada pelo site";
            $mails['mensagem1'] = $items;
            $mails['metodo'] = $dataPost['metodo'];
            $mails['cep'] = $dataPost['cep'];
            $mails['rua'] = $dataPost['rua'];
            $mails['numero'] = $dataPost['numero'];
            $mails['cidade'] = $dataPost['cidade'];
            $mails['uf'] = $dataPost['uf'];
            $mails['bairro'] = $dataPost['bairro'];
            $mails['complemento'] = $dataPost['complemento'];

            Mail::to(auth()->user()->email)->send(new UserCompra($mails));


            session()->forget('pagseguro_session_code');
            \Cart::clear();

            return response()->json([
                'data' => [
                    'status' => true,
                    'message' => 'Pedido criado com sucesso',
                    'order' => $reference
                ]
            ]);
        } catch (\Exception $e) {

            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar pedido';

            return response()->json([
                'data' => [
                    'status' => false,
                    'message' => $message
                ]
            ], 401);
        }
    }
    public function proccessBoleto(Request $request)
    {
        try {

            $dataPost = $request->all();
            // dd($dataPost);
            $items = \Cart::getContent();
            $cartTqty = \Cart::getTotalQuantity();
            $user = auth()->user();
            $reference = Uuid::uuid4();

            $creditCardPayment = new Boleto($items, $user, $dataPost, $reference, $cartTqty);

            $result = $creditCardPayment->doPayment();
            $linkBoleto = $result->getPaymentLink();
            $userOrder = [
                'reference' => $reference,
                'pagseguro_code' => $result->getCode(),
                'pagseguro_status' => $result->getStatus(),
                'items' => serialize($items),
                'endereco' => serialize($dataPost),
                'link_boleto' => $linkBoleto
            ];

            $shipping = [

                'metodo' => $dataPost['metodo'],
                'cep' => $dataPost['cep'],
                'rua' => $dataPost['rua'],
                'numero' => $dataPost['numero'],
                'cidade' => $dataPost['cidade'],
                'uf' => $dataPost['uf'],
                'bairro' => $dataPost['bairro'],
                'complemento' => $dataPost['complemento'],

            ];


            $user->orders()->create($userOrder)->shippings()->create($shipping);

            $mails = new Mails();
            $mails['name'] = auth()->user()->name;
            $mails['email'] = auth()->user()->email;
            $mails['assunto'] = "Compra efetuada pelo site";
            $mails['dd'] = $dataPost['dd'];
            $mails['telefone'] = $dataPost['telefone'];
            $mails['mensagem1'] = $items;
            $mails['metodo'] = $dataPost['metodo'];
            $mails['cep'] = $dataPost['cep'];
            $mails['rua'] = $dataPost['rua'];
            $mails['numero'] = $dataPost['numero'];
            $mails['cidade'] = $dataPost['cidade'];
            $mails['uf'] = $dataPost['uf'];
            $mails['bairro'] = $dataPost['bairro'];
            $mails['complemento'] = $dataPost['complemento'];

            Mail::to('felipephplow@gmail.com')->send(new AdminCompra($mails));

            $mails = new Mails();
            $mails['name'] = auth()->user()->name;
            $mails['email'] = auth()->user()->email;
            $mails['assunto'] = "Compra efetuada pelo site";
            $mails['mensagem1'] = $items;
            $mails['metodo'] = $dataPost['metodo'];
            $mails['cep'] = $dataPost['cep'];
            $mails['rua'] = $dataPost['rua'];
            $mails['numero'] = $dataPost['numero'];
            $mails['cidade'] = $dataPost['cidade'];
            $mails['uf'] = $dataPost['uf'];
            $mails['bairro'] = $dataPost['bairro'];
            $mails['complemento'] = $dataPost['complemento'];

            Mail::to(auth()->user()->email)->send(new UserCompra($mails));



            session()->forget('pagseguro_session_code');
            \Cart::clear();

            return response()->json([
                'data' => [
                    'status' => true,
                    'message' => 'Pedido criado com sucesso',
                    'order' => $reference,
                    'link' => $linkBoleto
                ]
            ]);
        } catch (\Exception $e) {

            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar pedido';

            return response()->json([
                'data' => [
                    'status' => false,
                    'message' => $message
                ]
            ], 401);
        }
    }
    public function thanks()
    {
        return view('site.thanks');
    }

    public function notification()
    {
        try {
            $notification = new Notification();
            $notification = $notification->getTransaction();

            $userOrder = UserOrder::whereReference($notification->getReference());
            $userOrder->update([
                'status' => $notification->getStatus()
            ]);

            if ($notification->getStatus == 3) {
            }
            return response()->json([], 203);
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }

    public function correios(Request $request)
    {
        $items = \Cart::getContent();
        $cartTqty = \Cart::getTotalQuantity();
        $cartTotal = \Cart::getTotal();



        $cep = $request->input('cep');
        $correios = new Client;

        $result = $correios->zipcode()
            ->find($cep);
        $result2 = $correios->freight()
            ->origin('83413-678')
            ->destination($cep)
            ->services(Service::SEDEX, Service::PAC)
            ->item(16, 16, 16, 2, 1) // largura, altura, comprimento, peso e quantidade
            // ->item(16, 10, 10, .3, 3) // largura, altura, comprimento, peso e quantidade
            // ->item(10, 10, 10, .3, 2) // largura, altura, comprimento, peso e quantidade
            ->calculate();


        return [$result, $result2, $items, $cartTqty, $cartTotal];
    }

    private function makePagSeguroSession()
    {

        if (!session()->has('pagseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
            return session()->put('pagseguro_session_code', $sessionCode->getResult());
        }
    }
    public function rodonaves()
    {
        $config = [];
    }
}
