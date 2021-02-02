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
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">Criar Categoria</button>
            @if($isOpen)
            @include('livewire.categories.create')
            @endif
            <table class="table-fixed w-full text-gray-600">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID.</th>
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">Slug</th>
                        <th class="px-4 py-2">Parente</th>
                        <th class="px-4 py-2">Acão</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cat)
                    @php
                    $children = App\Models\Category::where('parent_id', $cat->id)->get();
                    @endphp
                    <tr>

                        <td class="border px-4 py-2">{{ $cat->id }} </td>
                        <td class="border px-4 py-2">{{ $cat->name }} </td>
                        <td class="border px-4 py-2">{{ $cat->slug }}</td>
                        <td class="border px-4 py-2">
                            @if($cat->parent_id == null)
                            Categoria Principal
                            @else
                            <a href="" class="modal-open hover:text-green-500">Sub Categoria</a>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <div class="">
                                <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded" wire:click="delete({{ $cat->id }})">
                                    Apagar
                                </button>


                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" wire:click="edit({{ $cat->id }})">
                                    Editar
                                </button>

                            </div>
                        </td>
                        @empty
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>


<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div
            class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Sub Categorias</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>

            @forelse ($categories as $cat)
            @php
            $children = App\Models\Category::where('parent_id', $cat->id)->get();
            @endphp
            @foreach ($children as $child)
            @if($loop->last)
            <p>ID categoria principal: {{ $child->parent_id }}</p>
            @endif
            @endforeach
            @empty

            @endforelse

            <!--Footer-->
            <div class="flex justify-end pt-2">


                <button
                    class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Fechar</button>
            </div>

        </div>
    </div>
</div>

<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
    
     
</script>