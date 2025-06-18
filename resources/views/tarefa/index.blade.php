@extends('layouts.app')
@section('title', 'Lista de Tarefas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Lista de Tarefas</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TAREFA</th>
                                <th scope="col">DATA LIMITE CONCLUSAO</th>
                                
                            </tr>
                        </thead>
                          @foreach($tarefa as $tarefas)
                        <tbody>
                            <tr>
                                <th scope="row">{{$tarefas->id}}</th>
                                <td>{{$tarefas->tarefa}}</td>
                                <td>{{$tarefas->data_limite_conclusao}}</td>
                          
                            </tr>
                          
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection