@extends('layouts.app')

@section('content')
    <h2>Edit Employee</h2>

    <form method="POST" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')

        {{-- First Name --}}
        <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" placeholder="First Name">
        @error('first_name')
            <p style="color:red">{{ $message }}</p>
        @enderror

        {{-- Last Name --}}
        <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" placeholder="Last Name">
        @error('last_name')
            <p style="color:red">{{ $message }}</p>
        @enderror

        {{-- Email --}}
        <input type="email" name="email" value="{{ old('email', $employee->email) }}" placeholder="Email">
        <p id="email-status"></p>
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        {{-- Department --}}
        <select name="department_id">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id')
            <p style="color:red">{{ $message }}</p>
        @enderror

        {{-- Skills --}}
        <h4>Skills</h4>
        @foreach ($skills as $skill)
            <label>
                <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                    {{ $employee->skills->contains($skill->id) ? 'checked' : '' }}>
                {{ $skill->name }}
            </label><br>
        @endforeach

        <br>
        <button type="submit">Update Employee</button>
    </form>

    {{-- Email check --}}
    <script>
        $('input[name="email"]').keyup(function() {
            let email = $(this).val();

            if (email.length > 5) {
                $.get('/check-email', {
                    email
                }, function(res) {
                    if (res.exists) {
                        $('#email-status').text('Email already exists').css('color', 'red');
                    } else {
                        $('#email-status').text('Email available').css('color', 'green');
                    }
                });
            } else {
                $('#email-status').text('');
            }
        });
    </script>
@endsection
