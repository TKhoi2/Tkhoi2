<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Assets/css/login.css">
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
        <p>Chúc mừng bạn đã đăng nhập </p>
        <h1>Tên Người Dùng: </h1>

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
            <h2>các post đã flow</h2>
            @foreach ($Flows as $Flow)
                <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h3>{{ $Flow['title'] }} bởi {{ $Flow->user->name }}</h3>
                    <p>{{ $Flow['body'] }}</p>
                    </form>
                    <form action="/flow-post/{{ $Flow->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button>Hủy Theo dõi</button>

                    </form>
                </div>
            @endforeach
        </div>


        <div style="border: 3px solid black;">
            <h2>các post của bạn</h2>
            @foreach ($myposts as $mypost)
                <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h3>{{ $mypost['title'] }} bởi {{ $mypost->user->name }}</h3>
                    {{ $mypost['body'] }}
                    <p><a href="/edit-post/{{ $mypost->id }}">chỉnh xửa</a></p>
                    <form action="/delete-post/{{ $mypost->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Xóa bài</button>
                    </form>
                </div>
            @endforeach
        </div>




        <div style="border: 3px solid black;">
            <h2>post của mọi người</h2>
            @foreach ($posts as $post)
                <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h3>{{ $post['title'] }} bởi {{ $post->user->name }}</h3>
                    {{ $post['body'] }}
                    @if ($post->user->id == auth()->user()->id)
                        <p><a href="/edit-post/{{ $post->id }}">chỉnh xửa</a></p>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Xóa bài</button>
                        </form>
                    @endif
                    <form action="/flow-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @if ($post->userflowed->contains('postId', auth()->user()->id))
                            <button>Hủy Theo dõi</button>
                        @else
                            <button>Theo dõi</button>
                        @endif
                    </form>
                </div>
            @endforeach
        </div>

        <form action="/logout" method="POST">
            @csrf
            <button>Đăng xuất</button>
        </form>
    @else
        <nav class="navbar">
            <div class="logo"><a href="/">RealBook</a></div>
            <ul class="nav-links">
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <h2>Login</h2>

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
