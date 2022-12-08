<?php
    require_once(SERVER_ROOT . 'models/hatosok_darab_qry.php');

    class Hatosok_darab_Controller 
    {
        public function main() 
        {
            $result = hatosok_darab();
            echo(json_encode($result));
        }
    }
?>