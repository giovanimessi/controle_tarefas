@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adicionar  tarefa') }}</div>

                <div class="card-body">
                <form method="POST" action="{{route('tarefa.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">Tarefa</label>
                        <input type="text" class="form-control" name="tarefa">
                      
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Data limite de Conclusao</label>
                        <input type="date" class="form-control"name ="data_limite_conclusao">
                    </div>
             
                    <button type="submit" class="btn btn-primary">Cdastrar</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
