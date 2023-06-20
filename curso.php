<?php
include('conexao.php');
date_default_timezone_set('UTC');

$query = $conn->query("SELECT * FROM curso");
$cursos = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD em PHP</title>
  </head>
  <body>
    <div class="container-sm p-2 mt-5 ">

        <?php include 'menu.html'; ?>
          
        <div class="table-responsive">
          <img style="float:right;" width="200px" src="gifs/curso.gif">
          <h1 class="mt-5">Cursos</h1>
          <!-- Button modal cadastro -->
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCadastro">
          + Novo
          </button>
          <hr>

          <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                    <th scope="col"></th>
                    </tr>
                </thead>

                <?php foreach($cursos as $item){ ?>
 
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $item['id'];?></th>
                    <td><?php echo $item['descricao'];?></td>
                    <td><a href="editar_curso.php?id=<?php echo $item['id']; ?>">Editar</a></td> 
                    <td><a href="processa/deleta_curso.php?id=<?php echo $item['id']; ?>">Excluir</a></td>
                  </tr>
               <?php } ?>
                    
                </tbody>
            </table>


        


          <!-- Modal cadastro -->
          <div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de curso</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

          <form action="processa/cadastra_curso.php" method="POST">
                        
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nome do curso</label>
                  <input type="text" class="form-control" name="nome" id="exampleFormControlInput1" required placeholder="Nome do curso">
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
          </form>
              </div>
            </div>
          </div>
        </div>
    </div>


    

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
