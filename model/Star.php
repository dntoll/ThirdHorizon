<?php

class Star extends Orbiter {
	public $distance;

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

		//Not really happy with the placement of this method here in this class...
		$hasSpawnedGasGiant = false;
		$hasSpawnedAsteroidBelt = false;

		for ($i = 0; $i < $notFilled; $i++) {
			
			if ($hasSpawnedAsteroidBelt == false && $this->hasAsteroidBelt) {//Make sure every system that has belt has a belt
				$this->add(new RandomBelt());
				$hasSpawnedAsteroidBelt = true;
			} else if ($hasSpawnedGasGiant == false && $this->hasGasGiant) {//Make sure every system that has a gas giant has it
				$this->add(new RandomGasGiant());
				$hasSpawnedGasGiant = true;
			} else if ($this->hasGasGiant === false && $this->hasAsteroidBelt === false) {
				$this->add(new RandomPlanet());
			} else if ($this->hasGasGiant === true && $this->hasAsteroidBelt === false) {
				if (rand()%3 > 0) {
					$this->add(new RandomPlanet());
				} else {
					$this->add(new RandomGasGiant());
					$hasSpawnedGasGiant = true;
				}
			} else if ($this->hasGasGiant === false && $this->hasAsteroidBelt === true) {
				if (rand()%3 > 0) {
					$this->add(new RandomPlanet());
				} else {
					$this->add(new RandomBelt());
					$hasSpawnedAsteroidBelt = true;
				}
			} else {
				if (rand()%3 > 0) {
					$this->add(new RandomPlanet());
				} else if (rand()%2) {
					$this->add(new RandomGasGiant());
					$hasSpawnedGasGiant = true;
				} else{
					$this->add(new RandomBelt());
					$hasSpawnedAsteroidBelt = true;
				}
			}
		}

		//should be sorted so that Gas Giants are more common out in the rim
	}

	public function getType() : String {
		return "Stjärna";
	}

}
