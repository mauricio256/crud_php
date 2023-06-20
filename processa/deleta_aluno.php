<?php
include('../conexao.php');

$cod_aluno = $_GET['id'];

$count = $conn->exec("DELETE FROM aluno WHERE id = $cod_aluno");

    if($count>0):
        echo"<script>
        alert('O REGISTRO FOI REMOVIDO COM SUCESSO!');
        javascript:window.location='../aluno.php';
    </script>"; 
    else:
        echo"ERRO! não foi possivel encontrar esse registro<a href='../aluno.php'> Voltar ao MENU PRINCIPAL</a>";
    endif;
?>
 