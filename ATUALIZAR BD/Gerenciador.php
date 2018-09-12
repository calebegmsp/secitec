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
            <h1 class="jumbotron-heading">Gerenciar dados dos Minicursos</h1>
        </div>
    </section>

    <div class="row justify-content-md-center btn-insert">
       <button type="button" class="btn btn-primary col-md-4" data-toggle="modal" data-target="#InserirDados">
           Inserir um minicurso
       </button>    
   </div>



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
    <div class="container">
        <div class="row">
            <div class="table table-md">
                <table class="table table-striped">
                    <thead>
                        <tr class="row tr-row">

                            <th class="col-md-2">
                                Imagem
                            </th>
                            <th class="col-md-6">
                                Nome
                            </th>
                            <th class="col-md-4">
                                Local, data e hora
                            </th>
                        </tr>  

                    </thead>
                    <tbody>
                        <tr class="row tr-row">
                            <td class="col-md-2"> 

                                <?php
                                $imagemIcon = "upload/".$minicursos[$key]['img_Minicurso'];

                                if ($minicursos[$key]['img_Minicurso'] == ""){
                                    $imagemIcon = "noimage.png";
                                }
                                ?>


                                <img class="img-icon" src="<?= $imagemIcon; ?>" 


                                >
                            </td>

                            <td class="col-md-6">

                                <h4><?php echo $minicursos[$key]['nome_Mcurso']; ?></h4>

                            </td>

                            <td class="col-md-3">

                                <?php 

                                echo $minicursos[$key]['local_Mcurso'] ."</br>";

                                $date = new DateTime($minicursos[$key]['dia_Mcurso']);
                                echo $date->format('d/m/Y');
                                echo " às ".$date->format('H')."h".$date->format('i')."min";


                                ?>

                            </td>
                            <td class="col-md-1">
                                <button id="<?= $minicursos[$key]['id_Mcurso']; ?>" type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#mini<?= $minicursos[$key]['id_Mcurso']; ?>">Editar</button> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 


    <!-- Modal -->
    <div class="modal fade" data-backdrop="static" id="mini<?= $minicursos[$key]['id_Mcurso']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
      <div class="modal-body">


        <form action="Gerenciador.php" method="post" enctype="multipart/form-data">

            <!--  Escolha do Curso -->
            <label for="exampleInputEmail1">Curso</label>
            <select class="form-control" name="id_curso" id="id_curso">

                <?php
                    $cursos = $sql->select("SELECT id_curso, nome_curso, imgPadrao_curso FROM Curso");
                    foreach ($cursos as $key2 => $value2) {
                        if ($cursos[$key2]['id_curso'] ==  $minicursos[$key]['FK_Curso_id_curso']) {
                            echo "<option value =\"".$cursos[$key2]['id_curso']."\" selected >".$cursos[$key2]['nome_curso']."</option>";
                            $FK_Curso_id_curso = $cursos[$key2]['id_curso'];
                        } else {
                            echo "<option value =\"".$cursos[$key2]['id_curso']."\">".$cursos[$key2]['nome_curso']."</option>";
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
                <textarea class="form-control" id="des_Mcurso"  name="des_Mcurso" rows="1"><?= $minicursos[$key]['des_Mcurso'];?></textarea>
            </div>

            <!-- Local -->
            <div class="form-group">
                <label for="formGroupExampleInput">Local</label>
                <input type="text" class="form-control" id="local_Mcurso" name="local_Mcurso" value="<?=$minicursos[$key]['local_Mcurso']?>" placeholder="">
            </div>

            <!-- Ministrante -->
            <div class="form-group">
                <label for="formGroupExampleInput">Ministrante</label>
                <input type="text" class="form-control" id="ministrante_Mcurso" name="ministrante_Mcurso" value="<?=$minicursos[$key]['ministrante_Mcurso']?>"  placeholder="">
            </div>


            <!-- Imagen -->
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem</label>
                <input   type="file" id="img_Minicurso" value="<?=$minicursos[$key]['img_Minicurso']?>" data-max-size="52428800" name="file"  class="input6" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">
            </div>


            <div class="row">
                <div class="col-md-6">
                    <!--  Escolha do dia -->
                    <label for="exampleInputEmail1" id="dia_Mcurso" name="dia_Mcurso" >Dia</label>
                    <select class="form-control">

                        <option value="16" <?php if($date->format('d') == 16){echo "selected";} ?>>16</option>
                        <option value="17" <?php if($date->format('d') == 17){echo "selected";} ?>>17</option>
                        <option value="18" <?php if($date->format('d') == 18){echo "selected";} ?>>18</option>
                        <option value="19" <?php if($date->format('d') == 19){echo "selected";} ?>>19</option>
                    </select>                    
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput">Horário</label>
                    <input type="time" class="form-control" id="hora_Mcurso" value="<?= $date->format('H:i'); ?>" name="hora_Mcurso" placeholder="">
                </div>               

            </div>


            <!-- Infos pequenas -->
            <div class="row">

                <div class="col-md-6">
                    <label for="formGroupExampleInput">Carga horária</label>
                    <input type="number" class="form-control" id="carga_Mcurso" value="<?=$minicursos[$key]['ch_Mcurso']?>" name="carga_Mcurso" placeholder="">
                </div>


                <div class="col-md-6">
                    <label for="formGroupExampleInput">Vagas</label>
                    <input type="number" class="form-control" id="vagas_Mcurso" value="<?=$minicursos[$key]['vagas_Mcurso']?>" name="vagas_Mcurso" placeholder="">
                </div>



            </div>

            <div class="modal-footer">
                <input type="hidden" name="id_minicurso" value="<?= $minicursos[$key]['id_Mcurso']; ?>"></input>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" name="atualizarMinicurso" class="btn btn-primary">Salvar alterações</button>
            </div>

            <?php

            $sql = new Sql();



            if(isset($_POST['atualizarMinicurso'])){


                $id_Mcurso = $_POST['id_minicurso'];
                $nome_Mcurso = $_POST['nome_Mcurso'];
                $des_Mcurso = $_POST['des_Mcurso'];
                $local_Mcurso = $_POST['local_Mcurso'];
                $dia_Mcurso = '2018-10-'.$_POST['hora_Mcurso'].' '.$_POST['hora_Mcurso'].':00';
                $ministrante_Mcurso = $_POST['ministrante_Mcurso'];
                $carga_Mcurso = $_POST['carga_Mcurso'];
                $vagas_Mcurso = $_POST['vagas_Mcurso'];
                $FK_Curso_id_curso = $_POST['id_curso'];

                $nomeArquivo = $_FILES['file']['name'];
                $dataAtual = date("d/m/Y H:i:s");
                $hash = $id_Mcurso. $dataAtual;

                $nomehash = md5($hash);

                $extensao = end(explode('.',$nomeArquivo));
                
                $endereco_imagem = $nomehash.".".$extensao;

                if($nomeArquivo != ""){
                    if($sql){ 
                        if(move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" .$endereco_imagem)){

                        }
                    }
                }


                $codigo = "UPDATE Minicurso SET 
                nome_Mcurso = '$nome_Mcurso',
                des_Mcurso = '$des_Mcurso',
                local_Mcurso = '$local_Mcurso',
                img_Minicurso = '$endereco_imagem',
                dia_Mcurso = '$dia_Mcurso',
                ministrante_Mcurso = '$ministrante_Mcurso',
                ch_Mcurso = '$carga_Mcurso',
                vagas_Mcurso = '$vagas_Mcurso',
                FK_Curso_id_curso = '$FK_Curso_id_curso'
                WHERE id_Mcurso = $id_Mcurso";


                $sql->query($codigo);


                ?>


                <script type="text/javascript" >
                    alert("Operação realizada! <?php echo($codigo); ?>");
                    location.href="Gerenciador.php";
                </script>

                <?php


            }



            ?>



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










<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="InserirDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">


        <form action="Gerenciador.php" method="post" enctype="multipart/form-data" >

            <!--  Escolha do Curso -->
            <label for="exampleInputEmail1">Curso</label>
            <select class="form-control" name="id_Mcurso" id="id_Mcurso">

                <?php
                    $cursos = $sql->select("SELECT id_curso, nome_curso, imgPadrao_curso FROM Curso");
                    foreach ($cursos as $key2 => $value2) {
                    echo "<option value =\"".$cursos[$key2]['id_curso']."\">".$cursos[$key2]['nome_curso']."</option>";
                    }
                ?>

            </select>



            <!-- Nome -->
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" class="form-control" id="nome_Mcurso" name="nome_Mcurso" placeholder="">
            </div>

            <!-- Descrição -->
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="des_Mcurso"  name="des_Mcurso" rows="1"></textarea>
            </div>

            <!-- Local -->
            <div class="form-group">
                <label for="formGroupExampleInput">Local</label>
                <input type="text" class="form-control" id="local_Mcurso" name="local_Mcurso"  placeholder="">
            </div>

            <!-- Ministrante -->
            <div class="form-group">
                <label for="formGroupExampleInput">Ministrante</label>
                <input type="text" class="form-control" id="ministrante_Mcurso" name="ministrante_Mcurso"  placeholder="">
            </div>


            <!-- Imagen -->
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem</label>
                <input   type="file" id="img_Minicurso" data-max-size="52428800" name="file"  class="input6" accept=".png, .jpg, .jpeg, .PNG, .JPG, .JPEG">

            </div>


            <div class="row">
                <div class="col-md-6">
                    <!--  Escolha do dia -->
                    <label for="exampleInputEmail1">Dia</label>
                    <select class="form-control" id="dia_Mcurso" name="dia_Mcurso">
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                    </select>                    
                </div>

                <div class="col-md-6">
                    <label for="formGroupExampleInput">Hora</label>
                    <input type="time" class="form-control" id="hora_Mcurso" name="hora_Mcurso" placeholder="">

                </div>               

            </div>


            <!-- Infos pequenas -->
            <div class="row">

                <div class="col-md-6">
                    <label for="formGroupExampleInput">Carga horária</label>
                    <input type="number" class="form-control" id="carga_Mcurso" name="carga_Mcurso" placeholder="">
                </div>


                <div class="col-md-6">
                    <label for="formGroupExampleInput">Vagas</label>
                    <input type="number" class="form-control" id="vagas_Mcurso" name="vagas_Mcurso" placeholder="">
                </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" name="inserirMinicurso" class="btn btn-primary">Inserir minicruso</button>
            </div>
        </form>
        <?php

        $sql = new Sql();

        if(isset($_POST['inserirMinicurso'])){  

            $nome_Mcurso = $_POST['nome_Mcurso'];
            $des_Mcurso = $_POST['des_Mcurso'];
            $local_Mcurso = $_POST['local_Mcurso'];
            $FK_Curso_id_curso = $_POST['id_Mcurso'];
            $dia_Mcurso = '2018-10-'.$_POST['dia_Mcurso'].' '.$_POST['hora_Mcurso'].':00';
            $ministrante_Mcurso = $_POST['ministrante_Mcurso'];
            $carga_Mcurso = $_POST['carga_Mcurso'];
            $vagas_Mcurso = $_POST['vagas_Mcurso'];

            $nomeArquivo = $_FILES['file']['name'];
            $dataAtual = date("d/m/Y H:i:s");
            $hash = $id_Mcurso. $dataAtual;

            $nomehash = md5($hash);

            $extensao = end(explode('.',$nomeArquivo));

            $endereco_imagem = $nomehash.".".$extensao;


            $codigoInsert = "INSERT INTO Minicurso (nome_Mcurso, des_Mcurso, local_Mcurso, dia_Mcurso, ministrante_Mcurso, ch_Mcurso, vagas_Mcurso, img_Minicurso, FK_Curso_id_curso) VALUES ('$nome_Mcurso', '$des_Mcurso', '$local_Mcurso', '$dia_Mcurso', '$ministrante_Mcurso', '$carga_Mcurso', '$vagas_Mcurso', '$endereco_imagem', $FK_Curso_id_curso)";



            $sql->query($codigoInsert);

            if($nomeArquivo != ""){
                if($sql){ 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" .$endereco_imagem)){

                    }
                }
            }
            ?>

            <script type="text/javascript" >
                alert("Operação finalizada!");
                location.href="Gerenciador.php";

            </script>

            <?php



        }



        ?>



      </div>
    </div>
  </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Bootstrap JS -->

<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>

<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>