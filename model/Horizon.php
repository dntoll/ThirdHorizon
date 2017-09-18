<?php

require_once("Orbiter.php");
require_once("StarSystem.php");
require_once("Star.php");
require_once("Planet.php");
require_once("Moon.php");

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

	public function fill() {
		foreach($this->systems as $system) {
			$system->fill();
		}
	}
}
