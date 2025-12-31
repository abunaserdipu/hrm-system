@extends('layouts.app')

@section('content')
    <p id="email-status" style="font-weight:bold;"></p>

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        <input name="first_name" placeholder="First Name">
        <input name="last_name" placeholder="Last Name">
        <input name="email" placeholder="Email">

        <select name="department_id">
            @foreach ($departments as $dept)
                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
            @endforeach
        </select>

        <h4>Skills</h4>
        @foreach ($skills as $skill)
            <label>
                <input type="checkbox" name="skills[]" value="{{ $skill->id }}">
                {{ $skill->name }}
            </label>
        @endforeach

        <button type="submit">Save</button>
    </form>

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
