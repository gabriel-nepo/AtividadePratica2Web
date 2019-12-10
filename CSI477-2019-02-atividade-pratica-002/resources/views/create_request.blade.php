@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Formulário de Requerimento</h1>
@stop

@section('nav_item')
    <li class="nav-item ">
        <a class="nav-link " href="http://localhost:8000/home/protocols">
            <i class="fas fa-fw fa-book "></i>
            <p>Meus Protocolos</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " href="http://localhost:8000/home/create-request">
            <i class="fas fa-fw fa-file-alt "></i>
            <p>Cadastrar Protocolo</p>
        </a>
    </li>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{!! action('UserProtocols@store') !!}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tipo de Protocolo<span class="text-danger">*</span></label>
                        <select name="protocol_type" id="protocol_type" class="form-control" required>
                            @foreach ($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data esperada para realização:<span class="text-danger">*</span></label>
                        <input type="date" name="date" id="date" class="form-control" placeholder="Insira uma data" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição<span class="text-danger">*</span></label>
                        <textarea rows="3" name="description" id="description" class="form-control" placeholder="Insira sua descrição" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Requerir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop