@extends('master.master')
@section('Department')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="text-center my-4">Add Department</h4>
            @if(Session::get('message'))
            <h4 class="text-center text-success">
                {{ Session::get('message') }}
            </h4>
            @endif
            <form action="{{ route('department_create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Department </label>
                    <input type="text" name="department_name" class="form-control">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Add Department</button>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>
@endsection