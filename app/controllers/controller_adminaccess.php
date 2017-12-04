<?php
class ControllerAdminaccess extends Controller
{	
	function actionIndex()
	{		
		$this->view->generate('adminaccess_view.php', $this->view->template_view);
                
	}
}

