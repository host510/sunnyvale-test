<?php
class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'Index';
               		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
       preg_match("/-[\w\?\!-_\+\.@]+$/", $routes[1], $matches);
       $controller_name = rtrim($routes[1], $matches[0]);
		}
		
		// получаем имя экшина
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}


		$model_name = 'Model'.ucfirst($controller_name);
		$controller_name = 'Controller'.ucfirst($controller_name);
		$action_name = 'action'.ucfirst($action_name);

 
    $model_file = preg_split("/(?=[A-Z])/",$model_name,0,PREG_SPLIT_NO_EMPTY);
		$model_file = strtolower($model_file[0].'_'.$model_file[1]).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path))
		{
			include $model_path;
		}

    $controller_file = preg_split("/(?=[A-Z])/",$controller_name,0,PREG_SPLIT_NO_EMPTY);
		$controller_file = strtolower($controller_file[0].'_'.$controller_file[1]).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include $controller_path;
		}
		else
		{		
			Route::ErrorPage404();                 
		}
		

		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();                  
		}
	
	}
	
	function ErrorPage404()
	{
		http_response_code(404);
    include 'app/views/404.html';
        
    }
}

