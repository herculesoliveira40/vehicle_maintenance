@csrf {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    <div class="form-group">
      <label for="nome_versao">Nome Versao:</label>
      <input type="text" class="form-control" id="nome_versao" name="nome_versao" placeholder="Nome da Versao" value="{{ $versao->nome_versao ?? old('nome_versao') }}" required>
      <small id="emailHelp" class="form-text text-muted">...</small>
    </div>