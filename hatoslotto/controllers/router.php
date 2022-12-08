<?php 
    $page = 'fo_oldal';
    $request = $_SERVER['QUERY_STRING'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $page = $request;
    }
    else if ($request == 'pdf_page') 
    {
        $page = 'pdf_page';
    }
    else if ($request == 'grafikon_page') 
    {
        $page = 'grafikon_page';
    }

    $controllerfile = $page;
    $target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
    if(! file_exists($target))
    {
        $controllerfile = "error404";
        $target = SERVER_ROOT.'controllers/error404.php';
    }

    include_once($target);
    $class = ucfirst($controllerfile).'_Controller';
    if(class_exists($class))
    { 
        if ($page == 'export') {
            $controller = new $class; 
            return $controller->main($_POST['start_year'], $_POST['end_year'], $_POST['money']);
        } else if ($page == 'hatos_ido_penz') {
            $controller = new $class; 
            return $controller->main($_POST['start_year'], $_POST['end_year'], $_POST['money']);
        } else {
            $controller = new $class; 
            return $controller->main();
        }
    }
    else 
    { 
        die('class does not exists!'); 
        
    }
    
?>