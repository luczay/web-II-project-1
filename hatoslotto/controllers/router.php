<?php 
    $export = False;

    $request = $_SERVER['QUERY_STRING'];
    echo($request);
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $page = $request;
        if ($page == 'export') 
        {
            $export = True;
            $ev_start = $_POST['ev_start'];
            $ev_utolso = $_POST['ev_utolso'];
        }
    }
    else
    {
        return "";
    }

    echo($page);

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
        if ($export) 
        {
            $controller->main($_POST['ev_start'], $_POST['ev_utolso']);
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