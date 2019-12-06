@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
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
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
@stop
