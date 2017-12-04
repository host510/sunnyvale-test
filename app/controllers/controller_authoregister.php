<?php
class ControllerAuthoregister extends Controller
{	
	function actionIndex()
	{		
		$this->view->generate('authoregister_view.php', $this->view->template_view);
                
	}
}

