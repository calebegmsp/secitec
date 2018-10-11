<!DOCTYPE html>

<html>

<head>
		<title>SECITEC - Programação</title>


		<!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">

	 	<link rel="shortcut icon" href="img/faicon.png">

		<link rel="stylesheet" type="text/css" href="estilo/programacao.css">
		<link rel="stylesheet" type="text/css" href="estilo/default.css">
		<meta charset="utf-8">


</head>


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


function criarCard($nomeCurso, $localCurso){
	echo "<div class='card text-white bg-info mb-3' style='width: 100%;'>
				<div class='card-header'>".$nomeCurso."</div>
					<div class='card-body'>
						<h5 class='card-title'> Local: ".$localCurso."</h5>
					</div>
				</div>";
}




 ?>












<body>


	<div class="container inicial">

<!-- MENU -->
	<header>
		<nav class="navbar navbar-expand-lg topo">

		  <a class="men topo" href="index.html"><img class="logomarca" src="img/logomarca.png"></a>

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>


		  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

		    <ul class="navbar-nav">
				<li class="nav-item menu">
					<a class="nav-link" href="index.html">Home</a>
				</li>

				<li class="nav-item menu">
					<a class="nav-link" href="sobre.html">Sobre</a>
				</li>	

				<li class="nav-item menu">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle botao type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Atividades</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="minicursos.php">Minicursos</a>
							<a class="dropdown-item" href="palestras.php">Palestras</a>
							<a class="dropdown-item" href="outras.php">Outras</a>
						</div>
					</div>	
				</li>

				<li class="nav-item menu">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle botao type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programação</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Minicursos</a>
							<a class="dropdown-item" href="programacao-palestras.php">Palestras</a>
							<a class="dropdown-item" href="programacao-outras.php">Outras</a>
						</div>
					</div>	
				</li>

				<li class="nav-ite menu">
					<!--<a class="nav-link" href="duvidas.html">Dúvidas</a>-->
				</li>

		    </ul>

		  </div>
		</nav>
	</header>
