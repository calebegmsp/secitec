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
                                            <button id="<?= $minicursos[$key]['id_Mcurso']; ?>" type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#mini<?= $minicursos[$key]['id_Mcurso']; ?>">
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


<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="mini<?= $minicursos[$key]['id_Mcurso']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Alterar dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            

        <form action="Gerenciador.php" method="get">

            <!--  Escolha do Curso -->
            <label for="exampleInputEmail1">Curso</label>
            <select class="form-control" name="id_Mcurso" id="id_Mcurso">

                <?php

                    $cursos = $sql->select("SELECT id_curso, nome_curso, imgPadrao_curso FROM Curso");
                    foreach ($cursos as $key => $value) {
                        if ($cursos[$key]['id_curso'] ==  $minicursos[$key]['FK_Curso_id_curso']) {
                            echo "<option value =\"".$cursos[$key]['id_curso']. "\" selected >"  . $cursos[$key]['nome_curso']. "</option>";
                        } else {
                            echo "<option value =\"".$cursos[$key]['id_curso']. "\">" . $cursos[$key]['nome_curso']. "</option>";
                        }
                    }
                ?>

            </select>



            <!-- Nome -->
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" class="form-control" id="nome_Mcurso" name="nome_Mcurso" value="<?=$minicursos[$key]['nome_Mcurso']; ?>" placeholder="">
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="des_Mcurso"  name="des_Mcurso" rows="2"><?= $minicursos[$key]['des_Mcurso'];?></textarea>
            </div>

            <!-- Local -->
            <div class="form-group">
                <label for="formGroupExampleInput">Local</label>
                <input type="text" class="form-control" id="local_Mcurso" name="local_Mcurso" placeholder="">
            </div>


            <!-- Imagen -->
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem</label>
                <input type="file" class="form-control-file" id="img_Minicurso" name="img_Minicurso">
            </div>


            <div class="row">
                <div class="col-md-6">
                    <!--  Escolha do dia -->
                    <label for="exampleInputEmail1" id="dia_Mcurso" name="dia_Mcurso" >Dia</label>
                    <select class="form-control">
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                    </select>                    
                </div>

                 <div class="col-md-6">
                    <label for="formGroupExampleInput">Hora</label>
                    <input type="text" class="form-control" id="hora_Mcurso" name="hora_Mcurso" placeholder="">
                </div>               

            </div>


            <!-- Infos pequenas -->
            <div class="row">

                <div class="col-md-6">
                    <label for="formGroupExampleInput">Carga horária</label>
                    <input type="text" class="form-control" id="carga_Mcurso" name="carga_Mcurso" placeholder="">
                </div>


                <div class="col-md-6">
                    <label for="formGroupExampleInput">Vagas</label>
                    <input type="text" class="form-control" id="vagas_Mcurso" name="vagas_Mcurso" placeholder="">
                </div>



            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
          </div>


        </form>



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

    $minicursos = $sql->select("SELECT DISTINCT M.id_Mcurso, M.nome_Mcurso, M.des_Mcurso, M.local_Mcurso, M.dia_Mcurso,
                            M.ministrante_Mcurso, M.ch_Mcurso, M.vagas_Mcurso, M.img_Minicurso, M.FK_Curso_id_curso 
                            FROM Minicurso as M
                            INsNER JOIN Curso as C on M.FK_Curso_id_curso = C.id_curso 
                            ORDER BY M.nome_Mcurso");


    $cursos = $sql->select("SELECT id_curso, nome_curso, imgPadrao_curso FROM Curso");


?>








 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>