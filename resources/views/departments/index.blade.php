@extends('layouts.app')

@section('content')
    <h2>Departments</h2>

    {{-- Create Department --}}
    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Department Name">
        <button type="submit">Add</button>
    </form>

    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <hr>

    {{-- List Departments --}}
    <table border="1">
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $department->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection
