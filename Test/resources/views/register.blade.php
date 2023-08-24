<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Assets/css/login.css">
    <title>Document</title>
</head>

<body>
    @auth
        <nav class="navbar">
            <div class="logo"><a href="/">RealBook</a></div>
            <ul class="nav-links">
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <p>Chúc mừng đã bạn tạo tài khoản</p>
        <a href="{{ route('login') }}">
            <form action="/logout" method="POST">
                @csrf
                <button>Bấm vào đây để đăng nhập</button>
            </form>
        </a>
    @else
        <nav class="navbar">
            <div class="logo"><a href="/">RealBook</a></div>
            <ul class="nav-links">
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <h2>Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Tên:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" required>

            <button type="submit">Đăng ký</button>
        </form>
    @endauth



</body>

</html>
