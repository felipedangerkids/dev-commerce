@extends('layouts.app')


@section('content')
@if(Session::has('message'))
<script type="text/javascript">
      Swal.fire({
    icon: 'success',
    title: 'Muito bom!',
    text: "{{Session::get('message')}}",
    
    }).then((value) => {
    location.reload();
    }).catch(swal.noop);
</script>
@endif
<div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                  <h1>Usuarios Cadastrados</h1>

                  <table class="table-fixed w-full text-gray-600">
                        <thead>
                              <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">ID.</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Email</th>

                              </tr>
                        </thead>
                        <tbody>
                              @forelse ($users as $user)

                              <tr>

                                    <td class="border px-4 py-2">{{ $user->id }} </td>
                                    <td class="border px-4 py-2">{{ $user->name }} </td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    @empty
                              </tr>
                              @endforelse

                        </tbody>
                  </table>
            </div>
      </div>
</div>


@endsection