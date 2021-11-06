@extends("app")

@section("titulo", "Cadastrar contato")

@section("conteudo")
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Cadastrar Contato</h3>
            </div>
            <div class="panel-body">
                @if(session('msg') || session('msgError'))
                    <div class="alert alert-{{ session('msg') ? "success" : "danger" }} alert-dismissible fade in"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ session('msg') ? session('msg') : session('msgError') }}
                    </div>
                @endif
                <form action="/contato" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                        <label class="control-label">Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                        <span class="help-block">{{ $errors->first('nome') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
                        <label class="control-label">Telefone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}">
                        <span class="help-block">{{ $errors->first('telefone') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label class="control-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg" id="btn-submit"><i class="fas fa-plus"></i> Cadastrar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{asset('js/App/ViaCep.js')}}" type="text/javascript"></script>
@endsection
