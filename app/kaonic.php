<?php
/**
 * Kaonic micro php framework!
 * 
 * Kaonic is the coolest 6 letter scrabble word from all of our last names!
 */

class Kaonic
{
	private $request;
	private $response;
	private $routes;
	public function __construct(Routes $routes)
	{
		$this->request = new Request();
		$this->routes = $routes;

	}
	public function init()
	{

	}
	
	public function run()
	{
		var_dump($this->request->get());

	}

	public function contact()
	{
		// todo = call template view
	}

	public function about()
	{
		// todo = call template view
	}

	public function cart()
	{
		// to do
	}

	public function checkout()
	{
		// to do
	}

	public function men()
	{
		$temp = $this->request->get();
		$n = count($temp);

		switch ($n) {
			case 0: //product
				break;
			case 1:
				// product::find(['category', $this->request->get(1)])
				break;
			case 2:
				// product::find([slug=> $htis->request->get(2)]);
				break;
		}

	}

	public function women()
	{
		$temp = $this->request->get();
		$n = count($temp);

		switch ($n) {
			case 0: //product
				break;
			case 1:
				// product::find(['category', $this->request->get(1)])
				break;
			case 2:
				// product::find([slug=> $htis->request->get(2)]);
				break;
		}

	}


}
