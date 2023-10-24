@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Employee') }}</div>

                <div class="card-body">
                {!! Form::open(array('url' => 'employee/'.$employee->id,'method' => 'PUT')) !!}

                {{ Form::label('fname', 'First Name')}}
                {{ Form::text('fname', $employee->fname,['class' => 'form-control','placeholder'=>'First Name'])}}
                <br>
                {{ Form::label('lname', 'Last Name')}}
                {{ Form::text('lname', $employee->lname,['class' => 'form-control','placeholder'=>'Last Name'])}}
                <br>
                
                {{ Form::label('company', 'Company')}}
                {{Form::select('company', $company,$employee->company,array('class' => 'form-control'))}}
                <br>
                {{ Form::label('email', 'Email')}}
                {{ Form::email('email', $employee->email,['class' => 'form-control','placeholder'=>'Company Email'])}}
                <br>
                {{ Form::label('phone', 'Phone')}}
                {{ Form::text('phone', $employee->phone,['class' => 'form-control','placeholder'=>'Phone'])}}
                <br>
                {{Form::submit('Save',['class' => 'btn btn-success'])}}
                {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
