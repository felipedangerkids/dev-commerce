@extends('layouts.site')

@section('content')
<div class="text-center my-5">
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="">
            <div class=" container col-6">
                <div class="form-group">
                    <x-jet-input id="email" placeholder="Email" class="form-control" type="email" name="email"
                        :value="old('email')" required autofocus />


                </div>
                <div class="form-group">
                    <x-jet-input id="password" class="form-control" placeholder="Senha" type="password" name="password"
                        required autocomplete="current-password" />

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
@endsection