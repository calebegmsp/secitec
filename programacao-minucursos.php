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

	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

	<script type="text/javascript">
		$(window).scroll(function() {
		if ($(this).scrollTop() > 700){  
		    $('header').addClass("fixed-top");
		  }
		  else{
		    $('header').removeClass("fixed-top");
		  }
		});
	</script>

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
							<a class="dropdown-item" href="palestras.php">Palestras</a>
						</div>
					</div>	
				</li>

				<li class="nav-item menu">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle botao type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programação</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Minicursos</a>
							<a class="dropdown-item" href="programacao-palestras.html">Palestras</a>
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





		<div class="programaco">
			
        <div class="container">

        	<div class="row prog">

        		<div class="col-md-2">

        			<nav class="nav flex-column navegacao">

					  <a class="nav-link dia active" id="dia1-tab" data-toggle="tab" href="#dia1" role="tab" aria-controls="dia1" aria-selected="true">Dia 16</a>
					  <a class="nav-link dia" id="dia2-tab" data-toggle="tab" href="#dia2" role="tab" aria-controls="dia2" aria-selected="true">Dia 17</a>
					  <a class="nav-link dia" id="dia3-tab" data-toggle="tab" href="#dia3" role="tab" aria-controls="dia3" aria-selected="true">Dia 18</a>
					  <a class="nav-link dia" id="dia4-tab" data-toggle="tab" href="#dia4" role="tab" aria-controls="dia3" aria-selected="true">Dia 19</a>
					  
					</nav>

        		</div>

        		<?php
	        		require_once("DAO/config.php");
	        		require_once("DAO/class/sql.php");
	        		$sql = new Sql();
	        		$cursos = $sql->select("SELECT id_curso, nome_curso, imgPadrao_curso FROM Curso");
        		 ?>


        		<div class="tab-content" id="myTabContent">

        			<p>
        				<div class="dropdown">
        					<button class="btn btn-secondary dropdown-toggle botao type="button" id="dropdownMenuButtonCurso" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selecione o curso</button>


        					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        						<?php 
	        						foreach ($cursos as $key => $value) {
	        					?>

	        							<button id="<?= $cursos[$key]['id_curso']; ?>" class="dropdown-item" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="funcao<?php echo $cursos[$key]['id_curso']; ?>()">
	        								<?php echo $cursos[$key]['nome_curso'];?>
	        							</button>

	        							<script>
	        								function funcao<?php echo $cursos[$key]['id_curso']; ?>() {
	        									document.getElementById("dropdownMenuButtonCurso").innerHTML = document.getElementById("<?php echo $cursos[$key]['id_curso']; ?>").innerHTML;
	        									document.getElementById('dia1-tab').href = '<?php echo $cursos[$key]['id_curso'].'dia1';?>';
	        									document.getElementById('dia2-tab').href = '<?php echo $cursos[$key]['id_curso'].'dia2';?>';
	        									document.getElementById('dia3-tab').href = '<?php echo $cursos[$key]['id_curso'].'dia3';?>';
	        									document.getElementById('dia4-tab').href = '<?php echo $cursos[$key]['id_curso'].'dia4';?>';
	        								}
	        							</script>


	        							<?php
	        						}

        						 ?>
        					</div>
        				</div>	

        			</p>



        			<?php

        				foreach ($cursos as $key => $value) {
	        				$minicursos = $sql->select("SELECT M.id_Mcurso, M.nome_Mcurso, M.local_Mcurso, M.dia_Mcurso, M.FK_Curso_id_curso 
														FROM Minicurso as M
														INNER JOIN Curso as C on M.FK_Curso_id_curso = C.id_curso 
														WHERE 
														ORDER BY dia_Mcurso");	

						}

        			?>


        				<!--------------------------- DIA 1 ------------------------------->


 					<div class="tab-pane fade show active" id="<?= $cursos[0]['id_curso'].'dia1';?>" role="tabpanel" aria-labelledby="dia1-tab">

		        		<div class="col-md-10 dia-">
		        			<span class="title">Minicursos dia 1</span>

		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora">8:00<br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10">
			        					<div class="card text-white bg-info mb-3" style="width: 100%;">
										  <div class="card-header">Arduino para iniciantes</div>
										  <div class="card-body">
										    <h5 class="card-title">Local: Sala 1</h5>
										  </div>
										</div>
										<div class="card text-white bg-info mb-3" style="width: 100%;">
										  <div class="card-header">Big Data: Introdução</div>
										  <div class="card-body">
										    <h5 class="card-title">Local: Sala 5</h5>
										  </div>
										</div>	
		        				</div>
		        			</div>

		        		</div> 						
        			</div>

        			
 					<!------------------------- FIM DIA 1 ----------------------------->



 					<!--------------------------- DIA 2 ------------------------------->
 					<div class="tab-pane fade" id="<?= $cursos[1]['id_curso'].'dia2';?>" role="tabpanel" aria-labelledby="dia2-tab">

		        		<div class="col-md-10 dia-">
		        			<span class="title">Minicursos dia 2</span>

		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora">8:00<br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10">
		        					<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Conhecendo Assembly</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 3</h5>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Binario passo a passo</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 20</h5>
									  </div>
									</div>	
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Linux para iniciantes</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 17</h5>
									  </div>
									</div>		
		        				</div>
		        			</div>


		        		</div>

 					</div> 
 					<!------------------------- FIM DIA 2 ----------------------------->



 					<!--------------------------- DIA 3 ------------------------------->
 					<div class="tab-pane fade" id="<?= $cursos[2]['id_curso'].'dia3';?>" role="tabpanel" aria-labelledby="dia3-tab">

		        		<div class="col-md-10 dia-">
		        			<span class="title">Minicursos dai 3</span>

		        			<!-- HORA -->


		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora">10:00<br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10">
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">PHP é legal</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 11</h5>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Internet das coisas</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 31</h5>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Gamificação</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 10</h5>
									  </div>
									</div>	
		        				</div>
		        			</div>
		        			<!-- FIM HORA -->

		        		</div>

 					</div> 
 					<!------------------------- FIM DIA 3 ----------------------------->

 					<!--------------------------- DIA 4 ------------------------------->
 					<div class="tab-pane fade" id="<?= $cursos[3]['id_curso'].'dia4';?>" role="tabpanel" aria-labelledby="dia3-tab">

		        		<div class="col-md-10 dia-">
		        			<span class="title">Minicursos dai 4</span>

		        			<!-- HORA -->


		        			<div class="row ofertas">
		        				<div class="col-2 horario">
		        					<span class="text-hora">10:00<br></span>
		        					
		        					<img class="linha" src="img/linha.png">
		        				</div>

		        				<div class="col-10">
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">PHP é legal</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 11</h5>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Internet das coisas</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 31</h5>
									  </div>
									</div>
									<div class="card text-white bg-info mb-3" style="width: 100%;">
									  <div class="card-header">Gamificação</div>
									  <div class="card-body">
									    <h5 class="card-title">Local: Sala 10</h5>
									  </div>
									</div>	
		        				</div>
		        			</div>
		        			<!-- FIM HORA -->

		        		</div>

 					</div> 
 					<!------------------------- FIM DIA 4 ----------------------------->


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
 	
 </footer>




 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>