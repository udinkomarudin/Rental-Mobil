<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        nav {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 1em;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 1em;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        main {
            padding: 1em;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    background: #f1f1f1;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-login {
    background-color: #3498db;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #2980b9;
}
    </style>
    
</head>
<body>
    <header>
        <h1>Rental Mobil</h1>
    </header>

    <nav>
    
        <a href="{{ url('/mobil') }}">Manajemen Mobil</a>
        <a href="{{ url('/peminjaman') }}">Peminjaman</a>
        <a href="{{ url('/pengembalian') }}">Pengembalian</a>
        <a href="{{ route('logout') }}"></a>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy; Rental Mobil</p>
    </footer>
</body>
</html>
