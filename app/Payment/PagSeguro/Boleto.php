<?php

namespace App\Payment\PagSeguro;

class Boleto
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
            $boleto = new \PagSeguro\Domains\Requests\DirectPayment\Boleto();

            $boleto->setMode('DEFAULT');
            $boleto->setReceiverEmail(env('PAGSEGURO_EMAIL'));
            $boleto->setCurrency("BRL");

            foreach ($this->items as $items) {
                  $boleto->addItems()->withParameters(
                        $items->id,
                        $items->name,
                        $items->quantity,
                        $items->price
                  );
            }

            $boleto->setReference($this->reference);

            // $boleto->setExtraAmount(11.5);

            $user = $this->user;
            $email = env('PAGSEGURO_ENV') == 'sandbox' ? 'test@sandbox.pagseguro.com.br' : $user->email;

            $boleto->setSender()->setName(auth()->user()->name);
            $boleto->setSender()->setEmail($email);

            $boleto->setSender()->setPhone()->withParameters(
                  $this->cardInfo['dd'],
                  str_replace('-', '', $this->cardInfo['telefone'])
            );

            $cpf = str_replace('.', '', $this->cardInfo['card_cpf']);
            $cpf = str_replace('-', '', $cpf);

            $boleto->setSender()->setDocument()->withParameters(
                  'CPF',
                  $cpf
            );

            $boleto->setSender()->setHash($this->cardInfo['hash']);
            $boleto->setSender()->setIp('127.0.0.0');

            // Set shipping information for this payment request
            $boleto->setShipping()->setAddress()->withParameters(
                  $this->cardInfo['rua'],
                  $this->cardInfo['numero'],
                  $this->cardInfo['bairro'],
                  $this->cardInfo['cep'],
                  $this->cardInfo['cidade'],
                  $this->cardInfo['uf'],
                  'BRA',
                  $this->cardInfo['complemento']
            );

            $boleto->setShipping()->setCost()->withParameters($this->cardInfo['shipping']);
            $boleto->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

            $result = $boleto->register(
                  \PagSeguro\Configuration\Configure::getAccountCredentials()
            );

            return $result;
      }

}