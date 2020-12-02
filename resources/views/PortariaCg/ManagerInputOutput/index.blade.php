@extends('layouts.app')

@section('content_header')
    <h5><i class="fa fa-tachometer-alt"></i> Controlle de Acesso ao CG </h5>
@stop

@section('content')
<div class="card">
    <div class="card-footer"> 
        @if(isset($success))
            <div class="alert alert-success" role="alert">
                Salvo com sucesso.
            </div>
        @endif
    </div>

    <div class="card-body">
        <form action="{{ route('porter.registry.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="Rg">Rg</label>
                    <input type="text" maxlength="14" name="rg" class="form-control" id="Rg">
                </div>
                <div class="form-group col-md-3">
                    <label for="Uf">Uf</label>
                    <input type="text" maxlength="2" name="uf" class="form-control" id="Uf">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="situacao">Situação</label>
                    <select id="situacao" name="situacao" class="form-control">
                        <option selected>Selecione</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="responsavel">Responsável <small>(quem autorizou a entrada)</small></label>
                    <input type="text" name="responsavel" class="form-control" id="responsavel">
                </div>
                <div class="form-group col-md-3">
                    <label> <i class="fas fa-camera-retro"></i> Foto </label>
                    <br>  
                    <div class="custom-file" style=" ">
                        <input type="file" name="fotoVisit">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_into">Telefone</label>
                    <input type="text" name="Telefone" class="form-control" id="Telefone">
                </div>
                <div class="form-group col-md-6">
                    <label for="hora_into"> Recepção </label>
                    <input type="text" name="Recepcao" class="form-control" id="Recepcao">
                </div>
                <div class="form-group col-md-3">
                    <label for="local_destino"> Crachá </label>
                    <input type="text" class="form-control" name="Cracha" id="Cracha">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_into">Data inicial</label>
                    <input type="date" name="data_into" class="form-control" id="data_into">
                </div>
                <div class="form-group col-md-3">
                    <label for="hora_into"> Hora inicial</label>
                    <input type="time" name="hora_into" class="form-control" id="hora_into">
                </div>
                <div class="form-group col-md-6">
                    <label for="local_destino"> Local destino </label>
                    <input type="text" class="form-control" name="local_destino" id="local_destino">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">With textarea</span>
                    </div>
                    <textarea class="form-control" name="description" aria-label="Obs:"></textarea>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"> <i class="far fa-plus-square"></i> &nbsp; Registrar </button>
        </form>
    </div>
    
    <div class="card-footer"></div>
</div>
@endsection