@extends('layouts.site')

@section('content')

<x-jet-validation-errors class="mb-4" />
<div class="text-center my-5">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="">
            <div class="container col-6">
                <div class="form-group">

                    <x-jet-input id="name" class="form-control" type="text" placeholder="Nome Completo" name="name" :value="old('name')" required
                        autofocus autocomplete="name" />
                </div>

                <div class="form-group">

                    <x-jet-input id="email" class="form-control" type="email" placeholder="Email" name="email" :value="old('email')"
                        required />
                </div>

                <div class="form-group">

                    <x-jet-input id="password" class="form-control" placeholder="Senha" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="form-group">

                    <x-jet-input id="password_confirmation" placeholder="Confirmar Senha" class="form-control" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
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
@endsection