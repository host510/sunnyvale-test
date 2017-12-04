<?php
class ControllerAuthoraccess extends Controller
{	
	function actionIndex()
	{		
		$this->view->generate('authoraccess_view.php', $this->view->template_view);
                
	}
}
