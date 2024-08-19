<?php
require("../modelo/Usuario.php");
class UsuarioControladora{
    private $usuario;
    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function cadastrarUsuario($recebe_nomeusuariocad,$recebe_usuariocad,$recebe_emailusuariocad,$recebe_senhausuariocad,$recebe_imagemusuariocad,$recebe_nomeimagemusuariocad)
    {
        if($recebe_imagemusuariocad != null)
        {
            $this->usuario->setNome_Usuario($recebe_nomeusuariocad);
            $this->usuario->setLogin_Usuario($recebe_usuariocad);
            $this->usuario->setSenha_Usuario($recebe_senhausuariocad);
            $this->usuario->setEmail_Usuario($recebe_emailusuariocad);
            $this->usuario->setImagem_Usuario($recebe_imagemusuariocad);
            $this->usuario->setNome_Imagem_Usuario($recebe_nomeimagemusuariocad);
            //$this->usuario->setSituacao_Usuario(1);

            $resultado_InserirUsuario = $this->usuario->cadastrarUsuario();
            return $resultado_InserirUsuario;
        }
    }
}
?>