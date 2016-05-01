<?php

class Template
{
	private $view;

	public function __construct(Cart $cart)
	{
		$this->cart = $cart;
	}

	public function setView($view)
	{
		$this->view = $view;
	}

	public function render($obj = null)
	{
		ob_start();

		include(ROOT. DS . "app".DS."view".DS.$this->view . '.php');

		$_contents = ob_get_contents();
		ob_end_clean();

		//include template
		include(ROOT.DS."app".DS. "templates".DS."main.php");

	}

}