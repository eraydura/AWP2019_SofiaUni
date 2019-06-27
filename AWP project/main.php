<!doctype html>
<html>
<?php
session_start();
ini_set('display_errors','off');

$baglan = mysqli_connect("localhost","root","","mywebapp");
  if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}?>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.sli
m.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="resources/js/functions.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Home</title>
<style>

body {
  background-image:url(resources/img/paysage.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}



</style>

<script language="javascript">

jQuery(document).ready(function(){
    
var $carrousel = jQuery('#carrousel'),
    $img = jQuery('#carrousel img'),
    indexImg = $img.length - 1,
    i = 0,
    $currentImg = $img.eq(i);

$img.css('display', 'none');
$currentImg.css('display', 'block');


jQuery('.next').click(function(){

    i++;

    if( i <= indexImg ){
        $img.css('display', 'none');
        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');
    }
    else{
        i = indexImg;
    }

});

jQuery('.prev').click(function(){

    i--;

    if( i >= 0 ){
        $img.css('display', 'none');
        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');
    }
    else{
        i = 0;
    }

});

function slideImg(){
    setTimeout(function(){
            
        if(i < indexImg){
      i++;
  }
  else{
      i = 0;
  }

  $img.css('display', 'none');

  $currentImg = $img.eq(i);
  $currentImg.css('display', 'block');

  slideImg();

    }, 2000);
}

slideImg();

});

  </script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <i><a class="navbar-brand" href="profile.php" title="Profile"><img src="resources/img/vehicomm.png" class="vehicomm"></a></i>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="index.php">Products</a></li>
      <li><a href="basket1.php">My Basket</a></li>
      <li><a href="#">About</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
         <?php
      if(isset($_SESSION["email"])){
        echo "<li><a href='#' style='color:white; cursor:default'>
        <img src='resources/img/user.png' width='20px'><i> Hello ".$_SESSION["name"]."</i></a></li>";
        echo "<li><a href='logout.php'><img src='resources/img/logout.png' width='20px'> Log Out</a></li>";
      }
      else{
        echo "<li><a href='register.php'> Sign Up</a></li>
        <li><a href='login.php'><img src='resources/img/user.png' width='20px'> Log In</a></li>";
      }
      ?>
      </ul>
  </div>
</nav>
<br><br><br>

<div class="container">
<div class="form-group" id="carrousel">
    <ul>
        <li><img src="https://payfastcoza-bef7.kxcdn.com/wp-content/uploads/Black-Friday-blog.png" /></li>
  <li><img src="https://idapgroup.com/blog/blog/wp-content/uploads/2018/12/tild3633-3336-4233-b761-353238323066__6638__ecommercemain.jpg" /></li>
  <li><img src="http://voicemaster.co.in/wp-content/uploads/2014/11/ecommerce.jpg" /></li>
    </ul>
</div>



  <table style="width:100%">
    <?php
	 $verileri_al=mysql_query("Select* from stuffs");
	while($dizi= mysql_fetch_array($verileri_al)){
		echo"<tr>
	
    <td><h1>".$dizi["Name"]."</h1></td>
    <td><h3>".$dizi["Price"]." Euro</h3></td>
	<td><img width='300px' height='250px' src=".$dizi["Picture"]."></td>
    <td> <button onclick='myFunction()'><img width='50px' height='50px' src='https://purepng.com/public/uploads/large/purepng.com-shopping-basketshoppingcarttrolleycarriagebuggysupermarketsbasket-1421526532727qjew3.png'  ></button></td>
	
  </tr>";

	}
	
	?>
	<script>
function myFunction() {
  alert("Firstly you have to login in !");
}
</script>
</table>
 
</div>
<script>
	
</script>
</body>
</html>