<?php
require("Conexao.php");
require("Usuariointerface.php");
class Usuario implements UsuarioInterface{
    private $codigo_usuario;
    private $nome_usuario;
    private $login_usuario;
    private $senha_usuario;
    private $email_usuario;
    private $imagem_usuario;
    private $nome_imagem_usuario;
    private $situacao_usuario;

    public function setCodigo_Usuario($codigo_usuario)
    {
        $this->codigo_usuario = $codigo_usuario;
    }

    public function getCodigo_Usuario()
    {
        return $this->codigo_usuario;
    }

    public function setNome_Usuario($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function getNome_Usuario()
    {
        return $this->nome_usuario;
    }

    public function setLogin_Usuario($login_usuario)
    {
        $this->login_usuario = $login_usuario;
    }

    public function getLogin_Usuario()
    {
        return $this->login_usuario;
    }

    public function setSenha_Usuario($senha_usuario)
    {
        $this->senha_usuario = $senha_usuario;
    }

    public function getSenha_Usuario()
    {
        return $this->senha_usuario;
    }

    public function setEmail_Usuario($email_usuario)
    {
        $this->email_usuario = $email_usuario;
    }

    public function getEmail_Usuario()
    {
        return $this->email_usuario;
    }

    public function setImagem_Usuario($imagem_usuario)
    {
        $this->imagem_usuario = $imagem_usuario;
    }

    public function getImagem_Usuario()
    {
        return $this->imagem_usuario;
    }

    public function setNome_Imagem_Usuario($nome_imagem_usuario)
    {
        $this->nome_imagem_usuario = $nome_imagem_usuario;
    }

    public function getNome_Imagem_Usuario()
    {
        return $this->nome_imagem_usuario;
    }

    public function setSituacao_Usuario($situacao_usuario)
    {
        $this->situacao_usuario = $situacao_usuario;
    }

    public function getSituacao_Usuario()
    {
        return $this->situacao_usuario;
    }

    public function buscarUsuario()
    {
        try{
            $instrucaoBuscarUsuario = "select * from usuario_financas where login_usuario = :recebe_login_usuario and senha_usuario = :recebe_senha_usuario";
            $comandoBuscarUsuario = Conexao::Obtem()->prepare($instrucaoBuscarUsuario);
            $comandoBuscarUsuario->bindValue(":recebe_login_usuario",$this->getLogin_Usuario());
            $comandoBuscarUsuario->bindValue(":recebe_senha_usuario",$this->getSenha_Usuario());
            $comandoBuscarUsuario->execute();

            $resultadoBuscarUsuario = $comandoBuscarUsuario->fetch(PDO::FETCH_ASSOC);

            if($resultadoBuscarUsuario["nome_usuario"] != null)
                return "localizado";
            else
                return "nao localizado";
        }catch(PDOException $exception){
            return $exception->getMessage();
        }catch(Exception $excecao){
            return $excecao->getMessage();
        }
    }

    public function cadastrarUsuario()
    {
        $destino = "../imagens/".$this->getNome_Imagem_Usuario();
        try{
            $sql_InserirUsuario = "insert into usuario_financas(nome_usuario,login_usuario,senha_usuario,email_usuario,imagem_usuario,situacao_usuario)values(
                :recebe_nome_usuario,:recebe_login_usuario,:recebe_senha_usuario,:recebe_email_usuario,:recebe_imagem_usuario,:recebe_situacao_usuario
            )";
            $comando_InsercaoUsuario = Conexao::Obtem()->prepare($sql_InserirUsuario);
            $comando_InsercaoUsuario->bindValue(":recebe_nome_usuario",$this->getNome_Usuario());
            $comando_InsercaoUsuario->bindValue(":recebe_login_usuario",$this->getLogin_Usuario());
            $comando_InsercaoUsuario->bindValue(":recebe_senha_usuario",$this->getSenha_Usuario());
            $comando_InsercaoUsuario->bindValue(":recebe_email_usuario",$this->getEmail_Usuario());
            $comando_InsercaoUsuario->bindValue(":recebe_imagem_usuario",$this->getNome_Imagem_Usuario());
            $comando_InsercaoUsuario->bindValue(":recebe_situacao_usuario",1);
            $resultado_InsercaoUsuario = $comando_InsercaoUsuario->execute();
            
            $ultimo_RegistroUsuario = Conexao::Obtem()->lastInsertId(); 

            //$_SESSION["codigo_usuario_inserido"] = $ultimo_RegistroUsuario;
            if(!empty($resultado_InsercaoUsuario))
            {
                file_put_contents($destino,base64_decode($this->getImagem_Usuario()));
                return $ultimo_RegistroUsuario;
            }else
            {
                return 0;
            }
        }catch(PDOException $exception){
            return $exception->getMessage();
        }catch(Exception $excecao){
            return $excecao->getMessage();
        }
    }

    public function alterarUsuario()
    {
        
    }

    public function visualizarUsuario()
    {
        
    }

    public function desabilitarUsuario()
    {
        
    }
}
?>