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
                <div class="card-header">{{ __('Add Employee') }}</div>

                <div class="card-body">
                {!! Form::open(array('url' => 'employee')) !!}

                {{ Form::label('fname', 'First Name')}}
                {{ Form::text('fname', '',['class' => 'form-control','placeholder'=>'First Name'])}}
                <br>
                {{ Form::label('lname', 'Last Name')}}
                {{ Form::text('lname', '',['class' => 'form-control','placeholder'=>'Last Name'])}}
                <br>
                {{ Form::label('company', 'Company')}}
                {{Form::select('company', $company,'',array('class' => 'form-control'))}}
                <br>
                {{ Form::label('email', 'Email')}}
                {{ Form::email('email', '',['class' => 'form-control','placeholder'=>'Email'])}}
                <br>
                {{ Form::label('phone', 'Phone')}}
                {{ Form::text('phone', '',['class' => 'form-control','placeholder'=>'Phone'])}}
                <br>
                {{Form::submit('Save',['class' => 'btn btn-success'])}}
                {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
