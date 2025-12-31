<h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
<p>Email: {{ $employee->email }}</p>
<p>Department: {{ $employee->department->name }}</p>

<h4>Skills</h4>
<ul>
    @foreach ($employee->skills as $skill)
        <li>{{ $skill->name }}</li>
    @endforeach
</ul>
