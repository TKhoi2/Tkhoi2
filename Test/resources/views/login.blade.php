<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <Style>
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
    </Style>
    <title>Home</title>
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
    <p>Chúc mừng bạn đã đăng nhập</p>
    
    <div style="border: 3px solid black;">
        <h2>Tạo một Post mới</h2>
        <form action="/create-post" method="POST">
          @csrf
          <input type="text" name="title" placeholder="post title">
          <textarea name="body" placeholder="body content..."></textarea>
          <button>Lưu Post</button>
        </form>
      </div>
    
      <div style="border: 3px solid black;">
        <h2>cách post của bạn</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
          <h3>{{$post['title']}} bởi {{$post->user->name}}</h3>
          {{$post['body']}}
          <p><a href="/edit-post/{{$post->id}}">chỉnh xửa</a></p>
          <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Xóa bài</button>
          </form>
        </div>
        @endforeach
      </div>

    <form action="/logout" method="POST">
        @csrf
        <button>Đăng xuất</button>
    </form>
    @else
    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <label for="loginname">Tên:</label>
        <input type="text" name="loginname" required>
    
        <label for="loginpassword">Mật khẩu:</label>
        <input type="password" name="loginpassword" required>
    
        <button type="submit">Đăng nhập</button>
        <a href="{{ route('register') }}">Đăng kí tài khoản</a>
    </form>

    @endauth
</body>
</html>