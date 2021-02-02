@extends('layouts.site')

@section('content')

<div class="my-5">
      <div class="container">
            <div class="row">
                  <div class="@if(auth()->check()) d-none @endif" id="log">
                        <h1>Login</h1>
                        <form id="form-login">
                              @csrf
                              <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input name="email" type="email" class="form-control" id="email"
                                          aria-describedby="emailHelp">

                              </div>
                              <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input name="password" type="password" class="form-control" id="password">
                              </div>

                              <button type="submit" class="btn btn-primary btnLogin">Entrar</button>
                        </form>
                  </div>
                  <div class="@if(auth()->check()) d-none @endif" id="reg">
                        <h1>Registrar</h1>
                        <form>
                              <div class="form-group">
                                    <label for="exampleInputEmail1">Nome e Sobrenome</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                          aria-describedby="emailHelp">

                              </div>
                              <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                          aria-describedby="emailHelp">

                              </div>
                              <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" name="password" class="form-control"
                                          id="exampleInputPassword1">
                              </div>

                              <div class="form-group">
                                    <label for="exampleInputPassword1">Confirmar Senha</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                          id="exampleInputPassword1">
                              </div>


                              <button type="submit" class="btn btn-primary btnRegister">Registrar</button>
                        </form>
                  </div>
            </div>

      </div>
