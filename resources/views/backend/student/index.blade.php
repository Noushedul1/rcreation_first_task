@extends('master.master')
@section('Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="text-center my-4">Add Student</h4>
            @if (Session::get('message'))
                <h4 class="text-center text-success">
                    {{ Session::get('message') }}
                </h4>
            @endif
            <form action="{{ route('student_create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email </label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">City </label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Select Department</label>
                    <select name="department_id" class="form-control">
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Add Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection