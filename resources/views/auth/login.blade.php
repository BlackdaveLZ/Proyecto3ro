<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background:#330F0A;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background-color: #1c1c1c; /* Fondo oscuro */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            max-width: 80%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #ccc; /* Texto gris claro */
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #333; /* Borde gris oscuro */
            border-radius: 4px;
            background-color: #333; /* Fondo gris oscuro */
            color: #fff; /* Texto blanco */
        }

        .remember-me {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .remember-me label {
            font-size: 14px;
            color: #ccc;
        }

        .login-button {
            background-color: #d9534f; /* Rojo oscuro (Berserk) */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #c9302c; /* Rojo más oscuro al hacer hover */
        }
    </style>
    <title>Login</title>
</head>
<body>

<div class="login-container">
    <h2 style="text-align: center; color: #ccc;">Iniciar Sesión</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de Usuario</label>
            <input type="text" id="name" name="name" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- <div class="remember-me">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember"> Recordarme
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div> -->

        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" class="login-button">Ingresar</button>
        </div>
    </form>
</div>

</body>
</html>
