<?php

include ('config/painel.php');

    if(Painel::logado() == false){
        include  ('login.php');
    }else{
        include ('./pages/stand_by.php');
    }

?>