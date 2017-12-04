<?php
class ControllerMain extends Controller
{	
	function actionIndex()
	{		
		$this->view->generate('main_view.php', $this->view->template_view);
                
	}
}
