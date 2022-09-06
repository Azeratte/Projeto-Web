<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href= "css/styles.css">
    <title>Cadastro</title>
</head>
<body>
    <section>
        <header>
            <img style = "width: 200px; height: 50px;" src  = "img/img.jpg" alt = "banner" width="200px" height="50px">
            Auto Centro - Manutenção de Veículos
        </header>

        <div id="container">

<div class="row">
    <div class="col-12">
        <h1>Formulário de cadastro</h1>
    </div>
</div>

<div class="row ml-3">

    <div class="col-8">
        <form method="post" action="../controle/controle_cliente.php">

            <div class="form-group row">
                <div class="col">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="nome" class="form-control" id="nome" name="nome">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="form-group form-check-inline">

                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="Masculino">
                <label class="form-check-label" for="masculino">
                    Masculino
                </label>
            </div>

            <div class="form-group form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="feminino" value="Feminino">
                <label class="form-check-label" for="feminino">
                    Feminino
                </label>

            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="senha" class="form-label">Crie uma senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                <input type="submit" name="salvar" value="Salvar" class="btn btn-success">
                <input type="submit" name="bt_listar" value="Consultar" class="btn btn-primary">       
                </div>
            </div>
        </form>
    </div>
</div>
</div>



    </section>
    <footer class="jumbotron">
        <div class="container">

            <div class="row">
                <!-- offset-1 acrescentam a margem esquerda de 1 coluna-->
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <!-- list-unstyled retira o estilo da lista-->
                    <ul class="list-unstyled">
                        <li><a href="Home.html">Home</a></li>
                        <li><a href="Login.html">Login</a></li>
                        <li><a href="Cadastro.html">Cadastro</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                      121, Clear Water Bay Road<br>
                      Clear Water Bay, Kowloon<br>
                      HONG KONG<br>
                      +852 1234 5678<br>
                      +852 8765 4321<br>
                      <a href="mailto:confusion@food.net">confusion@food.net</a>
                   </address>
               </div>
            </div>

              <!-- alinha o conteúdo no centro-->
            <div class="row justify-content-center">
               <!-- alinha a coluna no centro conforme definido na linha -->
               <div class="col-auto ">
               <p>© Copyright 2021</p>
           </div>
         </div>

        </div>
        </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
</body>
</html>