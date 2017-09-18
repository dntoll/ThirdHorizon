<?php

class Star extends Orbiter {
	private $distance;

	public function __construct(String $name, float $distance, int $numPlanets, bool $hasGasGiant, bool $hasAsteroidBelt) {
		parent::__construct($name);
		
		$this->distance = $distance;
		$this->numPlanets = $numPlanets;
		$this->hasGasGiant= $hasGasGiant;
		$this->hasAsteroidBelt = $hasAsteroidBelt;
		
	}

	
	public function getDistance() : float {
		return $this->distance;
	}

	public function fill() {
		$pre = count($this->orbiters);
		$notFilled = $this->numPlanets - $pre;

		for ($i = 0; $i < $notFilled; $i++) {
			if ($this->hasGasGiant === false && $this->hasAsteroidBelt === false) {
				$this->add(new RandomPlanet());
			} else if ($this->hasGasGiant === true && $this->hasAsteroidBelt === false) {
				if (rand()%2) {
					$this->add(new RandomPlanet());
				} else {
					$this->add(new RandomGasGiant());
				}
			} else if ($this->hasGasGiant === false && $this->hasAsteroidBelt === true) {
				if (rand()%2) {
					$this->add(new RandomPlanet());
				} else {
					$this->add(new RandomBelt());
				}
			} else {
				if (rand()%2) {
					$this->add(new RandomPlanet());
				} else if (rand()%2) {
					$this->add(new RandomGasGiant());
				} else{
					$this->add(new RandomBelt());
				}
			}
		}
	}

}
