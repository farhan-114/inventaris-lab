<<<<<<< HEAD
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
</html>
=======
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-6">
        <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">🔐 Login Inventaris</h1>
                <p class="text-sm text-gray-500 mt-1">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="password">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-blue-600">
                        <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-300">
                        Masuk
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-600 mt-4">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
            </p>
        </div>
    </div>
</x-guest-layout>
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
