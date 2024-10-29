<!DOCTYPE html>
<html>
<head>
    <title>Task Management </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Task Management</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="ml-auto" action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        @session('status')
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endsession
        @yield('content')
    </main>

    <footer class="text-center mt-4">
        <p>© 2024 Task Management. All rights reserved.</p>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
