
<!DOCTYPE html>

<html>

<head>
		<title>SECITEC - Minicursos</title>


			 <!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">

	 	<link rel="shortcut icon" href="img/faicon.png">

		<link rel="stylesheet" type="text/css" href="estilo/minicursos.css">
		<meta charset="utf-8">

	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

	<script type="text/javascript">
		$(window).scroll(function() {
		if ($(this).scrollTop() > 750){  
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
								<a class="dropdown-item" href="#">Minicursos</a>
								<a class="dropdown-item" href="palestras.html">Palestras</a>
								<a class="dropdown-item" href="projetos.html">Projetos</a>
							</div>
						</div>	
					</li>

					<li class="nav-item menu">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle botao type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programação</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="programacao-minucursos.html">Minicursos</a>
								<a class="dropdown-item" href="programacao-palestras.html">Palestras</a>
								<a class="dropdown-item" href="programacao-projetos.html">Projetos</a>
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
				
		<h1 class="h1">Minicursos</h1>
				
	    <div class="container">

	        <div class="row">

				<div class="accordion container" id="accordion">

					<div class="row">

	<!----------------------------------------------- CURSO  1 ----------------------------------------------------------->

					    <div class="col-md-12">

						     <a class="btn-duv" href="#" onclick="toggle('maisinfo');" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									    <div class="row D1">
									    	<div class="col-md-12 text">
									    		 <span class="duv-text">Análise e Desenvolvimento de Sistemas</span>
							                </div>
							            </div>
						    </a>

						    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

						     	<div class="card-body resposta">

						        	<div class="row">

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------->
										<div class="col-md-4 card-full">

											  <a data-toggle="modal" data-target="#ads1">

												<div class="card card-azul-escuro">

												  <img class="card-img-top" src="img/img-cards/minicursos/minicurso-card-android.png" alt="Card image cap">

													<div class="card text-white bg-info">

													  <div class="card-body">
													    <h5 class="card-title">Android para iniciantes</h5>
													    <p class="card-text">Lorem ipsum sociosqu aliquet libero praesent interdum diam, mauris platea odio faucibus convallis.</p>
													  	<span class="dia">
													  		Local: Sala 3
													  	</span>	 <br>
													  	<span class="dia">
													  		16 out de 2018
													  	</span>
													  	<span class="dia">
													  		Horário: 08:00 AM
													  	</span>
													  </div>

													</div>

												</div>	

											  </a>	

											<!-- Modal -->

											<div class="modal fade" id="ads1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											    <div class="modal-dialog modal-dialog-centered" role="document">
											    	<div class="modal-content">

												        <div class="modal-header">
													        <h5 class="modal-title" id="exampleModalCenterTitle">Um pouco sobre Android</h5>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													        <span aria-hidden="true">&times;</span>
													        </button>
												     	</div>

												    	<div class="modal-body">
												        Lorem ipsum sociosqu aliquet libero praesent interdum diam, mauris platea odio faucibus convallis. tempor donec himenaeos auctor at vehicula class dolor pretium non eleifend varius egestas nisi commodo sem magna, justo fames pharetra ullamcorper fermentum dui a nisi est fermentum at lectus convallis porta. molestie orci fusce justo vitae nostra volutpat leo mattis, sodales nullam maecenas sollicitudin fermentum non primis orci morbi, suscipit ligula curabitur faucibus vel dolor semper. praesent justo himenaeos sapien ipsum phasellus, at cras aliquet volutpat, faucibus ante fusce elit. eros hac malesuada neque condimentum taciti metus turpis fames arcu fusce, vehicula mollis lectus convallis semper dolor egestas metus at.<br><br>
												        <span class="sobre">Ministrante: George Junior<br>
									  		    		Carga Horaria: 8 Horas<br>
											    		Número de vagas: 40<br>
											    		Dia 16/10 às 08:00h<br>
											    		</span>
											    		</div>

												     	<div class="modal-footer">
												        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												     	</div>

											    	</div>

											    </div>

											</div> 

						        		</div>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------->


	<!----------------------------------************************************************************------------------------------------>

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


</div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>