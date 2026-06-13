<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>MINIFY GADGETS Login</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{

height:100vh;

background:

linear-gradient(
rgba(0,0,0,.55),
rgba(0,0,0,.55)
),

url('assets/images/login-bg.jpg');

background-size:cover;
background-position:center;

display:flex;
justify-content:center;
align-items:center;

}

.container{

width:1000px;
max-width:95%;

display:flex;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0 10px 40px rgba(0,0,0,.3);

}

.left{

flex:1;

background:linear-gradient(
135deg,
#00695C,
#00897B
);

color:white;

padding:50px;

display:flex;
flex-direction:column;
justify-content:center;

}

.left h1{

font-size:55px;
margin-bottom:10px;

}

.left h3{

font-size:28px;
margin-bottom:20px;

}

.left p{

font-size:18px;
line-height:30px;

}

.contact{

margin-top:30px;

}

.contact p{

margin-bottom:10px;

}

.right{

flex:1;

padding:60px;

display:flex;
flex-direction:column;
justify-content:center;

}

.logo{

text-align:center;
margin-bottom:30px;

}

.logo img{

width:120px;

}

.logo h2{

color:#00695C;
margin-top:10px;

}

.form-group{

margin-bottom:20px;

}

.form-group label{

display:block;
margin-bottom:8px;
font-weight:bold;

}

.input-box{

position:relative;

}

.input-box i{

position:absolute;

left:15px;
top:15px;

color:#00695C;

}

.input-box input{

width:100%;

padding:14px 14px 14px 45px;

border:1px solid #ddd;

border-radius:10px;

font-size:16px;

}

button{

width:100%;

padding:15px;

background:linear-gradient(
90deg,
#00695C,
#00897B
);

border:none;

color:white;

font-size:18px;
font-weight:bold;

border-radius:10px;

cursor:pointer;

transition:.3s;

}

button:hover{

transform:translateY(-2px);

}

.footer{

text-align:center;
margin-top:20px;
color:#666;

}

</style>

</head>

<body>

<div class="container">

<div class="left">

<h1>MINIFY</h1>

<h1>GADGETS</h1>

<h3>Phone Inventory & Sales System</h3>

<p>

Manage Inventory,
Track Sales,
Control Stock,
Monitor Profits.

</p>

<div class="contact">

<p>
📍 Pioneer Mall PA41
</p>

<p>
📞 0755062613
</p>

<p>
📞 0787808501
</p>

</div>

</div>

<div class="right">

<div class="logo">

<img src="assets/images/logo.png">

<h2>Staff Login</h2>

</div>

<form action="login_process.php" method="POST">

<div class="form-group">

<label>Username</label>

<div class="input-box">

<i class="fas fa-user"></i>

<input
type="text"
name="username"
required>

</div>

</div>

<div class="form-group">

<label>Password</label>

<div class="input-box">

<i class="fas fa-lock"></i>

<input
type="password"
name="password"
required>

</div>

</div>

<button type="submit">

<i class="fas fa-sign-in-alt"></i>

Login

</button>

</form>

<div class="footer">

MINIFY GADGETS © <?php echo date("Y"); ?>

</div>

</div>

</div>

</body>
</html>