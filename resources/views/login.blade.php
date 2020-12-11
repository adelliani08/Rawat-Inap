<html>
<head>
  <title> SISTEM INFORMASI RAWAT INAP</title>
  <link rel="stylesheet" href="{{asset("css/login.css")}}">
</head>
<body class="body-login">
    <div class="container-login">
        <img src="{{asset("images/iconrs.jpg")}}" alt="">
        <div class="header-login">
            <p>
                Sistem Informasi <br> Rawat Inap
            </p>
        </div>
        <form action="" method="post" class="form-login">
            @csrf
            <label for="username" style="color: white;">Username:</label><br>
            <input type="text" name="username" id="username"><br>
            <label for="password" style="color: white;">Password</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" name="login" value="login" class="login-btn" />
        </form>
 
</div>

</body>
</html>