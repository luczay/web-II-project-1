<?php
    require_once(SERVER_ROOT . 'models/hat_talalatos_query.php');

    class Hatos_ido_penz_Controller 
    {
        public function main($start_year, $end_year, $money) 
        {
            $result = hat_talalatos($start_year, $end_year, $money);
            echo(json_encode($result));
        }
    }
?>