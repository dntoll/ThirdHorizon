<?php

require_once("Orbiter.php");
require_once("StarSystem.php");
require_once("Star.php");
require_once("Planet.php");
require_once("Moon.php");
require_once("SpaceStation.php");
require_once("Asteroidbelt.php");
require_once("Fringe.php");
require_once("Seed.php");

class Horizon {

	public function __construct() {
		$this->systems = array();
	}

	public function getStarSystems() : array {
		return $this->systems;
	}

	public function addStarSystem(StarSystem $system) {
		$this->systems[] = $system;
	}

	public function getNumSystems() : int {
		return count($this->systems);
	}

	public function fill(Seed $seed) {

		
		foreach($this->systems as $key => $system) {
			srand($seed->getSystemSeed($key));
			$system->fill();
		}
	}
}
