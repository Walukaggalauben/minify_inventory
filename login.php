<!DOCTYPE html>
<html>
<head>
    <title>MINIFY GADGETS Login</title>

    <style>
        body{
            font-family: Arial;
            background:#f4f4f4;
        }

        .login-box{
            width:350px;
            margin:100px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0px 0px 10px #ccc;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
        }

        button{
            width:100%;
            padding:10px;
            margin-top:15px;
        }
    </style>
</head>
<body>

<div class="login-box">

<h2>📱 MINIFY GADGETS</h2>

<form action="login_process.php" method="POST">

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button type="submit">
Login
</button>

</form>

</div>

</body>
</html>