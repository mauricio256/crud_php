<?php
include('../conexao.php');

$cod_professor = $_GET['id'];

$count = $conn->exec("DELETE FROM professor WHERE id = $cod_professor");

    if($count>0):
        echo"<script>
        alert('O REGISTRO FOI REMOVIDO COM SUCESSO!');
        javascript:window.location='../professor.php';
    </script>"; 
    else:
        echo"ERRO! não foi possivel encontrar esse registro <a href='../professor.php'> Voltar ao MENU PRINCIPAL</a>";
    endif;
?>
 