@csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    <div class="form-group">
      <label for="nome_fornecedor">Nome Marca:</label>
      <input type="text" class="form-control" id="nome_marca" name="nome_marca" placeholder="Nome da Marca" value="{{ $marca->nome_marca ?? old('nome_marca') }}" required>
      <small id="emailHelp" class="form-text text-muted">...</small>
    </div>