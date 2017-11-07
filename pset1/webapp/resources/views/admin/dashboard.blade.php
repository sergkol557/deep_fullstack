@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Dashboard</div>

          <div class="panel-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif

            @foreach($userforms as $form)
              {!! Form::open(['url' => route('delete.admin.dashboard'), 'class' => 'form-horizontal']) !!}
              <div class="form-group">
                {!! Form::label('id', 'ID', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('id', $form['id'],['class' =>'form-control', 'required', 'readonly']) !!}
                </div>
              </div>

              <div class="form-group">
                {!! Form::label('email', ' user E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::email('email', $form['email'],['class' =>'form-control', 'required', 'readonly']) !!}
                </div>
              </div>

              <div class="form-group">
                {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('city', $form['city'],['class' =>'form-control', 'required', 'autofocus']) !!}
                </div>
              </div>
              <div class="form-group">
                {!! Form::label('country', 'Country', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('country', $form['country'],['class' =>'form-control', 'required', 'autofocus']) !!}
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  {!! Form::submit('Update',  ['class' => 'btn btn-primary']); !!}
                  {!! Form::submit('Delete',  ['class' => 'btn btn-danger', 'form' => 'form'.$form['id']]) !!}
                </div>
              </div>
              {!! Form::close() !!}
              {!! Form::open(['url' => route('delete.admin.dashboard'), 'method' => 'delete', 'id' => 'form'.$form['id']]) !!}
              {!! Form::hidden('id', $form['id']) !!}
              {!! Form::close() !!}
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
