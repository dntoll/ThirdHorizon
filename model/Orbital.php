<?php

class Orbiter {
	private $name;
	private $orbiters;

	public function __construct(String $name) {
		$this->name = $name;
		$this->orbiters = array();
	}

	public function getName() : String {
		return $this->name;
	}

	public function getOrbiters() : array {
		return $this->orbiters;
	}

	public function add(Orbiter $star) {
		$this->orbiters[] = $star;
	}
}
