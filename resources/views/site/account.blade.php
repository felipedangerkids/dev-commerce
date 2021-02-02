@extends('layouts.site')

@section('content')
<div class="container my-4">

      <div class="row">
            <div class="col-md-6">
                  <div class="text-center text-secondary my-5">
                        <h2>Identifique-se para fazer o pedido</h2>
                  </div>
                  <div class="text-center my-5">
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                              {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <div class="">
                                    <div class=" container">
                                          <div class="form-group">
                                                <x-jet-input id="email" placeholder="Email" class="form-control"
                                                      type="email" name="email" :value="old('email')" required
                                                      autofocus />


                                          </div>
                                          <div class="form-group">
                                                <x-jet-input id="password" class="form-control" placeholder="Senha"
                                                      type="password" name="password" required
                                                      autocomplete="current-password" />

                                          </div>
                                          <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                      href="{{ route('password.request') }}">
                                                      {{ __('Esqueceu a senha?') }}
                                                </a>
                                                @endif

                                                <x-jet-button class="btn btn-success">
                                                      {{ __('Login') }}
                                                </x-jet-button>
                                          </div>
                                    </div>
                              </div>
                        </form>
                  </div>
            </div>

            <div class="col-md-6 reg">
                  <div class="text-center text-secondary my-5">
                        <h2>Cadastre-se</h2>
                  </div>
                  <div class="text-center my-5">

                        <form method="POST" action="{{ route('register') }}">
                              @csrf
                              <div class="">
                                    <div class="container ">
                                          <div class="form-group">

                                                <x-jet-input id="name" class="form-control" type="text"
                                                      placeholder="Nome Completo" name="name" :value="old('name')"
                                                      required autofocus autocomplete="name" />
                                          </div>

                                          <div class="form-group">

                                                <x-jet-input id="email" class="form-control" type="email"
                                                      placeholder="Email" name="email" :value="old('email')" required />
                                          </div>

                                          <div class="form-group">

                                                <x-jet-input id="password" class="form-control" placeholder="Senha"
                                                      type="password" name="password" required
                                                      autocomplete="new-password" />
                                          </div>

                                          <div class="form-group">

                                                <x-jet-input id="password_confirmation" placeholder="Confirmar Senha"
                                                      class="form-control" type="password" name="password_confirmation"
                                                      required autocomplete="new-password" />
                                          </div>

                                          <div class="">
                                                <a class="" href="{{ route('login') }}">
                                                      {{ __('Ja possui registro?') }}
                                                </a>

                                                <x-jet-button class="btn btn-success">
                                                      {{ __('Register') }}
                                                </x-jet-button>
                                          </div>
                                    </div>
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>
@endsection