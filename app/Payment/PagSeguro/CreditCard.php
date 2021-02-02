<?php

namespace App\Payment\PagSeguro;

use Darryldecode\Cart\Cart;

class CreditCard 
{

       private $items;
       private $user;
       private $cardInfo;
       private $reference;
       private $cartTqty;
   
       
       
       public function __construct($items, $user, $cardInfo, $reference, $cartTqty)
       {
            $this->items = $items;
            $this->user = $user;
            $this->cardInfo = $cardInfo;
            $this->reference = $reference;
            $this->cartTqty = $cartTqty;
          
       }

       public function doPayment()
       {
           

            $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

            $creditCard->setReceiverEmail(env('PAGSEGURO_EMAIL'));

            $creditCard->setReference($this->reference);

            // Set the currency
            $creditCard->setCurrency("BRL");

            

            foreach ($this->items as $item) {
                  $creditCard->addItems()->withParameters(
                        $item->id,
                        $item->name,
                        $item->quantity,
                        $item->price,
                       
                  );
            }

            $user = $this->user;
            $email = env('PAGSEGURO_ENV') == 'sandbox' ? 'test@sandbox.pagseguro.com.br' : $user->email;

            $creditCard->setSender()->setName($user->name);
            $creditCard->setSender()->setEmail($email);

            $creditCard->setSender()->setPhone()->withParameters(
                  11,
                  56273440
            );

            $creditCard->setSender()->setDocument()->withParameters(
                  'CPF',
                  '32287384006'
            );

            $creditCard->setSender()->setHash($this->cardInfo['hash']);

            $creditCard->setSender()->setIp('127.0.0.0');

            // Set shipping information for this payment request
            $creditCard->setShipping()->setAddress()->withParameters(
                  $this->cardInfo['rua'],
                  $this->cardInfo['numero'],
                  $this->cardInfo['bairro'],
                  $this->cardInfo['cep'],
                  $this->cardInfo['cidade'],
                  $this->cardInfo['uf'],
                  'BRA',
                  $this->cardInfo['complemento']
            );

            //Set billing information for credit card
            $creditCard->setBilling()->setAddress()->withParameters(
                  $this->cardInfo['rua'],
                  $this->cardInfo['numero'],
                  $this->cardInfo['bairro'],
                  $this->cardInfo['cep'],
                  $this->cardInfo['cidade'],
                  $this->cardInfo['uf'],
                  'BRA',
                  $this->cardInfo['complemento']
            );

            $creditCard->setShipping()->setCost()->withParameters($this->cardInfo['shipping']);
            $creditCard->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);
            
            $creditCard->setToken($this->cardInfo['card_token']);

            list($quantity, $installmentAmount) = explode('|', $this->cardInfo['installment']);

            $installmentAmount = number_format($installmentAmount, 2, '.', '');
            $creditCard->setInstallment()->withParameters($quantity, $installmentAmount);

            $creditCard->setHolder()->setBirthdate($this->cardInfo['birth_date']);
            $creditCard->setHolder()->setName($this->cardInfo['card_name']); // Equals in Credit Card

            $creditCard->setHolder()->setPhone()->withParameters(
                  $this->cardInfo['dd'],
                  str_replace('-', '', $this->cardInfo['telefone'])
            );

            $creditCard->setHolder()->setDocument()->withParameters(
                  'CPF',
                  $this->cardInfo['card_cpf']
            
            );

            // Set the Payment Mode for this payment request
            $creditCard->setMode('DEFAULT');

            $result = $creditCard->register(
                  \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
            
            return $result;
       }
}