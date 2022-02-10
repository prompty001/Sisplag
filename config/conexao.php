<?php

//Criar as constantes com as credencias de acesso ao banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', NULL);
define('DBNAME', 'sisplag');
		
        
class Conexao{
    private static $pdo;
    public static function conectar(){
     if(self::$pdo == null){
    try {		
       self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER,PASS);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
        } 
        catch (PDOException $e) {
 echo 'Erro na Canexão'.$e->getMessage();
        }	
  }
    return self::$pdo;
    }
}
		
?>