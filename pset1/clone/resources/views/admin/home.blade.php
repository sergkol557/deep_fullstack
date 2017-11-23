@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Welcome, {{Auth::user()->name}}</div>

          <div class="panel-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            @foreach($users as $user)
                {!! Form::open(['url' => '/admin/home', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                  {!! Form::label('id', 'ID', ['class' => 'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::text('id', $user['id'],['class' =>'form-control', 'required', 'readonly']) !!}
                  </div>
                </div>

                <div class="form-group">
                  {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::text('name', $user['name'],['class' =>'form-control', 'required', 'autofocus']) !!}
                  </div>
                </div>

                <div class="form-group">
                  {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::email('email', $user['email'],['class' =>'form-control', 'required', 'id' =>'email']) !!}
                  </div>
                </div>

                <div class="form-group">
                  {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::select('role', ['user' => 'user', 'admin' => 'admin'], $user['role'], ['class' =>'form-control']) !!}
                  </div>
                </div>

                <div class="form-group">
                  {!! Form::label('blocked', 'blocked', ['class' => 'col-md-4 control-label']) !!}
                  <div class="col-md-6">
                    {!! Form::select('blocked', ['1' => 'true', '0' => 'false'], $user['blocked'], ['class' =>'form-control']) !!}
                   </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit('Update',  ['class' => 'btn btn-primary']); !!}
                  </div>
                </div>


                {!! Form::close() !!}
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
