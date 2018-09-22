<!DOCTYPE html>

<html id="html">

<head>
		<title>II SECITEC - Programação</title>


			 <!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">

	 	<link rel="shortcut icon" href="img/faicon.png">

		<link rel="stylesheet" type="text/css" href="estilo/imprimir.css">
		<link rel="stylesheet" type="text/css" href="estilo/default.css">
		<meta charset="utf-8">

</head>

<script type="text/javascript">
		var localPag;
		function topoOfertas (local){
			localPag = local;
			setTimeout(ajusatPagina, 500);

		}

		function ajusatPagina (local){
			 window.location="minicursos.php#"+localPag;
		}

</script>

<?php 
function limitarTexto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {      
      $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
      return $texto;
  }
  else{
    return $texto;
  }
} 
?>



<body>



<div class="container">
  <h1 class="page-header">Nome do curso</h1>
  <div>
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th width="10%">Horário</th>
          <th width="22%">Terça 16/10</th>
          <th width="22%">Quarta 17/10</th>
          <th width="22%">Quinta 18/10</th>
          <th width="22%">Sexta 19/10</th>
        </tr>
      </thead>
      <tbody>


<?php

if(isset($_POST['imprimirrMinicurso'])){

    $id_Mcurso = $_POST['id_minicurso'];
    $sql = new Sql();


    $sql->query($codigo);



?>


        <tr>
          <td>8:00 - 10:00</td>
          <td>MC - A arte de falar em público</td>
          <td>MC - economia popular e solidária</td>
          <td>MC - Estudo da viabilidade econômica</td>
          <td>MC - Marketing de serviços: atendimento</td>
        </tr>  


<?php

}

?>


      </tbody>
    </table>
    </div>
</div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    
</body>

</html>