@csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
<div class="form-group">
  <label for="nome_veiculo">Nome Veiculo:</label>
  <input type="text" class="form-control" id="nome_veiculo" name="nome_veiculo" placeholder="Nome do Veiculo" value="{{ $veiculo->nome_veiculo ?? old('nome_veiculo') }}" required>
  <label for="ano">Ano Veiculo:</label>
  <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano" value="{{ $veiculo->ano ?? old('ano') }}" required>
  <label for="cor">Cor Veiculo:</label>
  <input type="text" class="form-control" id="cor" name="cor" placeholder="cor do Veiculo" value="{{ $veiculo->cor ?? old('cor') }}" required>
  <label for="img">IMG:</label>
  <input type="text" class="form-control" id="img" name="img" placeholder="IMG do Veiculo" value="{{ $veiculo->img ?? old('img') }}" required>
  <label for="placa">Placa Veiculo:</label>
  <input type="text" class="form-control" id="placa" name="placa" placeholder="placa do Veiculo" value="{{ $veiculo->placa ?? old('placa') }}" required>

  