<?php
include('conexao.php');

$cod_professor = $_GET['id'];
  
    $query = $conn->query("SELECT * FROM professor WHERE id = $cod_professor");
    $professor = $query->fetchAll(PDO::FETCH_ASSOC);


function busca_cursos(){
    include('conexao.php');
        
    $query = $conn->query("SELECT * FROM curso");
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        
    return $resultado; 
}

function busca_curso($cod_curso){
    include('conexao.php');

    $query = $conn->query("SELECT descricao FROM curso WHERE id = $cod_curso");
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

    return $resultado; 
}


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
        <div class="m-sm-5 m-3">
              <h1>Editar</h1> <hr> 
            <?php foreach($professor as $iten){ ?>
                      
                <form action="processa/edita_professor.php" method="POST">
                        <input type="text" hidden class="form-control" name="id" id="exampleFormControlInput1" required value="<?php echo $iten['id']; ?>">
                        
                        <div class="mb-3">
                          <label for="exampleFormControlInput1"  class="form-label">Nome</label>
                          <input type="text" class="form-control" name="nome" id="exampleFormControlInput1" required value="<?php echo $iten['nome']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Nascimento</label>
                          <input type="date" class="form-control" name="nasc" id="exampleFormControlInput1" required value="<?php echo $iten['nascimento']; ?>">
                        </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Curso</label>
                          <select class="form-select" name="curso" aria-label="Default select example" required>
                                
                              <?php foreach(busca_curso($iten['cod_curso']) as $curso){ ?>
                                    <option selected value=" <?php echo $iten['cod_curso']; ?>"> <?php echo $curso['descricao']; ?></option> 
                                <?php }; ?>
                              
                                <?php foreach(busca_cursos() as $cursos){ ?>
                                    <option value=" <?php echo $cursos['id']; ?>"><?php echo $cursos['descricao']; ?></option> 
                                <?php }; ?> 

                           </select>
                      </div>
        
   
                        <div class="modal-footer">
                          <a href="professor.php" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</a>
                          <button type="submit" class="btn btn-success">Salvar alteração</button>
                        </div>
                </form>
            <?php }; ?> 

        </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

  