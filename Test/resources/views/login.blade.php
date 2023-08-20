<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <label for="name">Tên:</label>
        <input type="text" name="name" required>
    
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required>
    
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>