</div>
<div class="checkout @if(!auth()->check() ) d-none @endif">
      {{-- @livewire('checkout') --}}

      <div class="container">
            <div class="text-center text-uppercase">
                  <h2 class="">Antes de prosseguir digite seu CEP</h2>
                  <h4 class="text-secondary">E selecione a forma de entrega</h4>
            </div>
            <div class="row">
                  <div class="col-12 col-md-6 my-5">
                        <h2 class="text-center text-secondary">Endereço para Entrega</h2>
                        <form id="buscacep">
                              <div class="form-row justify-content-center">

                                    <div class="input-group mb-3 col-md-5">

                                          <input id="cep" type="text" class="form-control" placeholder="CEP"
                                                aria-label="CEP" name="cep" aria-describedby="basic-addon2">
                                          <div class="input-group-append">
                                                <button class="btn btn-outline-secondary buscaCep" type="submit">
                                                      Buscar</button>
                                          </div>
                                    </div>
                                    <div class="form-group col-md-2">

                                          <input type="text" class="form-control" placeholder="UF" name="uf" id="uf">
                                    </div>
                                    <div class="form-group col-md-5">

                                          <input type="text" class="form-control" placeholder="Cidade" name="cidade"
                                                id="cidade">
                                    </div>
                                    <div class="form-group col-md-12">

                                          <input type="text" class="form-control" placeholder="Rua" name="rua" id="rua">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" placeholder="Bairro" name="bairro"
                                                id="bairro">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control" placeholder="Complemento"
                                                name="complemento" id="bairro">
                                    </div>
                                    <div class="form-group col-md-4">

                                          <input type="text" class="form-control" placeholder="Numero" name="numero"
                                                id="numero" required>
                                    </div>
                                    <div class="form-group col-md-2">

                                          <input type="text" class="form-control" placeholder="DD" name="dd" id="dd">
                                    </div>
                                    <div class="form-group col-md-6">

                                          <input type="text" class="form-control telefone" placeholder="Telefone" name="telefone"
                                                id="telefone">
                                    </div>
                              </div>
                        </form>

                        <div id="shipping" class="d-none">
                              <h4 class="text-center ">Selecione a forma de entrega!</h4>
                              <div class="d-flex">
                                    <div class="d-flex justify-content-between flex-column">
                                          <div class="form-check">
                                                <input class="form-check-input" type="radio" id="sedexval"
                                                      name="correios">
                                                <label class="form-check-label" for="exampleRadios1">
                                                      SEDEX: <span class="values" id="sedex"></span>
                                                </label>
                                          </div>
                                          <div class="form-check">
                                                <input class="form-check-input" id="pacval" type="radio" name="correios"
                                                      value="2">
                                                <label class="form-check-label" for="exampleRadios1">
                                                      PAC: <span class="values" id="pac"></span>
                                                </label>
                                          </div>
                                          {{-- <div class="form-check">
                                                <input class="form-check-input" id="rodonavesval" type="radio"
                                                      name="correios" value="3" disabled>
                                                <label class="form-check-label" for="exampleRadios1">
                                                      RODONAVE: <span class="valuess">INDISPONIVEL</span>
                                                </label>
                                          </div> --}}
                                          <div class="form-check">
                                                <input class="form-check-input" type="radio" name="correios" id="local"
                                                      value="4">
                                                <label class="form-check-label" for="exampleRadios1">
                                                      RETIRAR NO LOCAL
                                                </label>
                                          </div>
                                    </div>

                                    <div class="mx-auto my-auto">
                                          <h4>Subtotal: {{  'R$ '.number_format(Cart::getTotal(), 2, ',', '.') }}</h4>
                                          <h3 id="total"> </h3>
                                    </div>
                              </div>
                        </div>

                  </div>
                  <div class="col-md-6 my-5">
                        <h2 class="text-center text-secondary">Escolha forma de Pagamento</h2>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                    <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab"
                                          href="#home" role="tab" aria-controls="home" aria-selected="true">Cartão de
                                          Crédito</a>
                              </li>

                              <li class="nav-item" role="presentation">
                                    <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab"
                                          href="#contact" role="tab" aria-controls="contact"
                                          aria-selected="false">Boleto</a>
                              </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="my-2">
                                          <form>
                                                <input type="hidden" name="card_value">
                                                <div class="form-row justify-content-center">
                                                      <div class="form-group col-md-12">

                                                            <input type="text" placeholder="Nome do Titular do Cartão"
                                                                  class="form-control" id="" name="card_name"
                                                                  aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="form-group col-md-10">

                                                            <input type="text" class="form-control"
                                                                  placeholder="Numero do Cartão" name="card_number"
                                                                  id="card" aria-describedby="emailHelp">
                                                            <input type="hidden" class="form-control" name="card_brand"
                                                                  aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="col-md-2">
                                                            <span class="brand"></span>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                            <input type="text" class="form-control mes"
                                                                  name="expiration_month" placeholder="Mes"
                                                                  aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                            <input type="text" class="form-control ano"
                                                                  name="expiration_year" placeholder="Ano"
                                                                  aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                            <input type="text" class="form-control cvv" name="cvv"
                                                                  placeholder="cvv" aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                            <input type="text" class="form-control cpf" id="cpf"
                                                                  name="card_cpf" placeholder="CPF do Titular"
                                                                  aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                            <input type="text" class="form-control birth_date" id=""
                                                                  name="birth_date" placeholder="Data de Nascimento do Titular"
                                                                  aria-describedby="emailHelp">
                                                      </div>
                                                      <div class="col-md-12 installments form-group">

                                                      </div>
                                                      <button type="submit"
                                                            class="btn btn-primary  processCheckout">Finalizar
                                                            Compra</button>
                                                      <div class="d-none spinner spinner-grow text-success"
                                                            style="width: 3rem; height: 3rem;" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                      </div>
                                                      <div class="spinner-grow d-none spinner-er text-danger"
                                                            style="width: 3rem; height: 3rem;" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                      </div>
                                          </form>

                                    </div>
                              </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                              <div class="my-2">
                                    <form>
                                          <div class="form-row justify-content-center">

                                                <div class="form-group col-md-12">
                                                      <input id="cpf" type="text" class="form-control cpf" name="cpf"
                                                            placeholder="CPF" aria-describedby="emailHelp">
                                                </div>
                                                <button type="submit"
                                                      class="btn btn-primary  processCheckoutBoleto">Gerar Boleto</button>
                                                      <div class="d-none spinnerBol spinner-grow text-success" style="width: 3rem; height: 3rem;" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                      </div>
                                                      <div class="spinner-grow d-none spinner-erBol text-danger" style="width: 3rem; height: 3rem;" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                      </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>
</div>



@endsection

@section('scripts')
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script>
      const sessionId = '{{ session()->get('pagseguro_session_code') }}';
      const urlThanks = '{{ route('thanks') }}';
      const urlProccess = '{{ route('proccess') }}';
      const urlProccessBoleto = '{{ route('proccess.boleto') }}';
      const amoutTransaction = '{{ $total }}';
      const csrf = '{{ csrf_token() }}';
      const message = '{{Session::get('message')}}';
      PagSeguroDirectPayment.setSessionId(sessionId);
</script>
<script>

</script>
<script src="{{ asset('js/pagseguro_functions.js') }}"></script>
<script src="{{ asset('js/pagseguro_events.js') }}"></script>
<script src="{{ asset('js/correios.js') }}"></script>
<script src="{{ asset('js/autenticate.js') }}"></script>
@endsection