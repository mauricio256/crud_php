<?php
include('../conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

$sql = "UPDATE `curso` SET  `descricao` = '$nome' WHERE `curso`.`id` = $id ";

try {
    if($conn->exec($sql)):  
         echo"<script>
                   alert('ATUALIZADO COM SUCESSO!');
                   javascript:window.location='../curso.php';
              </script>";  
    else:
        echo"<script>
                    alert('NENHUM DADO FOI MODIFICADO');
                    javascript:window.location='../curso.php';
            </script>";   
    endif;
} catch (Exception $e) {
    echo "<div style='width: 100%; margin:15px padding:20px; background-color:red; color:yellow;'>Ocorreu um erro: Mesangem de erro:".  $e->getMessage() ."</div><br><a href='../editar_curso.php?id=".$id."'>Voltar</a>"; 
}