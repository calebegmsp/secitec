<!DOCTYPE html>

<html>

<head>
		<title>SECITEC - Minicursos</title>


			 <!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">

	 	<link rel="shortcut icon" href="img/faicon.png">

		<link rel="stylesheet" type="text/css" href="estilo/minicurso.css">
		<link rel="stylesheet" type="text/css" href="estilo/default.css">
		<meta charset="utf-8">

</head>

<body>


<div class="container inicial">

	<!-- MENU -->
		<header>
			<nav class="navbar navbar-expand-lg topo">

			  <a class="men topo" href="index.html"><h1>II SECI<span id="tec">TEC</span></h1></a>

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
								<a class="dropdown-item" href="palestras.html">Palestras</a>
								<a class="dropdown-item" href="mesaredonda.html">Mesa redonda</a>
							</div>
						</div>	
					</li>

					<li class="nav-item menu">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle botao type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programação</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="programacao-minucursos.html">Minicursos</a>
								<a class="dropdown-item" href="programacao-palestras.html">Palestras</a>
								<a class="dropdown-item" href="programacao-mesaredonda.html">Mesa redonda</a>
							</div>
						</div>	
					</li>

					<li class="nav-ite menu">
						<a class="nav-link" href="duvidas.html">Dúvidas</a>
					</li>

			    </ul>

			  </div>
			</nav>
		</header>

	<!-- FIM MENU -->




	<div class="minicursos">
				
		<h1 class="h1">Palestras</h1>
				
	    <div class="container">

	        <div class="row">

				<div class="accordion container" id="accordion">

					<div class="row">


<!--  Aqui começa a gerar os cursos  -->
<?php 

	require_once("DAO/config.php");
	require_once("DAO/class/sql.php");

	$sql = new Sql();

	$cursos = $sql->select("SELECT id_curso, nome_curso, imgPadrao_curso FROM Curso");


