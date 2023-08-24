<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="Assets/css/login.css">
  <title>EditPost</title>
</head>
<body>
  <nav class="navbar">
    <div class="logo"><a href="/">RealBook</a></div>
    <ul class="nav-links">
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
  <h1>Edit Post</h1>
  <form action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="body">{{$post->body}}</textarea>
    <button>Save Changes</button>
  </form>
</body>
</html>