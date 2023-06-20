<?php
include('../conexao.php');

$curso = $_POST['curso'];
$nome = $_POST['nome'];
$nasc = $_POST['nasc'];

$sql = "INSERT INTO aluno (id, cod_curso, nome, nascimento) VALUES (NULL, '$curso', '$nome', '$nasc')";

try {
    if($conn->exec($sql)):  
         echo"<script>
                   alert('CADASTRADO COM SUCESSO!');
                   javascript:window.location='../aluno.php';
              </script>";  
    else:
        echo"<script>
                    alert('ERRO AO CADASTRAR, tente novamente.');
                    javascript:window.location='../aluno.php';
            </script>";   
    endif;
} catch (Exception $e) {
    /// esse trecho so vai ser execultado se for adicionado o ID manualmente  
    echo "<div style='width: 100%; padding:20px; background-color:red; color:yellow;'>Ocorreu um erro: Mesangem de erro:".  $e->getMessage() ."</div><h1>Um cadastro com esse ID já existe. tente outro com outro ID</h1><br><a href='../aluno.php'>Voltar</a>"; 
}