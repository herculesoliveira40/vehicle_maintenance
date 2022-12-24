@auth
<li class="nav-item">
    <!-- Button trigger modal -->
    <button type="button" class="nav-link btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Sair <i class="bi bi-door-open-fill"></i>
        {{auth()->user()->name }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escalha a opção desejada: </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Tem certeza que quer sair? ;-;
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <form action="{{ route('logout')}}" method="POST">
                        @csrf
                        <a href="/logout" class="btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                            Sair <i class="bi bi-door-open-fill"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</li>
@endauth
@guest
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Entrar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Escolha a opção desejada:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="/login" class="btn btn-primary">Login</a>
            </div>
            <div class="modal-footer">
                <a href="/login" class="btn btn-primary">Já tem conta?</a>
                <a href="/register" class="btn btn-success">Cadastre-se</a>
            </div>
        </div>
    </div>
</div>
@endguest