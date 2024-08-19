<?php
require("../controladora/UsuarioControladora.php");
if(isset($_POST["processo_usuario"]))
{
    if($_POST["processo_usuario"] == "inserir_usuario")
    {
        $recebe_nomeusuariocad = $_POST["nome"];
        $recebe_usuariocad = $_POST["usuario"];
        $recebe_emailusuariocad = $_POST["email"];
        $recebe_senhausuariocad = $_POST["senha"];

        $recebe_imagemusuariocad = $_POST["imagem_selecionada"];
        $recebe_nomeimagemusuariocad = $_POST["nome_imagem_selecionada"];

        $usuario_controladora = new UsuarioControladora();
        $resultado_cadusuario = $usuario_controladora->cadastrarUsuario($recebe_nomeusuariocad,$recebe_usuariocad,$recebe_emailusuariocad,
        $recebe_senhausuariocad,$recebe_imagemusuariocad,$recebe_nomeimagemusuariocad);
        echo json_encode($resultado_cadusuario);
    }
}
?>