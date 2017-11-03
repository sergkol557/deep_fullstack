@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Register</div>

          <div class="panel-body">

            {!! Form::open(['url' => route('register'), 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::text('name', old('name'),['class' =>'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('name'))
                  <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::email('email', old('email'),['class' =>'form-control', 'required', 'id' =>'email']) !!}
                @if ($errors->has('email'))
                  <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('role', 'Your role', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::select('role', ['user' => 'user', 'admin' => 'admin'], 'user', ['class' =>'form-control']) !!}
              </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::password('password',['class' =>'form-control', 'required']) !!}
                @if ($errors->has('password'))
                  <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password-confirm', 'Confirm password', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::password('password_confirmation',['class' =>'form-control', 'required', 'id' => 'password-confirm']) !!}
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('Register',  ['class' => 'btn btn-primary']); !!}
              </div>
            </div>


            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
