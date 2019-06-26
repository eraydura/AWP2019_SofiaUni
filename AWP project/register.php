    <?php
    session_start();
?>
<html> 
<head> 

<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  
<style> 
registration {                                         
    margin-left: 70px; 
    font-weight: bold ; 
    float: left; 
    clear: left; 
    width: 100px; 
    text-align: left; 
    margin-right: 10px; 
    font-family:sans-serif,bold, Arial, Helvetica; 
    font-size:14px; 
} 

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

</style>
</head> 
   
<body> 
   
<form class="form-group form-control-static" name="RegForm" action="/submit.php" onsubmit="return registration()" method="post">  
      <h1 class ="form-group" style="padding-left: 50px;"><img src="vehicomm2.png" class="vehicomm"><i> Sign Up </i></h1>  
<div class="form-group"><hr/></div>   

    <div class="form-group">
        <label><strong>Name*</strong> 
      <input class="form-control" style="" type="text"  name="Name" placeholder="Name" required>
    </label>
      <label><strong>Surname*</strong>
      <input class="form-control" type="text" name="Surname" placeholder="Surname" required>  </label></div>


    <div class="form-group">
    <p><strong>E-mail Address*</strong>
      <div class="input-group">
      <span class="input-group-addon">
      <span class="glyphicon glyphicon-envelope"></span></span>
      <input class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" type="text"  name="EMail" placeholder="E-mail Address" required> </div> </p></div>


  <div class="form-group">
    <label>Password*</label>
  <input name="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="password" type="password" onkeyup='check();' placeholder="********" required /></div>


<div class="form-group">
  <label>Confirm password*</label>
  <input type="password" class="form-control" name="confirm_password" id="confirm_password"  onkeyup='check();' placeholder="********" required/> </div>
<span id="message"></span>


    <div class="form-group">
      <p><strong>Telephone*</strong>
      <div class="input-group">
      <span class="input-group-addon">
      <span class="glyphicon glyphicon-earphone"></span></span>
      <input class="form-control" type="text" pattern="[0-9]{10}"  title="Ten digits code"  name="Telephone" placeholder="Telephone" required> </div></p></div>
     <!--<p>Credit Card <input pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$" class="form-control" title="Must enter valid credit card" type="text" name="Card">  </p>      -->
     
    <div class="form-group">
      <p><strong>Address*</strong><textarea class="form-control" rows="5" name="Address" placeholder="Address">  </textarea></p> </div>

     <div class="form-group"><hr/></div> 

      <p>
       <input class="btn btn-success" type="submit" value="Submit" name="Submit">      
        <input class="btn btn-danger" type="reset" value="Reset" name="Reset">
        <input class="btn btn-primary" style="float:right;" type="button" onclick="location.href='login.php';" value="Sign In ?">
    </p>  
   
</form> 

<script>
    
  
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
  
   </script> 
</body> 
</html> 