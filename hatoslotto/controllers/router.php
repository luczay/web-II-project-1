<?php 
    $page = 'fo_oldal';

    $request = $_SERVER['QUERY_STRING'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $page = $request;
    }
    else if ($request == 'export') 
    {
        $page = $request;
    }

    $controllerfile = $page;
    $target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
    if(! file_exists($target))
    {
        $controllerfile = "error404";
        $target = SERVER_ROOT.'controllers/error404.php';
    }

    // TODO: duplikáció, légyszi, ne rakd vissza! Nézd meg a felette lévő 6 sort ;)

    include_once($target);
    $class = ucfirst($controllerfile).'_Controller';
    if(class_exists($class))
    { 
        $controller = new $class; 
        return $controller->main();
    }
    else 
    { 
        die('class does not exists!'); 
        
    }
    
?>