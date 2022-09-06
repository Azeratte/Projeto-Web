<?php
class clienteDAO
{
    function inserir($nome, $email, $sexo, $senha)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projeto_pw', "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare('INSERT INTO cliente (nome, email,sexo,senha) VALUES(:nome, :email,:sexo,:senha)');
            $stmt->execute(array(
                ':nome' => "$nome", ':email' => "$email", ':sexo' => "$sexo", ':senha' => "$senha"
            ));
            echo "<script>alert('Cadastrado com sucesso!');
            window.location = '../visao/index.php';
            </script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function inserir2($nome, $email, $sexo, $senha)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=projeto_pw', "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $inserir = $pdo->prepare("INSERT INTO cliente (nome, email,sexo,senha) VALUES('$nome', '$email',' $sexo', '$senha')");
            $inserir->execute();

            echo "<script>alert('Cadastrado com sucesso!');
            window.location = '../visao/index.php';
            </script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function listar()
    {

        $pdo = new PDO("mysql:host=localhost;dbname=projeto_pw", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $pdo->query("SELECT id,nome,email,sexo FROM cliente");
        echo " <!doctype html>";
        echo "<html lang='pt-br'>";
        echo "<head>";
        echo " <meta charset='utf-8'>";
        echo " <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        echo "<title>Clientes</title>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'>";
        echo "</head>";
        echo "<body class='container'>";
        echo "<h2>Lista de clientes</h2>";
        echo "<table class='table table-striped mt-3'>";
        echo "<tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Sexo</th>
          <th>Ações</th>
          </tr>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['email'] . "</td>";
            echo "<td>" . $linha['sexo'] . "</td>";
            echo "<td> <form method='post' action='../controle/controle_cliente.php'> "
                . "<input class='btn btn-outline-primary mr-3' type='submit' name='botao_editar' value='Editar'>"
                . "<input class='btn btn-outline-danger' type='submit' name='botao_excluir' value='Excluir'>"
                . " <input type='hidden' name='id' value = '" . $linha['id'] . "'/></form> </td>";
            echo "</tr>";
        }
        echo " </table>";
        echo "<form action='../controle/controle_cliente.php' method='POST'>";
        echo "<div class='form-group form-check-inline'>";
        echo "<div class='col'>";
        echo "<a href='../visao/consulta.php' class='btn btn-primary mr-3' role='button' aria-pressed='true'>Voltar</a>";
        echo "<a href='../visao/index.php' class='btn btn-success mr-3' role='button' aria-pressed='true'>Novo cliente</a>";
        echo "</div></div></form>";
        echo "</body></html>";
    }


    function buscarCliente($email)
    {
        include_once("../visao/consulta.php");
        include_once("../modelo/cliente.php");

        $pdo  = new PDO("mysql:host=localhost;dbname=projeto_pw", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $pdo->query("SELECT id, nome, email,sexo,senha FROM cliente WHERE email = '$email'");
        $total_retornado = $consulta->rowCount();


        if ($total_retornado  === 0) {
            echo "<script>alert('não econtrado')</script>";
        } else {
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente($linha['id'], $linha['nome'], $linha['email'], $linha['sexo']);

                echo "<table class='table table-striped mt-3'>";
                echo "<tr>
          <th>Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Sexo</th>
          <th>Ações</th>
          </tr>";
                echo "<tr>";
                //echo "<td>" . $cliente->getId() . "</td>";
                echo "<td>" . $cliente->getNome() . "</td>";
                echo "<td>" . $cliente->getEmail() . "</td>";
                echo "<td>" . $cliente->getSexo() . "</td>";
                echo "<td> <form method='post' action='../controle/controle_cliente.php'> "
                    . "<input class='btn btn-outline-primary mr-3' type='submit' name='botao_editar' value='Editar'>"
                    . "<input class='btn btn-outline-danger' type='submit' name='botao_excluir' value='Excluir'>"
                    . " <input type='hidden' name='id' value = '" . $linha['id'] . "'/></form> </td>";
                echo " </table>";
            }
        }
    }

    function excluir($id)
    {
        try {
            $pdo  = new PDO("mysql:host=localhost;dbname=projeto_pw", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $delete =  $pdo->prepare("DELETE FROM cliente WHERE id = '$id'");
            $delete->execute();

            echo "<script>alert('" .  $delete->rowCount() .
                " Usuário deletado com sucesso!');" .
                " window.location = '../visao/consulta.php';</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function Editar($id) {
        try {
           $pdo = new PDO("mysql:host=localhost;dbname=projeto_pw", "root", "");
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $consulta = $pdo->query("SELECT id, nome, email, sexo FROM cliente WHERE id = '$id'");
     
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
           session_start();
           include_once("../modelo/cliente.php");
           $cliente = new Cliente($linha['id'], $linha['nome'], $linha['email'], $linha['sexo']);
           $_SESSION['obj_cliente'] = serialize($cliente);
     header("location:../visao/editar.php");
         }
           } catch (PDOException $e) {
               echo 'Error: ' . $e->getMessage();
        } 
    }
     
    function SalvarEdicao($id, $nome, $email, $sexo){
        try {
           $pdo = new PDO("mysql:host=localhost;dbname=projeto_pw", "root", "");
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
           $editar = $pdo->query("UPDATE cliente SET nome ='$nome', email='$email',sexo ='$sexo' WHERE id = '$id'");
           $editar->execute();
            echo "<script>alert('Alterado com sucesso!');</script>";
          } catch (PDOException $e) {
              echo 'Error: ' . $e->getMessage();
          }
    }
  
}
