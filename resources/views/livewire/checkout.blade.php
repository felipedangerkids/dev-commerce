<div>
    <div class="col-6">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">CEP</label>
                <input type="text" class="form-control" wire:model="cep"
                    placeholder="Coloque o CEP">       
            </div>
    
            <button type="button" wire:click="correios" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>
</div>