/* Esse for roda por todos os cursos */
	foreach ($cursos as $row) {

	$nomeCurso = array();
	$contC = 0;

/* Esse for pega as informações do curso e insere em nomeCurso */
	$cont1 = 0;
	foreach ($row as $key => $value) {
		
		$nomeCurso[$cont1] = $value;
		$cont1++;

	}

?>



<!----------------------------------------------- CURSO  1 ----------------------------------------------------------->

					    <div class="col-md-12">

						     <a class="btn-duv" href="#" data-toggle="collapse" data-target="#<?= $nomeCurso[0]?>" aria-expanded="true">
									    <div class="row D1">
									    	<div class="col-md-12 text">
									    		 <span class="duv-text">
									    		 	<?php
									    		 	echo $nomeCurso[1];
									    		 	?>

									    		 </span>
							                </div>
							            </div>
						    </a>

						    <div id="<?= $nomeCurso[0]?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

						     	<div class="card-body resposta">

						        	<div class="row row-card">



<?php


/*************************************************************

 AQUI NASCEM OS MINICURSOS

*************************************************************/

$minicursos = $sql->select("SELECT M.id_Mcurso, M.nome_Mcurso, M.des_Mcurso, M.local_Mcurso, M.dia_Mcurso,
							M.ministrante_Mcurso, M.ch_Mcurso, M.vagas_Mcurso, M.img_Minicurso, M.FK_Curso_id_curso 
							FROM Palestras as M
							INNER JOIN Curso as C on M.FK_Curso_id_curso = C.id_curso 
							WHERE M.FK_Curso_id_curso = $nomeCurso[0] 
							ORDER BY dia_Mcurso");


foreach ($minicursos as $row) {

	$valor = array();


/* Esse for pegas as informações dos minicursos e joga em valor */
	$cont = 0;
	foreach ($row as $key => $value) {
		
		$valor[$cont] = $value;
		$cont++;

	}

/* Trata a imagem do minicurso */

$imgMinicurso;

if (file_exists($valor[8])){
	$imgMinicurso = $valor[8];
} else {
	$imgMinicurso = $nomeCurso[2];
}

/* Trata a cor dos card */

if (($contC % 2) == 0){
	$corCard = "card-azul-claro";
} else {
	$corCard = "card-azul-escuro";
}
		?>

										<div class="col-md-4 card-full">

											  <a data-toggle="modal" data-target="#<?= $nomeCurso[0]; ?>a<?=$contC; ?>">

												<div class="card <?=$corCard?>">

												  <img class="card-img-top" src="<?=$imgMinicurso?>" alt="Card image cap">

													<div class="card text-white bg-info">

													  <div class="card-body">
													    <h5 class="card-title">
													   	
													   	<?php
													   		if (strlen($valor[1]) < 60){
													   			echo $valor[1];
													   		} else {
													   			echo substr($valor[1], 0, 60)."...";
													   		}

													   	?>


														</h5>

														<?php
													   		if (strlen($valor[2]) < 70){
													   			echo $valor[2];
													   		} else {
													   			echo substr($valor[2], 0, 70)."...";
													   		}
													   	?>


														<div class="card-info">
															<span class="dia">
														  	
														  	<?php
														   		echo $valor[3];
														   	?>

														  	</span>	 <br>
														  	<span class="dia">
														  	<?php
														  	$date = new DateTime($valor[4]);
															echo $date->format('d/m/Y');
															echo " às ".$date->format('H')."h".$date->format('i')."min";
														   	?>

														  	</span>	
														</div>
													  	
													  </div>

													</div>

												</div>	

											  </a>	

											<!-- Modal -->

											<div class="modal fade" id="<?= $nomeCurso[0]; ?>a<?=$contC; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											    <div class="modal-dialog modal-dialog-centered" role="document">
											    	<div class="modal-content">

												        <div class="modal-header">
													        <h5 class="modal-title" id="exampleModalCenterTitle">
													        	
													        <?php
													   		echo $valor[1];
													   		?>

													        </h5>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													        <span aria-hidden="true">&times;</span>
													        </button>
												     	</div>

												    	<div class="modal-body">
												        <?php
													   		echo $valor[2];
													   	?>
												        .<br><br>
												        <span class="sobre">
												        Ministrante: 
												        <?php
													   		echo $valor[5];
													   	?>	
												        <br>
												        Carga horária: 
									  		    		<?php
													   		echo number_format($valor[6],2,":",".")." horas";
													   	?>	
									  		    		<br>
									  		    		Número de vagas:
											    		<?php
													   		echo $valor[7];
													   	?>	<br>
													   	Local: 
											    		<?php
													   		echo $valor[3];
													   	?>	
											    		<br>
											    		<?php
														  	$date = new DateTime($valor[4]);
															echo $date->format('d/m/Y');
															echo " às ".$date->format('H')."h".$date->format('i')."min";
														 ?>
											    		</span>
											    		</div>

												     	<div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												     	</div>

											    	</div>

											    </div>

											</div> 

						        		</div>

<?php


//Esse cont é para os id de minicursos
$contC++;

//Fechamento do for de cada minicurso
}

/************************************************************

 AQUI JÁS OS MINICURSOS

*************************************************************/

?>
	        		</div>
				</div>
	       	</div>
	    </div>

<?php

//Fechamento do for de cada curso
}

?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


 
 <footer id="rodape">
 	<div class="container">
 		<div class="row">
	 		<div class="col-md-6 direitos">
	      	 <p class="text-direitos" >II SECITEC &copy; Icons made by Freepik from <a class="rodape-link" href="https://www.flaticon.com" target="_blank" >www.flaticon.com</a></p>
	     	</div>
	     	<div class="col-md-6 desenvolvido">
	      	 <p class="text-direitos" >Desenvolvido por <b>Calebe Pereira</b> e <b>Layne Castro</b></p>
	     	</div>
 		</div>	
 	</div>
 	


</div>


    
<!-- Optional JavaScript -->
<!-- jQuery first, then Bootstrap JS -->

<script type="text/javascript" src="bootstrap/js/jquery.js"></script>

<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


    
</body>