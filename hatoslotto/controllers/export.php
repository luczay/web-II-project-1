<?php
    require_once(SERVER_ROOT . 'models/pdf_maker.php');

    class Export_Controller 
    {
        public function main($ev_start, $ev_utolso) 
        {
            return make_pdf($ev_start, $ev_utolso);
        }
    }
?>