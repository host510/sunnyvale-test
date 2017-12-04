<?php
class ControllerModeration extends Controller
{	
	function actionIndex()
	{		
		$this->view->generate('moderation_view.php', $this->view->template_view);
                
	}
}

