<?php
	if(!isset($_GET ['calle'])){
		header("location:elegir.php");
	}

  $calle = $_GET['calle']; 
	
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Semaforo Beato</title>
  <script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
	.luz{
		height: 100px;
		margin-bottom: 10px;
		border-radius: 50px;
	}
</style>

</head>
<body>
  <h3 class="text-center">Pare En Rojo</h3>
  <div class="row">
  	<div id="rojo" class="col col-sm-offset-3 col col-sm-6 label-danger luz"> 
  		
  	</div>
  </div>
  <div  class="row">
  
  <div id="amarillo" class="col col-sm-offset-3 col col-sm-6 label-warning luz">
  	
  	</div>
  </div>
  	<div class="row">
  	<div id="verde" class="col col-sm-offset-3 col col-sm-6 label-success luz">

  	</div>
  	</div>

    <?php if ($calle == 'A'): ?>

  	<script> 
  	 var color = "rojo"; 
     var tiempo = 0;

  	 $(".luz").hide();
     $("#+color").show();
     function ciclo(){
      if (color == "rojo" && tiempo > 10){
        color = "verde"; 
        tiempo = 0;
        actualizarServidor(color); 
      }else if(color == 'amarillo'&& tiempo > 2){
        color = "rojo"; 
        tiempo = 0;
        actualizarServidor(color); 
      }else if (color == 'verde' && tiempo > 8 ){
        color = "amarillo"
        tiempo = 0;    
        actualizarServidor(color); 
          }

     $(".luz").hide();
     $("#+color").show();
       tiempo++; 

     }  

     function acualizarServidor(ccc){
      $.ajax({
        url:'server.php', 
        method: 'post, 
        data:{'color':color}, 
        success:function(info){
          console.log(info);
        }

      });
     }

     setInterval(ciclo, 1000); 
  	</script>
    ?>php endif; ?>
</body> 
</html>