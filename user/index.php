<?php
if($_SERVER['SERVER_NAME'] == 'blog') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

session_start();

if(!empty($_GET)){
    foreach($_GET as $key=>$value){
        $_GET[$key] = htmlspecialchars($value);
    }
}

if(empty($_GET['url']) or $_GET['url'] == '/'){
    $_GET['url'] = 'home/index/';
}

// removes slash from the end of the url
$_GET['url'] = rtrim($_GET['url'], '/');

$url = explode('/', $_GET['url']);

spl_autoload_register(function ($class) { // include physical files of the class.
    if(file_exists(__DIR__.'/controller/' . $class . '.php')){
        include __DIR__.'/controller/' . $class . '.php';
    }elseif(file_exists(__DIR__.'/model/' . $class . '.php')){
        include __DIR__.'/model/' . $class . '.php';
    }else{
        header('Location: /home/error/');
    }
});

$controller = !empty($url[0]) ? $url[0] : 'home';
$controller = ucwords($controller).'Controller';
$_controller = new $controller(); // initiates class(LokangBlogController) using spl_autoload_register function above.
unset($url[0]);
$method = !empty($url[1]) ? $url[1] : 'index';
unset($url[1]);
call_user_func_array([$_controller, $method], array_values($url));