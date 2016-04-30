<?php

class Template
{
	private $view;

	public function __construct($view)
	{
		$this->view = $view;
	}

	public function render($obj)
	{

		extract($obj);

		ob_start();

		include(ROOT. DS . "app".DS."templates".DS.$this->view . '.php');

		$_contents = ob_get_contents();
		ob_end_clean();

		//include template
		include(ROOT.DS."app".DS. "templates".DS."main.php");

	}

}