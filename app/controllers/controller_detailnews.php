<?php
class ControllerDetailnews extends Controller
{	
	function actionIndex()
	{		
            $this->view->generate('detailnews_view.php', $this->view->template_view);           
	}
      
}
