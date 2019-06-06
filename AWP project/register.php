    <?php
    session_start();
?>
<html> 
<head> 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
   
div {  
    box-sizing: border-box; 
    width: 100%; 
    border: 100px solid black; 
    float: left; 
    align-content: center; 
    align-items: center; 
} 
   
form {                                         
    margin: 0 auto; 
    width: 600px; 
}</style></head> 
   
<body> 
<h1 style="text-align: center"> REGISTRATION FORM </h1>           
<form class="container" name="RegForm" action="/submit.php" onsubmit="return registration()" method="post">  
      
    <p>Name: <input class="form-control" type="text"  name="Name" required> </p><br>        
    <p>Surname: <input class="form-control" type="text" name="Surname" required>  </p><br> 
    <p>E-mail Address: <input class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" type="text"  name="EMail" required>  </p><br> 
  <label>Password :
  <input name="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="password" type="password" onkeyup='check();' required />
</label>
<br>
<label>Confirm password:
  <input type="password" class="form-control" name="confirm_password" id="confirm_password"  onkeyup='check();' required/> 
  <span id='message'></span>
</label>
<br>
   <br>
    <p>Telephone: <input class="form-control" type="text" pattern="[0-9]{10}"  title="Ten digits code"  name="Telephone" required> </p><br>   
     <p>Credit Card: <input pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$" class="form-control" title="Must enter valid credit card" type="text" name="Card">  </p><br>      
     
    <p>Address:  <textarea class="form-control" rows="5" name="Adress">  </textarea></p> 
      <input type="checkbox" name="gender" value="female" checked> FEMALE<br>
      <input type="checkbox" name="gender" value="male"  > MALE</p>

	
    <p><span class="input-group-text" id="basic-addon3">https://example.com/users/
   <input type="text" class="form-control" name="pic" pattern="(http[^\s]+(jpg|jpeg|png|tiff)\b)" ></span> </p>
     
      <p>
      <p>
       <input class="btn btn-success" type="submit" value="Submit" name="Submit">      
        <input class="btn btn-danger" type="reset" value="Reset" name="Reset">   
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