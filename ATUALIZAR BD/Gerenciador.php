     <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/faicon.png">

        <link rel="stylesheet" type="text/css" href="estilo.css">

        <meta charset="utf-8">

<!------ Include the above in your HEAD tag ---------->


<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">GERENCIAR DADOS DOS MINICURSOS</h1>
     </div>
</section>




<!-----------------------  DADOS MINICURSOS ----------------------------------->

<?php

    require_once("../DAO/config.php");
    require_once("../DAO/class/sql.php");

    $sql = new Sql();

    $minicursos = $sql->select("SELECT DISTINCT M.id_Mcurso, M.nome_Mcurso, M.des_Mcurso, M.local_Mcurso, M.dia_Mcurso,
                            M.ministrante_Mcurso, M.ch_Mcurso, M.vagas_Mcurso, M.img_Minicurso, M.FK_Curso_id_curso 
                            FROM Minicurso as M
                            INNER JOIN Curso as C on M.FK_Curso_id_curso = C.id_curso 
                            ORDER BY M.nome_Mcurso");

    foreach ($minicursos as $key => $value) {
            
?>
            <div class="container mb-4">
                <div class="row">
                    <div class="row absolute">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="colunaImg"> </th>
                                        <th scope="col" class="colunaNome">Nome</th>
                                        <th scope="col" class="colunaLocal">Local, data e hora</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="colunaImg"> 

                                            <?php
                                                $imagemIcon = "../" .$minicursos[$key]['img_Minicurso'];

                                                if (is_null($minicursos[$key]['img_Minicurso'])){
                                                    $imagemIcon = "noimage.png";
                                                }
                                            ?>


                                            <img class="img-icon" src="<?= $imagemIcon; ?>" 


                                            >
                                        </td>

                                        <td class="colunaNome">

                                            <h4><?php echo $minicursos[$key]['nome_Mcurso']; ?></h4>

                                        </td>

                                        <td class="colunaLocal">
                                            
                                            <?php 

                                                echo $minicursos[$key]['local_Mcurso'] ."</br>";

                                                $date = new DateTime($minicursos[$key]['dia_Mcurso']);
                                                echo $date->format('d/m/Y');
                                                echo " às ".$date->format('H')."h".$date->format('m')."min";


                                            ?>

                                        </td>
                                        <td class="text-right">
                                            <button id="<?= $minicursos[$key]['id_Mcurso']; ?>" type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#exampleModalCenter">
                                              Editar
                                            </button> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            

 <?php

    }

?>


<!----------------------- FIM DADOS MINICURSOS ----------------------------------->

<!--*************************************************************************-->




<?php

    $curso = $sql->select("SELECT DISTINCT M.id_Mcurso, M.nome_Mcurso, M.des_Mcurso, M.local_Mcurso, M.dia_Mcurso,
                            M.ministrante_Mcurso, M.ch_Mcurso, M.vagas_Mcurso, M.img_Minicurso, M.FK_Curso_id_curso 
                            FROM Minicurso as M
                            INNER JOIN Curso as C on M.FK_Curso_id_curso = C.id_curso 
                            ORDER BY M.nome_Mcurso");

?>



<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Alterar dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            

        <form>

            <!--  Escolha do Curso -->
            <label for="exampleInputEmail1">Curso</label>
            <select class="form-control">
                <option>Escolha o curso</option>
            </select>


            <!-- Nome -->
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <!-- Local -->
            <div class="form-group">
                <label for="formGroupExampleInput">Local</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
            </div>


            <!-- Imagen -->
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>


            <div class="row">
                <div class="col-md-6">
                    <!--  Escolha do dia -->
                    <label for="exampleInputEmail1">Dia</label>
                    <select class="form-control">
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                    </select>                    
                </div>

                 <div class="col-md-6">
                    <label for="formGroupExampleInput">Hora</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>               

            </div>


            <!-- Infos pequenas -->
            <div class="row">

                <div class="col-md-6">
                    <label for="formGroupExampleInput">Carga horária</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>


                <div class="col-md-6">
                    <label for="formGroupExampleInput">Vagas</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>



            </div>


        </form>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar alterações</button>
      </div>
    </div>
  </div>
</div>




 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>