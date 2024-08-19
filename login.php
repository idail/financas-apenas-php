<?php
require("modelo/Usuario.php");
$usuario_recebido = $_GET["usuario"];
$senha_recebida = $_GET["senha"];

if($usuario_recebido == "idail" && $senha_recebida == 123){
    $usuario = new Usuario();
    $usuario->setLogin_Usuario($usuario_recebido);
    $usuario->setSenha_Usuario($senha_recebida);

    $resultado = $usuario->buscarUsuario();

    echo json_encode($resultado);
}else{
    echo json_encode("nada correto");
}    
?>