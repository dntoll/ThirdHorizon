<?php

class Seed {

	private $systems = array();

	public function __construct(int $numSystems) {
		for ($i = 0; $i  < $numSystems; $i++) {
			$this->systems[$i] = rand()%10000;
		}
	}

	public function getSystemSeed(int $index) {
		return $this->systems[$index];
	}

	public function getSeedString() : String {
		$ret ="";
		for ($i = 0; $i  < count($this->systems); $i++) {
			$ret .= "$i=" . dechex($this->systems[$i]) .":";
		}
		return $ret;
	}

	public function getSeedStringModified(int $indexToRandomize) : String {
		$ret ="";
		for ($i = 0; $i  < count($this->systems); $i++) {
			if ($i === $indexToRandomize) {
				srand();
				$ret .= "$i=" . dechex(rand() %  10000) .":";
			} else {
				$ret .= "$i=" . dechex($this->systems[$i]) .":";
			}
		}
		return $ret;
	}


	public static function fromString(String $seedString, int $numSystems) : Seed {

		$ret = new Seed($numSystems);
		$systemRaw = explode(":", $seedString, $numSystems);

		foreach($systemRaw as $key => $element) {
			$parts = explode("=", $element);
			$ret->systems[intval($key)] = hexdec($parts[1]);
		}

		return $ret;
	}
}