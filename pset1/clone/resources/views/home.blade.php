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
            {!! Form::open(['url' => route('home'), 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
              {!! Form::label('city', 'Your city', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::text('city', $data['city'],['class' =>'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('city'))
                  <span class="help-block">
                   <strong>{{ $errors->first('city') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
              {!! Form::label('country', 'Your country', ['class' => 'col-md-4 control-label']) !!}
              <div class="col-md-6">
                {!! Form::text('country', $data['country'],['class' =>'form-control', 'required']) !!}
                @if ($errors->has('country'))
                  <span class="help-block">
                   <strong>{{ $errors->first('country') }}</strong>
                  </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                {!! Form::submit('submit',  ['class' => 'btn btn-primary']); !!}
              </div>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
