<?php

class View
{
	public $template_view = 'template_view.php'; 
        function generate($content_view, $template_view)
	{
		
		include '/app/views/'.$template_view;
                echo '<script src="/public/js/main.js"></script>';                
	}
}

