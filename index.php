<?php
    $conexao = new mysqli("127.0.0.1", "root", "", "site_teste");
    if(isset($_POST['btnCadastrar'])){
        
        $nome = $_POST['txtNome']; 
        $email = $_POST['txtEmail']; 
        $tel = $_POST['txtTel'];
        $linkFoto = $_POST['linkFoto'];

        $cmdSql =  "INSERT INTO contato(nome, email, tel, linkFoto) VALUES ('$nome','$email','$tel','$linkFoto');";
        if(!$conexao->query($cmdSql)){
            echo "<script>alert('Erro de cadastro')</script>";
        }
    }
   
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="txtNome">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="text" class="form-control" name="linkFoto">
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="txtEmail">
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="tel" class="form-control" name="txtTel">
            </div>
            <button type="submit" class="btn btn-primary" name="btnCadastrar">Submit</button>
        </form>

        <hr>

        

        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">

            <?php
                $cmdSql = 'SELECT * FROM contato ORDER BY nome asc';
                $dados = $conexao->query($cmdSql);
                if($dados->num_rows > 0){
                    $resultado = $dados->fetch_all();

                    foreach ($resultado as $linha) {
                    echo '<div class="col">
                                <div class="card">
                                <img src="'.$linha[3].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$linha[0].'</h5>
                                    <p class="card-text">'.$linha[1].'</p>
                                    <p class="card-text">'.$linha[2].'</p>
                                </div>
                                </div>
                            </div>';                    
                    
                    }
                }
            ?>
        </div>
     
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>