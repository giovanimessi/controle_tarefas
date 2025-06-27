@extends('layouts.app')
@section('title', 'Lista de Tarefas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span>Lista de Tarefas</span>
                    <a href="{{ route('tarefa.create') }}" class="btn btn-light btn-sm text-primary">
                        Nova Tarefa
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TAREFA</th>
                                <th scope="col">DATA LIMITE CONCLUSAO</th>
                                <th>Acoes</th>
                                
                            </tr>
                        </thead>
                          @foreach($tarefa as $tarefas)
                        <tbody>
                            <tr>
                                <th scope="row">{{$tarefas->id}}</th>
                                <td>{{$tarefas->tarefa}}</td>
                                <td>{{date('d/m/y',strtotime($tarefas->data_limite_conclusao))}}</td>
                                <td><a href="{{route('tarefa.edit',$tarefas->id)}}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $tarefas->id }}" method="POST" action="{{ route('tarefa.destroy', ['tarefa' => $tarefas->id]) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background: none; color: red; padding: 0;">Excluir</button>
                                    </form>
                                </td>
                          
                            </tr>
                          
                        </tbody>
                        @endforeach
                    </table>
                   <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{$tarefa->previousPageUrl()}}">Voltar</a></li>
                            @for($i = 1; $i <= $tarefa->lastPage(); $i++)
                                <li class="page-item {{ $tarefa->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $tarefa->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{$tarefa->nextPageUrl()}}">Proximo</a></li>
                        </ul>
                 </nav>
            </div>
        </div>
    </div>
    @endsection