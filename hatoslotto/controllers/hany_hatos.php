<?php
    require_once(SERVER_ROOT . 'models/hat_talalatos_query.php');

    class Hany_hatos_Controller 
    {
        public function main() 
        {
            $start_year = 1988;
            $end_year = 2013;
            $money = 0;
            $result = hat_talalatos($start_year, $end_year, $money);
            echo(json_encode($result));
        }
    }
?>