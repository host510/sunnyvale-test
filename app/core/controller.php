<?php
ob_start();
abstract class Controller {
	
	protected $model;
	protected $view;
	
	function __construct()
	{
		$this->view = new View();
                $this->model = new Model();
	}
	
	abstract function actionIndex();
}
?>

