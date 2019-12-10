@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop
@section('nav_item')
    <li class="nav-item ">
        <a class="nav-link " href="http://localhost:8000/admin">
            <i class="fas fa-fw fa-user "></i>
            <p>Protocolos</p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " href="http://localhost:8000/admin/protocols/create">
            <i class="fas fa-fw fa-lock "></i>
            <p>Cadastrar Protocolo</p>
        </a>    
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <form action="{!! action('AdminController@store') !!}" method="post">
                            @csrf
                            <div class="form-group">
                                <label name="name">Nome do Protocolo<span class="text-danger">*</span></label>
                                <input name="name" type="text" id="name" class="form-control" placeholder="Insira o nome do protocolo" required>
                            </div>
                            <div class="form-group">
                                <label name="price">Preço:<span class="text-danger">*</span></label>
                                <input name="price" type="number" id="price" class="form-control" placeholder="Insira um preço" required>
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
