<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Fenris</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://source.unsplash.com/featured/?shopping,mall');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6));
        }
        .content {
            text-align: center;
            color: #fff;
            z-index: 1;
        }
        .title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #ff4500; /* Orange color */
            color: #fff;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            transition: background-color 0.3s;
            font-weight: 500;
            font-size: 18px;
            border: none;
            cursor: pointer;
            outline: none;
        }
        .btn:hover {
            background-color: #ff5733; /* Lighter orange on hover */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="content">
        <h1 class="title">Welcome To Fenris E-Commerce</h1>
        <a href="/login" class="btn">Login To Dashboard</a>
    </div>
</body>
</html>
