@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$tarefa->tarefa}}</div>

                <div class="card-body">
              <fieldset disabled>
                    <div class="mb-3">

                        <label  class="form-label">Data limite de Conclusao</label>
                            <input type="date" class="form-control" name="data_limite_conclusao" 
                            value="{{ \Carbon\Carbon::parse($tarefa->data_limite_conclusao)->format('Y-m-d') }}">
                    </div>
              </fieldset>
              
            </div>
        </div>
    </div>
</div>
@endsection
