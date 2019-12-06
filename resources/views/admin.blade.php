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
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome do Protocolo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{$subject->name}}</td>
                            <td>R$ {{$subject->price}}</td>
                            <td>
                                <!-- Botão para acionar modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$subject->id}}">
                                    Editar
                                </button>   
                                <!-- Modal -->
                                <div class="modal fade" id="modalEdit{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Edição de Protocolo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('protocols.update', $subject)}}">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label name="name">Nome do Protocolo<span class="text-danger">*</span></label>
                                                        <input value="{{$subject->name}}" name="name" type="text" id="name" class="form-control" placeholder="Insira o nome do protocolo" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label name="price">Preço:<span class="text-danger">*</span></label>
                                                        <input value="{{$subject->price}}" name="price" type="number" id="price" class="form-control" placeholder="Insira um preço" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>                    
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$subject->id}}">
                                    Excluir
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modalDelete{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLabel">Protocolo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir essa Protocolo?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <form action="{{ route('protocols.destroy', $subject) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
