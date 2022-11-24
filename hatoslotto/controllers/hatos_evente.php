<?php
    require_once(SERVER_ROOT . 'models/hatos_evente_query.php');

    class Hatos_evente_Controller 
    {
        public function main() 
        {
            $result = hatos_evente();
            json_encode($result);
        }
    }
?>