<?php
	include ('conexao.php');


 class Painel {
     public static function logado(){
         return isset($_SESSION['login']) ? true : false;
     }

     	public static function alert($tipo,$messagem){
		if($tipo =='sucesso'){
			echo '<div class="box-alert sucesso">'.$messagem.'</div>';
		}else if ($tipo == 'erro'){
			echo '<div class="box-alert erro">'.$messagem.'</div>';
		}
    }
    public static function userExists($nome_usuario,$senha_usuario){
			$sql = Conexao::conectar()->prepare("SELECT * FROM usuario WHERE nome_usuario=? AND senha_usuario=?");
			$sql->execute(array($nome_usuario, $senha_usuario));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

    }

?>