@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Meus Protocolos</h1>
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
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Tipo de Protocolo</th>
            <th scope="col">Descricao</th>
            <th scope="col">Data</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
            <tr>
                <td>{{$request->name}}</td>
                <td>{{$request->date}}</td>
                <td>{{$request->description}}</td>
                <td>
                    <!-- Botão para acionar modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$request->id}}">
                        Editar
                    </button>   
                    <!-- Modal -->
                    <div class="modal fade" id="modalEdit{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editLabel">Edição de Protocolo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{route('requests.update', $request)}}">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        @method('put')
                                        <div class="form-group">
                                            <label>Tipo de Protocolo<span class="text-danger">*</span></label>
                                            <select value="{{$request->subjectid}}"name="protocol_type" id="protocol_type" class="form-control" required>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Data esperada para realização:<span class="text-danger">*</span></label>
                                            <input value="{{$request->date}}" type="date" name="date" id="date" class="form-control" placeholder="Insira uma data" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição<span class="text-danger">*</span></label>
                                            <textarea rows="3" name="description" id="description" class="form-control" placeholder="Insira sua descrição" required>{{$request->description}}</textarea>
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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$request->id}}">
                        Excluir
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalDelete{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteLabel">Requisicao</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir essa requisição?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <form action="{{ route('requests.destroy', $request) }}" method="post">
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
@stop