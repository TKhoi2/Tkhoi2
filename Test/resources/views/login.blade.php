<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @auth
    <p>Chúc mừng bạn đã đăng nhập</p>
    
    <div style="border: 3px solid black;">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
          @csrf
          <input type="text" name="title" placeholder="post title">
          <textarea name="body" placeholder="body content..."></textarea>
          <button>Save Post</button>
        </form>
      </div>
    
      <div style="border: 3px solid black;">
        <h2>All Posts</h2>
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