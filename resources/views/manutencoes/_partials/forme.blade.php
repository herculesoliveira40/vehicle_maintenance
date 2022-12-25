@csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
<div class="form-group">
  <label for="veiculo_id" class="form-label"> Veiculo: </label>
  <select name="veiculo_id" id="veiculo_id" class="form-control" placeholder="veiculo_id" disabled>
    @foreach ($veiculos as $veiculo)
    <option value="{{$veiculo->id}}" {{ $manutencao->veiculo_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$veiculo->nome_veiculo}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="ultima_manutencao">Ultima Manutencao:</label>
  <input type="date" class="form-control" id="ultima_manutencao" name="ultima_manutencao" value="{{$manutencao->ultima_manutencao->format('Y-m-d')}}" disabled>
</div>
<div class="form-group">
  <label for="proxima_manutencao">Proxima Manutencao:</label>
  <input type="date" class="form-control" id="proxima_manutencao" name="proxima_manutencao" value="{{$manutencao->proxima_manutencao->format('Y-m-d')}}" required>
</div>
<div class="form-group">
  <label for="status">Status:</label>
  <select name="status" id="status" class="form-control">
    <option value="0" {{ $manutencao->status == 0 ? "selected='selected'" : ""}}>Pendente</option>
    <option value="1" {{ $manutencao->status == 1 ? "selected='selected'" : ""}}>Em Andamento</option>
    <option value="2" {{ $manutencao->status == 2 ? "selected='selected'" : ""}}>Concluído</option>
  </select>

  <small id="emailHelp" class="form-text text-muted">...</small>
</div>