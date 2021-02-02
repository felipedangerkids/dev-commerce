@extends('layouts.site')

@section('content')

<div class="container my-5">
      <div class="row">
            <div class="col-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                              role="tab" aria-controls="v-pills-home" aria-selected="true">Minha Conta</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                              role="tab" aria-controls="v-pills-profile" aria-selected="false">Minhas Compras</a>

                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                              role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              role="tab" aria-controls="v-pills-settings" aria-selected="false">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                        </form>
                  </div>
            </div>
            <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                              aria-labelledby="v-pills-home-tab">
                              <p>Email: {{ auth()->user()->email }}</p>
                              <p>Nome: {{ auth()->user()->name }}</p>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                              aria-labelledby="v-pills-profile-tab">




                              <table class="table">
                                    <thead>
                                          <tr>
                                                <th scope="col">Numero do Pedido</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Ver</th>
                                                <th scope="col">Boleto</th>

                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach (auth()->user()->orders as $ordem)
                                          <tr>
                                                <th scope="row">{{ $ordem->id }}</th>
                                                <td>
                                                      @if ($ordem->pagseguro_status == 1)
                                                      Aguardando Pagamento
                                                      @elseif ($ordem->pagseguro_status == 2)
                                                      Processando Pagamento
                                                      @elseif($ordem->pagseguro_status == 3)
                                                      Não Processada
                                                      @elseif($ordem->pagseguro_status == 4)
                                                      Suspensa
                                                      @elseif($ordem->pagseguro_status == 5)
                                                      Paga
                                                      @elseif($ordem->pagseguro_status == 6)
                                                      Não Paga
                                                      @endif

                                                </td>
                                                <td>{{ $ordem->created_at }}</td>
                                                <td>
                                                      <a href="{{ url('pedidos-show/'. $ordem->id) }}"><button
                                                                  class="btn btn-primary">Ver</button></a>
                                                </td>
                                                <th>
                                                      @isset($ordem->link_boleto)
                                                      <a href="{{ $ordem->link_boleto }}"><button
                                                                  class="btn btn-success">Link do Boleto</button></a>
                                                      @endisset

                                                </th>
                                          </tr>
                                          @endforeach

                                    </tbody>
                              </table>
                        </div>

                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                              aria-labelledby="v-pills-settings-tab">Configurações</div>
                  </div>
            </div>
      </div>
</div>
@endsection