<?php
    require_once(SERVER_ROOT . 'moodels/pdf_maker');

    class Export_Controller 
    {
        public function main($ev_start, $ev_utolso) 
        {
            make_pdf($ev_start, $ev_utolso);
        }
    }
?>