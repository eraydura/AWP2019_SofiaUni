
///////////////////main.php////////////////////////
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

    }, 4000);
}

slideImg();

});
///////////////////index.php////////////////////

function openclose(div) {
        var divContenu = div.getElementsByTagName('div')[0];
        var one = document.getElementById("1")[0];
        var two = document.getElementById("2")[0];
        var three = document.getElementById("3")[0];

        if(divContenu.style.display == 'none') {
            divContenu.style.display = 'block';
            return true;
        } else {
            divContenu.style.display = 'block';
        }
        if (divContenu.clicked == true || two.clicked == true || three.clicked == true ) {
          
          divContenu.style.display = 'none';
        }
    }

    jQuery(document).ready(function() {
   jQuery('#line').on('change', function() {
     jQuery('#submit3').click();

   });
});

/*jQuery(document).ready(function() {
      jQuery("#hide").hide()
   });*/
   
  


     function hideDiv() {
     document.getElementById("hide").style.display = "none";
     if (openclose(this)) {
      document.getElementById("hide").style.display = "block";
     } 
}

////////////////////////register.php//////////////////////////

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
///////////////////////////////////////////////
