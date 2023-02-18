@extends('master.master')
@section('Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h1 class="text-center my-4">
                Students Manage
            </h1>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
                @foreach ($students as $student)   
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->city }}</td>
                    {{-- <td>{{ $student->department_id }}</td> --}}
                    <td>{{ $student->departments->department_name }}</td>
                    <td>
                        <a href="{{ route('student_edit',['id'=>$student->id]) }}" class="btn text-success">
                            <i class="fa fa-edit"></i>
                        </a>
                        {{-- <a href="" class="btn text-danger">
                            <i class="fa fa-trash"></i>
                        </a> --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection