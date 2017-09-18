<?php

class Planet extends Orbiter {
	protected $size = "";

	public function getSize() : String {
		return $this->size;
	}
}

function dieRoll( $num) {
	$ret = 0;
	for ($i = 0; $i < $num; $i++) {
		$ret += rand()%6+1;
	}
	return $ret;
}

class RandomPlanet extends Planet {

	public function __construct() {
		


		$die = dieRoll(2);
		switch ($die) {
			case 2 : $this->size = "1000 km, Närmast 0 G"; break;
			case 3 : $this->size = "2000 km, 0.1 G"; break;
			case 4 : $this->size = "4000 km, 0.2 G"; break;
			case 5 : 
			case 6 : $this->size = "7000 km, 0.5 G"; break;
			case 7 : 
			case 8 : $this->size = "10 000 km, 0.7 G"; break;
			case 9 : 
			case 10 : $this->size = "12 500 km, 1 G"; break;
			case 11 : $this->size = "15 000 km, 1.5 G"; break;
			case 12 : $this->size = "20 000 km, 2 G"; break;
		}

parent::__construct("Random Planet " . $this->size);
	}

	public function getSize() : String {
		
	}

	
}

class RandomGasGiant extends Planet {
	public function __construct() {
		parent::__construct("Random Gas Giant");
	}
}

class RandomBelt extends Planet {
	public function __construct() {
		parent::__construct("Random Asteroid Belt");
	}
}
