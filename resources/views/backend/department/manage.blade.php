@extends('master.master')
@section('Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h1 class="text-center my-4">
                Students
            </h1>
            @if (Session::get('message'))
                <h1 class="text-center text-success">
                    {{ Session::get('message') }}
                </h1>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($departments as $department)   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>
                        <a href="{{ route('department_delete',['id'=>$department->id]) }}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection