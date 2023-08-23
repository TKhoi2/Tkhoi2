<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <STYle>
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

  </STYle>
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