<?php

class Model
{
	private $servername = 'localhost';
	private $dbname = 'test';
	private $username = 'root';
	private $password = 'root';

	protected $dbh;
	protected $stmh;

	// to do remove me
	public static $table = "products";
	//

	public function __construct() {
		$this->connect();
	}

	public function connect()
	{
		$this->dbh = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

		return $this->dbh;
	}


	public function query($sql, array $params)
	{
		$sql = 'SELECT * FROM mytable WHERE name = :name';
		$params = [':name' => 'kevin'];

		$this->stmh = $this->dbh->prepare($sql);
		$this->stmh->execute($params);

		$results = [];
		while($row = $this->stmh->fetch(PDO::FETCH_ASSOC)) {
			$results[] = $row;
		}

		return $results;
		//return $this->stmh->fetch(PDO::FETCH_ASSOC);
	}

	/* potentially use for find		
		$sql = "select * from ";
		$sql .= static::$table;
		$count = 0;
		foreach($params as $key => $value) {
			if ($count == 0) {
				//$sql .= $key . " " . $value;
				$sql .= " where " . $key . "=" . $value;
				$count++;
			}
			else {
				$sql .= " and " . $key . "=" . $value;
			}
		}
		$sql .= ";";

		$this->stmh;
		*/
}