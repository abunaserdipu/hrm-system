@extends('layouts.app')

@section('content')
    <h2>Employees</h2>


    <a href="{{ route('employees.create') }}">
        <button>Add Employee</button>
    </a>

    <br><br>

    {{-- Department Filter --}}
    <select id="departmentFilter">
        <option value="">All Departments</option>
        @foreach ($departments as $dept)
            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
        @endforeach
    </select>

    <br><br>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody id="employeeTable">
            @foreach ($employees as $e)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $e->first_name }} {{ $e->last_name }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->department->name }}</td>
                    <td>
                        <a href="{{ route('employees.show', $e->id) }}">View</a> |
                        <a href="{{ route('employees.edit', $e->id) }}">Edit</a> |

                        <form method="POST" action="{{ route('employees.destroy', $e->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- AJAX Filter --}}
    <script>
        $('#departmentFilter').change(function() {
            $.get('/employees/filter/department', {
                department_id: $(this).val()
            }, function(data) {

                let rows = '';

                data.forEach((e, index) => {
                    rows += `
            <tr>
                <td>${index + 1}</td>
                <td>${e.first_name} ${e.last_name}</td>
                <td>${e.email}</td>
                <td>${e.department.name}</td>
                <td>
                    <a href="/employees/${e.id}">View</a> |
                    <a href="/employees/${e.id}/edit">Edit</a> |
                    <form method="POST" action="/employees/${e.id}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            `;
                });

                $('#employeeTable').html(rows);
            });
        });
    </script>
@endsection
