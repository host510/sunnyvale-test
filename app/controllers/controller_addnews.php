<?php
class ControllerAddnews extends Controller
{	
	function actionIndex()
	{		
		$this->view->generate('addnews_view.php', $this->view->template_view);
                
	}
}

