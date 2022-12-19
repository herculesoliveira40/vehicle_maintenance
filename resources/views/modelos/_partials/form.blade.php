@csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    <div class="form-group">
      <label for="nome_modelo">Nome Modelo:</label>
      <input type="text" class="form-control" id="nome_modelo" name="nome_modelo" placeholder="Nome do Modelo" value="{{ $modelo->nome_modelo ?? old('nome_modelo') }}" required>
      <small id="emailHelp" class="form-text text-muted">...</small>
    </div>