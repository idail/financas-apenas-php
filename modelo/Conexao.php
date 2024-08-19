<?php
class Conexao{
    public static $conexao;

    public static function Obtem()
    {
        if(self::$conexao === null)
        {
            try{
                //self::$conexao = new PDO("mysql:dbname=bd;host=localhost","root","");
                self::$conexao = new PDO("mysql:dbname=idailneto;host=mysql.idailneto.com.br","idailneto","Sei291991");
                return self::$conexao;
            }catch(PDOException $exception)
            {
                return $exception->getMessage();
            }catch(Exception $excecao)
            {
                return $excecao->getMessage();
            }
        }else{
            return self::$conexao;
        }
    }
}
?>