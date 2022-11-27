<?php
    require_once(SERVER_ROOT . 'models/hat_talalatos_query.php');

    class Hany_hatos_Controller 
    {
        public function main() 
        {
            $result = hat_talalatos();
            var_dump($result);
            json_encode($result);
        }
    }
?>