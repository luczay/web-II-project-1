<?php
    require_once(SERVER_ROOT . 'models/pdf_maker.php');

    class Export_Controller 
    {
        public function main() 
        {
            return make_pdf();
        }
    }
?>