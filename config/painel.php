<?php
require_once('conexao.php');

class Painel
{

    public static function alert($tipo, $messagem)
    {
        if ($tipo == 'sucesso') {
            echo '<div class="box-alert sucesso">' . $messagem . '</div>';
        } else if ($tipo == 'erro') {
            echo '<div class="box-alert erro">' . $messagem . '</div>';
        }
    }
}
