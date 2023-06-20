<?php
include('../conexao.php');

$id = $_POST['id'];
$curso = $_POST['curso'];
$nome = $_POST['nome'];
$nasc = $_POST['nasc'];

$sql = "UPDATE `professor` SET `cod_curso` = '$curso', `nome` = '$nome', `nascimento` = '$nasc' WHERE `professor`.`id` = $id ";

try {
    if($conn->exec($sql)):  
         echo"<script>
                   alert('ATUALIZADO COM SUCESSO!');
                   javascript:window.location='../professor.php';
              </script>";  
    else:
        echo"<script>
                    alert('NENHUM DADO FOI MODIFICADO');
                    javascript:window.location='../professor.php';
            </script>";   
    endif;
} catch (Exception $e) {
    echo "<div style='width: 100%; margin:15px padding:20px; background-color:red; color:yellow;'>Ocorreu um erro: Mesangem de erro:".  $e->getMessage() ."</div><br><a href='../editar_professor.php?id=".$id."'>Voltar</a>"; 
}