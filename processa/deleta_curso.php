<?php
include('../conexao.php');

$cod_curso = $_GET['id'];


    try {
        $count = $conn->exec("DELETE FROM curso WHERE id = $cod_curso");

        if($count > 0):
            echo"<script>
                    alert('O REGISTRO FOI REMOVIDO COM SUCESSO!');
                    javascript:window.location='../curso.php';
                </script>"; 
        else:
            echo"ERRO! não foi possivel encontrar esse registro<a href='../curso.php'> Voltar ao MENU PRINCIPAL</a>";
        endif;
    }
    catch( PDOException $Exception ) {
        echo "<h3 style=' padding:10px; color:white; background-color:red;'>ATENÇÃO! Este curso possui aluno e/ou professor cadastrado,<br> remova ou desvincule esse curso de outros cadastros, antes de exclui-lo</h2><a href='../curso.php'> Voltar ao MENU PRINCIPAL</a>";
    }    
?>
 