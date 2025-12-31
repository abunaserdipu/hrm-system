<!DOCTYPE html>
<html>

<head>
    <title>HRM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    @auth
        <a href="{{ route('employees.index') }}">Employees</a> |
        <a href="{{ route('departments.index') }}">Departments</a> |
        <a href="{{ route('skills.index') }}">Skills</a> |

        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                style="cursor: pointer;">
                Log Out
            </a>
        </form>
    @endauth
    <hr>
    @yield('content')
</body>

</html>
