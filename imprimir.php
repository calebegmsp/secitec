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

function dateMaisch($data, $ch){
   $date = new DateTime($data);
   
   $hora = explode('.', $ch);

   $horaCh = (int) $hora[0];
   $minutoCh = (int) ($hora[1] . "0");

   $horaInicio = (int) $date->format('H');
   $minutoInicio = (int) $date->format('i');

   $mostrarHora = $horaCh + $horaInicio;
   $mostraMinuto = $minutoCh + $minutoInicio;

   if ($mostraMinuto >= 60) {
     $mostraMinuto = $mostraMinuto - 60;
     $mostrarHora ++;
   }

   if ($mostraMinuto < 10){
      $mostraMinuto = $mostraMinuto."0";
   }

   echo $mostrarHora.":".$mostraMinuto;

}


?>



<body>

<?php

if(isset($_POST['cursoImprimir'])){
    require_once("DAO/config.php");
    require_once("DAO/class/sql.php");

    $sql = new Sql();

    $id_Mcurso = $_POST['cursoImprimir'];



$curso = $sql->select("SELECT nome_curso FROM curso WHERE id_curso = $id_Mcurso");   
?>




<div class="container area">
  <div class="row">
    <h1 class="page-header col-12 titulo">Programação II SECITEC</h1>  
  </div>
  <div class="row">
    <div class="col-10">
      <h1 class="page-header col-10"><?php echo $curso[0]['nome_curso']; ?></h1>  
    </div>
    <div class="col-2">
      <input class="btn-imprimir" type="button" name="imprimir" value="Imprimir" onclick="window.print();">
    </div>
    
  </div>
 
<div class="row">

  <div class="col-3 paddingCol">
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th width="35%">Horário</th>
          <th width="65%">Terça 16/10</th>
        </tr>
      </thead>
      <tbody>

<?php


    $atividades = $sql->select("
(select 1 as atv, M.nome_Mcurso as nomeatv, M.dia_Mcurso as dia, M.local_Mcurso as local, M.ch_Mcurso as ch, M.ministrante_Mcurso as ministrante FROM minicurso as M INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND M.dia_Mcurso like '2018-10-16%')
UNION ALL
(select 2 as atv, P.nome_Mcurso as nomeatv, P.dia_Mcurso as dia, P.local_Mcurso as local, P.ch_Mcurso as ch, P.ministrante_Mcurso as ministrante  FROM palestras as P INNER JOIN curso as C on P.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND P.dia_Mcurso like '2018-10-16%')
UNION ALL
(select 3 as atv, O.nome_Mcurso as nomeatv, O.dia_Mcurso as dia, O.local_Mcurso as local, O.ch_Mcurso as ch, O.ministrante_Mcurso as ministrante FROM outraatv as O INNER JOIN curso as C on O.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND O.dia_Mcurso like '2018-10-16%')
ORDER BY dia
      ");

  foreach ($atividades as $key => $value) {
    $date = new DateTime($atividades[$key]['dia']);


 ?>


        <tr>
          <td class="hora"><?php echo $date->format('H:i'). " - "; echo dateMaisch($atividades[$key]['dia'], $atividades[$key]['ch']); ?></td>
          <td>

          <?php 

            switch ($atividades[$key]['atv']) {
              case 1:
                echo "MC - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 2:
                echo "PL - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 3:
                echo limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;

              default:
                # code...
                break;
            }
            
          ?>
            

          </td>
        </tr>  

<?php
}
?>

      </tbody>


    </table>

  </div>

<!-- DIA 17 -->

  <div class="col-3 paddingCol">
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th width="35%">Horário</th>
          <th width="65%">Quarta 17/10</th>
        </tr>
      </thead>
      <tbody>

<?php


    $atividades = $sql->select("
(select 1 as atv, M.nome_Mcurso as nomeatv, M.dia_Mcurso as dia, M.local_Mcurso as local, M.ch_Mcurso as ch, M.ministrante_Mcurso as ministrante FROM minicurso as M INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND M.dia_Mcurso like '2018-10-17%')
UNION ALL
(select 2 as atv, P.nome_Mcurso as nomeatv, P.dia_Mcurso as dia, P.local_Mcurso as local, P.ch_Mcurso as ch, P.ministrante_Mcurso as ministrante  FROM palestras as P INNER JOIN curso as C on P.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND P.dia_Mcurso like '2018-10-17%')
UNION ALL
(select 3 as atv, O.nome_Mcurso as nomeatv, O.dia_Mcurso as dia, O.local_Mcurso as local, O.ch_Mcurso as ch, O.ministrante_Mcurso as ministrante FROM outraatv as O INNER JOIN curso as C on O.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND O.dia_Mcurso like '2018-10-17%')
ORDER BY dia
      ");

  foreach ($atividades as $key => $value) {
    $date = new DateTime($atividades[$key]['dia']);


 ?>


        <tr>
          <td class="hora"><?php echo $date->format('H:i'). " - "; echo dateMaisch($atividades[$key]['dia'], $atividades[$key]['ch']); ?></td>
          <td>

          <?php 

            switch ($atividades[$key]['atv']) {
              case 1:
                echo "MC - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 2:
                echo "PL - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 3:
                echo limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;

              default:
                # code...
                break;
            }
            
  
          ?>
            

          </td>
        </tr>  

<?php
}
?>

      </tbody>


    </table>

  </div>

<!-- DIA 18 -->


  <div class="col-3 paddingCol">
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th width="35%">Horário</th>
          <th width="65%">Quinta 18/10</th>
        </tr>
      </thead>
      <tbody>

<?php


    $atividades = $sql->select("
(select 1 as atv, M.nome_Mcurso as nomeatv, M.dia_Mcurso as dia, M.local_Mcurso as local, M.ch_Mcurso as ch, M.ministrante_Mcurso as ministrante FROM minicurso as M INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND M.dia_Mcurso like '2018-10-18%')
UNION ALL
(select 2 as atv, P.nome_Mcurso as nomeatv, P.dia_Mcurso as dia, P.local_Mcurso as local, P.ch_Mcurso as ch, P.ministrante_Mcurso as ministrante  FROM palestras as P INNER JOIN curso as C on P.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND P.dia_Mcurso like '2018-10-18%')
UNION ALL
(select 3 as atv, O.nome_Mcurso as nomeatv, O.dia_Mcurso as dia, O.local_Mcurso as local, O.ch_Mcurso as ch, O.ministrante_Mcurso as ministrante FROM outraatv as O INNER JOIN curso as C on O.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND O.dia_Mcurso like '2018-10-18%')
ORDER BY dia
      ");

  foreach ($atividades as $key => $value) {
    $date = new DateTime($atividades[$key]['dia']);


 ?>


        <tr>
          <td class="hora"><?php echo $date->format('H:i'). " - "; echo dateMaisch($atividades[$key]['dia'], $atividades[$key]['ch']);?></td>
          <td>

          <?php 

            switch ($atividades[$key]['atv']) {
              case 1:
                echo "MC - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 2:
                echo "PL - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 3:
                echo limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;

              default:
                # code...
                break;
            }
  
          ?>
            

          </td>
        </tr>  

<?php
}
?>

      </tbody>


    </table>

  </div>

<!-- DIA 19 -->

  <div class="col-3 paddingCol">
    <table class="table-striped table-bordered">
      <thead>
        <tr>
          <th width="35%">Horário</th>
          <th width="65%">Sexta 19/10</th>
        </tr>
      </thead>
      <tbody>

<?php


    $atividades = $sql->select("
(select 1 as atv, M.nome_Mcurso as nomeatv, M.dia_Mcurso as dia, M.local_Mcurso as local, M.ch_Mcurso as ch, M.ministrante_Mcurso as ministrante FROM minicurso as M INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND M.dia_Mcurso like '2018-10-19%')
UNION ALL
(select 2 as atv, P.nome_Mcurso as nomeatv, P.dia_Mcurso as dia, P.local_Mcurso as local, P.ch_Mcurso as ch, P.ministrante_Mcurso as ministrante  FROM palestras as P INNER JOIN curso as C on P.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND P.dia_Mcurso like '2018-10-19%')
UNION ALL
(select 3 as atv, O.nome_Mcurso as nomeatv, O.dia_Mcurso as dia, O.local_Mcurso as local, O.ch_Mcurso as ch, O.ministrante_Mcurso as ministrante FROM outraatv as O INNER JOIN curso as C on O.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso AND O.dia_Mcurso like '2018-10-19%')
ORDER BY dia
      ");

  foreach ($atividades as $key => $value) {
    $date = new DateTime($atividades[$key]['dia']);


 ?>


        <tr>
          <td class="hora"><?php echo $date->format('H:i'). " - "; echo dateMaisch($atividades[$key]['dia'], $atividades[$key]['ch']); ?></td>
          <td>

          <?php 

            switch ($atividades[$key]['atv']) {
              case 1:
                echo "MC - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 2:
                echo "PL - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 3:
                echo limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;

              default:
                # code...
                break;
            }
          ?>
            

          </td>
        </tr>  

<?php
}
?>

      </tbody>


    </table>

  </div>

</div>




<!---------------------------------------------------------------------------->


    <table class="table-striped table-bordered table2">
      <thead>

        <tr>
          <th width="20%">SIGLA</th>
          <th width="40%">DESCRIÇÃO</th>
          <th width="40%">LOCAL</th>
        </tr>
      </thead>
      <tbody>

<?php

    $atividades = $sql->select("
(select 1 as atv, M.nome_Mcurso as nomeatv, M.dia_Mcurso as dia, M.local_Mcurso as local, M.ch_Mcurso as ch, M.ministrante_Mcurso as ministrante FROM minicurso as M INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso)
UNION ALL
(select 2 as atv, P.nome_Mcurso as nomeatv, P.dia_Mcurso as dia, P.local_Mcurso as local, P.ch_Mcurso as ch, P.ministrante_Mcurso as ministrante  FROM palestras as P INNER JOIN curso as C on P.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso)
UNION ALL
(select 3 as atv, O.nome_Mcurso as nomeatv, O.dia_Mcurso as dia, O.local_Mcurso as local, O.ch_Mcurso as ch, O.ministrante_Mcurso as ministrante FROM outraatv as O INNER JOIN curso as C on O.FK_Curso_id_curso = C.id_curso WHERE C.id_curso = $id_Mcurso)
ORDER BY dia
      ");


  foreach ($atividades as $key => $value) {

 ?>

        <tr>
          <td width="20%"><?php 
            switch ($atividades[$key]['atv']) {
              case 1:
                echo "MC - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 2:
                echo "PL - ".limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;
              case 3:
                echo limitarTexto($atividades[$key]['nomeatv'],30)." (".$atividades[$key]['local'].")"; 
                break;

              default:
                # code...
                break;
            }

          ?></td>
          <td width="60%"><?php echo $atividades[$key]['nomeatv']; ?></td>
          <td width="20%"><?php echo $atividades[$key]['local']; ?></td>
        </tr>


<?php
}
?>

      </tbody>
    </table>

</div>




<?php
}
?>



 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    
</body>

</html>
