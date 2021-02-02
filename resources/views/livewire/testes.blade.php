<form>
      <div wire:ignore>
            <select class="js-example-basic-multiple w-100"  name="category" multiple="multiple">
                  <option value="AL">Alabama</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach

            </select>
      </div>
      <button type="button" wire:click="store">Salvar</button>
</form>

@section('javascript')
<script>

$(document).ready(function() {
$('.js-example-basic-multiple').select2({
// tags: true,
}).on('change', function(e){
     
  
@this.set('category', $('.js-example-basic-multiple').val());

});
// $('.js-example-basic-multiple').select2();
});
document.addEventListener("livewire:load", () => {
            Livewire.hook('message.processed', (message, component) => {
            $('.js-example-basic-multiple').select2()
            
            }); 
            });

</script>
@endsection