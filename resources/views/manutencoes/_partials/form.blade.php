@csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
<div class="form-group">
  <label for="veiculo_id" class="form-label"> Veiculo: </label>
  <select name="veiculo_id" id="veiculo_id" class="form-control" placeholder="produto_id">
    @foreach ($veiculos as $veiculo)
    <option value="{{$veiculo->id}}">{{$veiculo->nome_veiculo}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="ultima_manutencao">Ultima Manutencao:</label>
  <input type="date" class="form-control" id="ultima_manutencao" name="ultima_manutencao" required>
</div>
<div class="form-group">
  <label for="proxima_manutencao">Proxima Manutencao:</label>
  <input type="date" class="form-control" id="proxima_manutencao" name="proxima_manutencao" required>
</div>
<div class="form-group">
  <label for="status">Status:</label>
  <select name="status" id="status" class="form-control">
    <option value="0" >Pendente</option>
    <option value="1" >Em Andamento</option>
    <option value="2" >Concluído</option>
  </select>

<small id="emailHelp" class="form-text text-muted">...</small>
</div>