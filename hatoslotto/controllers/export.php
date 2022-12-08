<?php
    require_once(SERVER_ROOT . 'models/pdf_maker.php');

    class Export_Controller 
    {
        public function main($start_year, $end_year, $money) 
        {
            return make_pdf($start_year, $end_year, $money);
        }
    }
?>