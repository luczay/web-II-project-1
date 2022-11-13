<?php 
    $page = "nyitolap";
    $export = False;

    $request = $_SERVER['QUERY_STRING'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $params = explode('/', $request);
        $page = array_shift($params);
        if ($page == 'export') 
        {
            $export = True;
            $ev_start = $_POST['ev_start'];
            $ev_utolso = $_POST['ev_utolso'];
        }
    }
    else 
    {
        $page = 'main_page';
    }

    $controllerfile = $page;
    $target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
    if(! file_exists($target))
    {
        $controllerfile = "error404";
        $target = SERVER_ROOT.'controllers/error404.php';
    }

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
        $controller = new $class; 
        if ($export) 
        {
            $controller->main($ev_start, $ev_utolso);
        }
        else
        {
            $controller->main();
        }
    }
    else 
    { 
        die('class does not exists!'); 
        
    }
    
?>