@extends('layouts.app')

@section('content')
    <h2>Skills</h2>

    {{-- Create Skill --}}
    <form method="POST" action="{{ route('skills.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Skill Name">
        <button type="submit">Add</button>
    </form>

    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <hr>

    {{-- List Skills --}}
    <table border="1">
        <tr>
            <th>#</th>
            <th>Name</th>
        </tr>
        @foreach ($skills as $skill)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $skill->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection
