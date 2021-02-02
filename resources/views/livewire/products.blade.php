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
      <button wire:click="create()"
        class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">Criar
        Produto</button>
      @if($isOpen)
      @include('livewire.products.create')
      @endif
      <table class="table-fixed w-full text-gray-600">
        <thead>
          <tr class="bg-gray-100">
            <th class="px-4 py-2 w-20">ID.</th>
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Slug</th>
            <th class="px-4 py-2">Categoria</th>
            <th class="px-4 py-2">Imagem</th>
            <th class="px-4 py-2">Acão</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $product)

          <tr>

            <td class="border px-4 py-2">{{ $product->id }} </td>
            <td class="border px-4 py-2">{{ $product->name }} </td>
            <td class="border px-4 py-2">{{ $product->slug }}</td>
            <td class="border px-4 py-2">
              @foreach ($product->categories as $cat)
              @if($loop->first)
              {{ $cat->name }}
              @endif
              @endforeach
            </td>
            <td class="border px-4 py-2">
              @foreach ($product->images as $image)
              @if($loop->first)
              <img width="50" height="50" class="mx-auto" src="{{ url('storage/products/'.$image->path) }}" alt="">
              @endif
              @endforeach

            </td>
            <td class="border px-4 py-2">
              <div class="">
                <button
                  class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-2 border border-red-500 hover:border-transparent rounded"
                  wire:click="delete({{ $product->id }})">
                  Apagar
                </button>


                <button
                  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded"
                  wire:click="edit({{ $product->id }})">
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