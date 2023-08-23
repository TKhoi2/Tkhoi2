<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
          body, ul {
                    margin: 0;
                    padding: 0;
                }

                /* Style for the navbar */
                .navbar {
                    background-color: #333;
                    color: #fff;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 10px 20px;
                }

                /* Style for the logo */
                .logo {
                  font-size: 24px;
                  
                }

                /* Style for the logo link */
                .logo a {
                    text-decoration: none;
                    color: #fff;
                    transition: color 0.3s;
                }

                .logo a:hover {
                    color: #00ffea;
                }


                /* Style for the navigation links */
                .nav-links {
                    list-style: none;
                    display: flex;
                }

                .nav-links li {
                    margin-right: 20px;
                }

                .nav-links a {
                    text-decoration: none;
                    color: #fff;
                    transition: color 0.3s;
                }

                .nav-links a:hover {
                    color: #ff8c00;
                }
    </style>
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