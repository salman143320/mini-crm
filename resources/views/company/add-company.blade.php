@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
                    @if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
            <div class="card">
                <div class="card-header">{{ __('Add Company') }}</div>

                <div class="card-body">
                {!! Form::open(array('url' => 'company','method' => 'POST','files'=>'true')) !!}

                {{ Form::label('name', 'Company Name')}}
                {{ Form::text('name', '',['class' => 'form-control','placeholder'=>'First Name'])}}
                <br>
                {{ Form::label('email', 'Email')}}
                {{ Form::email('email', '',['class' => 'form-control','placeholder'=>'Email'])}}
                <br>
                {{ Form::label('file', 'Logo')}}
                {{ Form::file('logo',['class' => 'form-control','placeholder'=>'Email'])}}
                <br>
                {{ Form::label('website', 'Website')}}
                {{ Form::text('website', '',['class' => 'form-control','placeholder'=>'Website'])}}
                <br>
                {{Form::submit('Save',['class' => 'btn btn-success'])}}
                {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
