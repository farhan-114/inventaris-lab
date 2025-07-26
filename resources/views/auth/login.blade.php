<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Inventaris</title>
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0; padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #007bff, #0056b3);
      min-height: 100vh;
      display: flex; justify-content: center; align-items: center;
    }
    .login-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    .login-container img {
      width: 80px; margin-bottom: 20px;
    }
    .login-container h2 {
      margin-bottom: 25px;
      color: #333;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }
    .login-container button {
      width: 100%;
      padding: 12px;
      background: #007bff;
      border: none;
      color: #fff;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .login-container button:hover {
      background: #0056b3;
    }
    .login-container .links {
      margin-top: 12px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }
    .login-container .links a {
      color: #007bff;
      text-decoration: none;
    }
    .login-container .links a:hover {
      text-decoration: underline;
    }
    .error-message {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
    }
    @media (max-width: 480px) {
      .login-container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="{{ asset('logo.png') }}" alt="Logo Inventaris">
    <h2>Login Inventaris</h2>

    @if ($errors->any())
      <div class="error-message">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <input type="text" name="username" placeholder="Username" required autofocus>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>
    </form>
    <div class="links">
      <a href="{{ route('password.request') }}">Lupa Password?</a>
      <a href="{{ route('register') }}">Daftar</a>
    </div>
  </div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
