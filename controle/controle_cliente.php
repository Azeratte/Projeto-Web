<?php
include_once('../modelo/cliente.php');
include_once('../modelo/clienteDAO.php');

$clienteDAO = new ClienteDAO();

if (isset($_POST['salvar'])) {
    $clienteDAO->inserir($_POST['nome'], $_POST['email'], $_POST['sexo'], $_POST['senha']);
}
if (isset($_POST['bt_listar'])) {
    $clienteDAO->listar();
}
if (isset($_POST['bt_consultar'])) {
    $clienteDAO->buscarCliente($_POST['email']);
}

if (isset($_POST['botao_excluir'])) {
    $clienteDAO->excluir($_POST['id']);
}

if (isset($_POST['botao_editar'])) {
    $clienteDAO->editar($_POST['id']);
}

if (isset($_POST['salvar_alteracao'])) {
    $clienteDAO->SalvarEdicao($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['sexo']);
    echo $_POST['nome'];
    $clienteDAO->listar();
}


