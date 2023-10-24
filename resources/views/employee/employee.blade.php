@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Show Employee') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        @foreach($employee as $k=> $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->fname}}</td>
                            <td>{{$v->lname}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->phone}}</td>
                            <td><a href="employee/{{$v->id}}/edit"><i class="fas fa-edit"></i></a>

                                <form action="employee/{{$v->id}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button style="border: none;background: transparent;"><i class="fas fa-trash"></i></button>
</form>





                             </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $employee->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
