<?php
	include ('conexao.php');


 class Painel {
     public static function logado(){
         return isset($_SESSION['login']) ? true : false;
     }

     	public static function alert($tipo,$messagem){
		if($tipo =='sucesso'){
			echo '<div class="box-alert sucesso" style="text-decoration: bold; text-align: center; background-color: #d8dfe7; height: 2.5em; border-radius: 2em; padding-top: 0.5em;">'.$messagem.'</div>';
		}else if ($tipo == 'erro'){
			echo '<div class="box-alert erro">'.$messagem.'</div>';
		}
    }
    public static function userExists($login_usuario,$senha_usuario){
			$sql = Conexao::conectar()->prepare("SELECT * FROM usuario WHERE login_usuario=? AND senha_usuario=?");
			$sql->execute(array($login_usuario, $senha_usuario));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

    }

?>