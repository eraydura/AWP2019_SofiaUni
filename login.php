<!doctype html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta charset="utf-8">
<title>Login</title>

<style>

body {
    background-image:url(paysage.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

form {                                         
    margin: 5 auto; 
    width: 465px; 
    border-radius: 10px;
    background-color: rgba(95,95,95,0.4);
    padding:20px;
}

.center-div {
     margin: auto;
     width: 500px;
     margin-top: 50px; 
}

.vehicomm {
  width: 150px;
  float:right;
}

</style>
</head>

<body>
  <div id="formContent" class="center-div">

    <form class="form-group form-control-static" action="/submit2.php" method="post"> 
      <h1 class ="form-group" style="text-align: center;"><img src="user.png" width="40px" id="icon" alt="User Icon" /><i> Login </i><img src="vehicomm2.png" class="vehicomm"></h1>  
<div class="form-group"><hr/></div>   

    <div class="form-group">
        <label class="control-label col-sm-2"><strong>E-mail*</strong></label>
      <input type="text" id="login" class="form-control" name="EMail" placeholder="login"><br>
      <label class="control-label col-sm-2"><strong>Password*</strong></label>
      <input type="password" id="password" class="form-control" name="Password" placeholder="password"></div>


<div class="form-group"><hr/></div> 
      <p>
       <input class="btn btn-success" type="submit" value="Log In" name="Submit">      
        <input class="btn btn-danger" type="reset" value="Reset" name="Reset">
        <input class="btn btn-primary" style="float:right;" type="button" onclick="location.href='register.php';" value="Sign Up ?">
    </p> 

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#" name="forgot">Forgot Password?</a>
    </div>
  </form>
  </div>
</body>
</html>