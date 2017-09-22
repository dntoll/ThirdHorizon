<?php

class Orbiter {
	protected $name;
	protected $extraInfo;
	protected $orbiters;

	public function __construct(String $name, String $extraInfo = "") {
		$this->name = $name;
		$this->extraInfo = $extraInfo;
		$this->orbiters = array();
	}

	public function getExtraInfo() : String {
		return $this->extraInfo;
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

	public function getType() : String {
		return "Orbiter";
	}
}
