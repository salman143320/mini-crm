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
                <div class="card-header">{{ __('Show Company') }}</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                        @foreach($company as $k=> $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->email}}</td>
                            <td><img src="{{url('storage/app/public/'.$v->logo)}}" alt="" width="100" height="100"> </td>
                            <td>{{$v->website}}</td>
                            <td><a href="company/{{$v->id}}/edit"><i class="fas fa-edit"></i></a>

                                <form action="company/{{$v->id}}" method="POST">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button style="border: none;background: transparent;"><i class="fas fa-trash"></i></button>
</form>





                             </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $company->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