<!-- FIM MENU -->





		<div class="programaco">
			
        <div class="container">
		<div class="row">
			<h2 class="avisoSelecione">Para verificar a programação escolha o curso abaixo.<h2>
		</div>

        	<div class="row prog">

        		<div class="col-md-2">

        			<nav id="navDias" class="nav flex-column navegacao dias">

        				<a class="nav-linkP diaP active" id="dia1-tab" data-toggle="tab" href="#dia1" role="tab" aria-controls="dia1">Dia 16</a>
						<a class="nav-linkP diaP" id="dia2-tab" data-toggle="tab" href="#dia2" role="tab" aria-controls="dia2" >Dia 17</a>
						<a class="nav-linkP diaP" id="dia3-tab" data-toggle="tab" href="#dia3" role="tab" aria-controls="dia3" >Dia 18</a>
						<a class="nav-linkP diaP" id="dia4-tab" data-toggle="tab" href="#dia4" role="tab" aria-controls="dia4" >Dia 19</a>
					</nav>

        		</div>

        		<?php
	        		require_once("DAO/config.php");
	        		require_once("DAO/class/sql.php");
	        		$sql = new Sql();
	        		$cursos = $sql->select("SELECT id_curso, nome_curso FROM curso ORDER BY nome_curso");
        		 ?>


        		<div class="tab-content" id="myTabContent">

        			<p>
        				<div class="dropdown">
        					<button class="btn-secondary dropdown-toggle botao botao-" type="button" id="dropdownMenuButtonCurso" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selecione o curso</button>
        					<form action="imprimir.php" method="post" target="_blank">
        						<button name="cursoImprimir" type="submit" id="btnpcompleta" value="0" class="btn pcompleta">Ver programação completa do curso</button>
        					</form>


        					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        						<?php 
									$antigoHd = $cursos[0]['id_curso'].'dia1';
	        						foreach ($cursos as $key => $value) {
	        							$idCurso = $cursos[$key]['id_curso'];
	        							$contCursos = $minicursos = $sql->select("SELECT M.id_Mcurso FROM minicurso as M
																				INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso 
																				WHERE M.FK_Curso_id_curso = $idCurso");
	        							if (count($contCursos) > 0){	        						



	        					?>

	        							<button id="<?= $cursos[$key]['id_curso']; ?>" class="dropdown-item" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="funcao<?php echo $cursos[$key]['id_curso']; ?>()">
	        								<?php echo $cursos[$key]['nome_curso'];?>
	        							</button>

	        							<script>
	        								

	        								function funcao<?php echo $cursos[$key]['id_curso']; ?>() {
	        									
	        									if (true){
	        										document.getElementById('navDias').className  = 'nav flex-column navegacao nav-50';
	        									}

	        									<?php

	        									foreach ($cursos as $key1 => $value) {
	        										?>
	        										document.getElementById('<?= $cursos[$key1]['id_curso'].'dia1';?>').className  = 'tab-pane fade';
	        										document.getElementById('<?= $cursos[$key1]['id_curso'].'dia2';?>').className  = 'tab-pane fade';
	        										document.getElementById('<?= $cursos[$key1]['id_curso'].'dia3';?>').className  = 'tab-pane fade';
	        										document.getElementById('<?= $cursos[$key1]['id_curso'].'dia4';?>').className  = 'tab-pane fade';
	        										document.getElementById('dia1-tab').className  = 'nav-linkP diaP active';
	        										document.getElementById('dia2-tab').className  = 'nav-linkP diaP';
	        										document.getElementById('dia3-tab').className  = 'nav-linkP diaP';
	        										document.getElementById('dia4-tab').className  = 'nav-linkP diaP';
	        										document.getElementById('btnpcompleta').className  = 'btn';
	        										<?php
	        									}

	        									?>
	        									document.getElementById('btnpcompleta').value  = '<?= $cursos[$key]['id_curso'];?>';				
	        									document.getElementById("dropdownMenuButtonCurso").innerHTML = document.getElementById("<?php echo $cursos[$key]['id_curso']; ?>").innerHTML;
	        									document.getElementById('dia1-tab').href = '#<?php echo $cursos[$key]['id_curso'].'dia1';?>';
	        									document.getElementById('dia2-tab').href = '#<?php echo $cursos[$key]['id_curso'].'dia2';?>';
	        									document.getElementById('dia3-tab').href = '#<?php echo $cursos[$key]['id_curso'].'dia3';?>';
	        									document.getElementById('dia4-tab').href = '#<?php echo $cursos[$key]['id_curso'].'dia4';?>';
	        									document.getElementById('<?= $cursos[$key]['id_curso'].'dia1';?>').className  = 'tab-pane fade show active';

	        									
	        									<?php 

	        									if ($antigoHd != $cursos[$key]['id_curso'].'dia1') {
	        										?>
												document.getElementById('<?= $antigoHd;?>').className  = 'tab-pane fade';
	        									<?php
	        										$antigoHd = $cursos[$key]['id_curso'].'dia1';
	        									}
	        									?>
	        								}
	        							</script>


	        							<?php
	        						}
	        					}

        						 ?>
        					</div>
        				</div>	

        			</p>



        			<?php

        				foreach ($cursos as $key => $value) {

        			?>


        				<!--------------------------- DIA 1 ------------------------------->


 					<div class="tab-pane fade" id="<?= $cursos[$key]['id_curso'].'dia1';?>" role="tabpanel" aria-labelledby="dia1-tab">

		        		<div class="col dia-col">
		        			<span class="title">Minicursos do dia 16</span>


		        				<?php
		        				$codigoBuscaPorDia = "SELECT DISTINCT M.nome_Mcurso, M.local_Mcurso, M.dia_Mcurso
		        				FROM minicurso as M
		        				INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso 
		        				WHERE M.dia_Mcurso >='2018-10-16 00:00:00'
		        				AND M.dia_Mcurso <'2018-10-17 00:00:00' AND C.id_curso =". (int)$cursos[$key]['id_curso'].
		        				" ORDER BY dia_Mcurso";
		        				$minicursos = $sql->select("$codigoBuscaPorDia");
		        				$hora = 25;

		        				if (!count($minicursos)) {
		        					echo "<br/><span class='AvisoNenhumCurso'>Nenhum minicurso nesse dia</span>";
		        				}


		        				foreach ($minicursos as $keyM => $value) {

		        				$horaAnterior = new DateTime($minicursos[$keyM]['dia_Mcurso']);
								
								if ($hora != $horaAnterior->format('H:i')) {
									# code...


		        				?>


		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora"><?php echo $horaAnterior->format('H:i') ?><br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10 dia1">


		        					<?php
		        					$keyMM = $keyM;
		        					$HoraIgual = $minicursos[$keyM]['dia_Mcurso'];
		        					do {
		        						criarCard($minicursos[$keyMM]['nome_Mcurso'],$minicursos[$keyMM]['local_Mcurso']);		        						
		        						$keyMM++;	
		        					} while ($keyMM < count($minicursos)  && $minicursos[$keyMM]['dia_Mcurso'] == $HoraIgual)

		        					?>




		        				</div>
		        			</div>



								<?php

									}
									$hora = $horaAnterior->format('H:i');
								}

								?>

		        		</div> 						
        			</div>

        			
 					<!------------------------- FIM DIA 1 ----------------------------->



        				<!--------------------------- DIA 2 ------------------------------->


 					<div class="tab-pane fade" id="<?= $cursos[$key]['id_curso'].'dia2';?>" role="tabpanel" aria-labelledby="dia2-tab">

		        		<div class="col dia-col">
		        			<span class="title">Minicursos do dia 17</span>


		        				<?php
		        				$codigoBuscaPorDia = "SELECT DISTINCT M.nome_Mcurso, M.local_Mcurso, M.dia_Mcurso
		        				FROM minicurso as M
		        				INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso 
		        				WHERE M.dia_Mcurso >='2018-10-17 00:00:00'
		        				AND M.dia_Mcurso <'2018-10-18 00:00:00' AND C.id_curso =". (int)$cursos[$key]['id_curso'].
		        				" ORDER BY dia_Mcurso";
		        				$minicursos = $sql->select("$codigoBuscaPorDia");
		        				$hora = 25;
		        				if (!count($minicursos)) {
		        					echo "<br/><span class='AvisoNenhumCurso'>Nenhum minicurso nesse dia</span>";
		        				}

		        				foreach ($minicursos as $keyM => $value) {

		        				$horaAnterior = new DateTime($minicursos[$keyM]['dia_Mcurso']);

								

								if ($hora != $horaAnterior->format('H:i')) {
									# code...


		        				?>


		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora"><?php echo $horaAnterior->format('H:i') ?><br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10 dia1">


		        					<?php
		        					$keyMM = $keyM;
		        					$HoraIgual = $minicursos[$keyM]['dia_Mcurso'];
		        					do {
		        						criarCard($minicursos[$keyMM]['nome_Mcurso'],$minicursos[$keyMM]['local_Mcurso']);		        						
		        						$keyMM++;	
		        					} while ($keyMM < count($minicursos)  && $minicursos[$keyMM]['dia_Mcurso'] == $HoraIgual)

		        					?>




		        				</div>
		        			</div>



								<?php

									}
									$hora = $horaAnterior->format('H:i');
								}

								?>

		        		</div> 						
        			</div>

        			
 					<!------------------------- FIM DIA 2 ----------------------------->


        				<!--------------------------- DIA 3 ------------------------------->


 					<div class="tab-pane fade" id="<?= $cursos[$key]['id_curso'].'dia3';?>" role="tabpanel" aria-labelledby="dia2-tab">

		        		<div class="col dia-col">
		        			<span class="title">Minicursos do dia 18</span>


		        				<?php
		        				$codigoBuscaPorDia = "SELECT DISTINCT M.nome_Mcurso, M.local_Mcurso, M.dia_Mcurso
		        				FROM minicurso as M
		        				INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso 
		        				WHERE M.dia_Mcurso >='2018-10-18 00:00:00'
		        				AND M.dia_Mcurso <'2018-10-19 00:00:00' AND C.id_curso =". (int)$cursos[$key]['id_curso'].
		        				" ORDER BY dia_Mcurso";
		        				$minicursos = $sql->select("$codigoBuscaPorDia");
		        				$hora = 25;
		        				if (!count($minicursos)) {
		        					echo "<br/><span class='AvisoNenhumCurso'>Nenhum minicurso nesse dia</span>";
		        				}

		        				foreach ($minicursos as $keyM => $value) {

		        				$horaAnterior = new DateTime($minicursos[$keyM]['dia_Mcurso']);

								

								if ($hora != $horaAnterior->format('H:i')) {
									# code...


		        				?>


		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora"><?php echo $horaAnterior->format('H:i') ?><br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10 dia1">


		        					<?php
		        					$keyMM = $keyM;
		        					$HoraIgual = $minicursos[$keyM]['dia_Mcurso'];
		        					do {
										criarCard($minicursos[$keyMM]['nome_Mcurso'],$minicursos[$keyMM]['local_Mcurso']);		        						
		        						$keyMM++;	
		        					} while ($keyMM < count($minicursos)  && $minicursos[$keyMM]['dia_Mcurso'] == $HoraIgual)

		        					?>




		        				</div>
		        			</div>



								<?php

									}
									$hora = $horaAnterior->format('H:i');
								}

								?>

		        		</div> 						
        			</div>

        			
 					<!------------------------- FIM DIA 3 ----------------------------->


        				<!--------------------------- DIA 4 ------------------------------->


 					<div class="tab-pane fade" id="<?= $cursos[$key]['id_curso'].'dia4';?>" role="tabpanel" aria-labelledby="dia2-tab">

		        		<div class="col dia-col">
		        			<span class="title">Minicursos do dia 19</span>


		        				<?php
		        				$codigoBuscaPorDia = "SELECT DISTINCT M.nome_Mcurso, M.local_Mcurso, M.dia_Mcurso
		        				FROM minicurso as M
		        				INNER JOIN curso as C on M.FK_Curso_id_curso = C.id_curso 
		        				WHERE M.dia_Mcurso >='2018-10-19 00:00:00'
		        				AND M.dia_Mcurso <'2018-10-20 00:00:00' AND C.id_curso =". (int)$cursos[$key]['id_curso'].
		        				" ORDER BY dia_Mcurso";
		        				$minicursos = $sql->select("$codigoBuscaPorDia");
		        				$hora = 25;
		        				if (!count($minicursos)) {
		        					echo "<br/><span class='AvisoNenhumCurso'>Nenhum minicurso nesse dia</span>";
		        				}

		        				foreach ($minicursos as $keyM => $value) {

		        				$horaAnterior = new DateTime($minicursos[$keyM]['dia_Mcurso']);

								

								if ($hora != $horaAnterior->format('H:i')) {
									# code...


		        				?>


		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora"><?php echo $horaAnterior->format('H:i') ?><br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10 dia1">


		        					<?php
		        					$keyMM = $keyM;
		        					$HoraIgual = $minicursos[$keyM]['dia_Mcurso'];
		        					do {
										criarCard($minicursos[$keyMM]['nome_Mcurso'],$minicursos[$keyMM]['local_Mcurso']);		        						
		        						$keyMM++;	
		        					} while ($keyMM < count($minicursos)  && $minicursos[$keyMM]['dia_Mcurso'] == $HoraIgual)

		        					?>




		        				</div>
		        			</div>



								<?php

									}
									$hora = $horaAnterior->format('H:i');
								}

								?>

		        		</div> 						
        			</div>

        			
 					<!------------------------- FIM DIA 4 ----------------------------->



 				<?php 
 					}
 				?>



        		</div>


        	</div>    


        </div>    


	</div>

</div>

  


 <section id="realizacao">

 	<div class="container">
 		<div class="row imgs-patro no-select">
 			<div class="col-sm-8">
			
 				<span class="h1 text-patrocinio">REALIZAÇÃO</span>
 			 <div class="divBorda">
				<div class="container">
					<div class="row justify-content-md-center no-select"> 
						<img class="bordaRodape" src="img/linhaH.png">	
					</div>	
				</div>	
			</div>

 				<div class="row">
	 				<div class="col-sm">
	 					<img class="img-fluid img-reali" width="60%" src="img/logo-IfBaiano.png">	
	 				</div>	
	 				<div class="col-sm">
 						<img class="img-fluid img-reali" width="60%" src="img/logo-UniFG.png">	
 					</div>
 				</div>				
 			</div>
 			<div class="col-sm-4">

 				<span class="h1 text-patrocinio">APOIO</span>
			 <div class="divBorda">
				<div class="container">
					<div class="row justify-content-md-center no-select"> 
						<img class="bordaRodape" src="img/linhaH.png">	
					</div>	
				</div>	
			</div>

 				<div class="row">
 					<div class="col">
 						<img class="img-fluid img-reali" width="60%" src="img/logo-UNEB.png">		
 					</div>	
 				</div>
 			</div>
 		</div>
 	</div>

 </section>






 <section id="realizacao">

 	<div class="container">
 		<span class="h1 text-patrocinio">PATROCÍNIO</span>
		 <div class="divBorda">
			<div class="container">
				<div class="row justify-content-md-center no-select"> 
					<img class="bordaRodape" src="img/linhaH.png">	
				</div>	
			</div>	
		</div>

 		<div class="row imgs-patro no-select">
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-1.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-2.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-3.png">
 			</div>
 		</div>
 		<div class="row imgs-patro no-select">
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-4.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-5.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-6.png">
 			</div> 			
  			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-7.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-8.png">
 			</div>
 		</div>
 		<div class="row imgs-patro no-select">
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-9.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-10.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-11.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-12.png">
 			</div>
 			<div class="col-sm">
 				<img class="img-fluid img-patroci" src="img/img-patro/img-patro-13.png">
 			</div>
 		</div>
 	</div>

 </section>


<div class="divBorda">
	<div class="container">
		<div class="row justify-content-md-center no-select"> 
			<img class="bordaRodape" src="img/linhaH.png">	
		</div>	
	</div>	
</div>
 
 <footer id="rodape" class="footer navbar-fixed-bottom">
 	<div class="container">
 		<div class="row">
	 		<div class="col-md-6 direitos">
	      	 <p class="text-direitos" >II SECITEC &copy; 2018 Icons made by Freepik from <a class="rodape-link" href="https://www.flaticon.com" target="_blank" >www.flaticon.com</a></p>
	     	</div>
	     	<div class="col-md-6 desenvolvido">
	      	 <p class="text-direitos" >Desenvolvido por <b>Calebe Pereira</b> e <b>Layne Castro</b></p>
	     	</div>
 		</div>	
 	</div>
 </footer>




 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>