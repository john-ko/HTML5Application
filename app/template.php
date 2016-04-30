<?php

class Template
{
	function __construct(Data $data)
	{
		$this->_data = $data;
	}

	public function render($obj)
	{
		if (!this->doesTemplateExist($this->_template)) {
			throw new \Exception("File Not Found - a", 404);
		}

		if($this->doesViewFileExist()) {
			throw new \Exception("File Not Found - b", 404);
		}

		extract($obj);

		include(ROOT."app".DS."public_html".DS )
	}



}