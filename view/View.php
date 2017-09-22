<?php
require_once("StarImage.php");


class View {
	private static $systemLink = "system";

	public function __construct(Horizon $h) {
		
		if (isset($_GET["seed"])) {
			$seedString = $_GET["seed"];
			$this->seed = Seed::fromString($seedString, $h->getNumSystems());
		} else {
			$this->seed = new Seed($h->getNumSystems());
		}
		

		$this->h = $h;
	}

	public function getSeed() : Seed {
		return $this->seed;
	}

	public function show() : String {
		$ret = "";
		$systems = $this->h->getStarSystems();

		$ret .= "<ul class='top'>";
		$ret .= "<li class='top'><a href='?seed=" . $this->seed->getSeedString() . "'>All</a></li>";
		foreach ($systems as $key => $system) {
			$ret .= $this->showSystemLink($key, $system, $this->seed);
		}
		$ret .= "</ul>";
		

		//no system is choosen or system index does not exist
		if (isset($_GET[self::$systemLink]) == false || isset($systems[$_GET[self::$systemLink]]) == false ) {
			//show all
			foreach ($systems as $key => $system) {
				$ret .= $this->showSystem($key, $system, $this->seed);
			}
			$ret .= "<a href='?'>Randomize All</a>";
		} else {
			$ret .= $this->showSystem($_GET[self::$systemLink], $systems[$_GET[self::$systemLink]], $this->seed);
		}

		return $ret;
	}

	private function showSystemLink(int $key, StarSystem $system, Seed $seed) : String {
		return "<li class='top'><a href=\"?".self::$systemLink."=$key&seed=" . $this->seed->getSeedString() . "\">" . $system->getName() . "</a></li>";

	}

	private function showSystem(int $key, StarSystem $system, Seed $seed) : String {
		$ret = "";
		$ret .=  "<h2>System " . $system->getName() . "</h2>\n" ;
		
		
		$stars = $system->getOrbiters();
		
		$ret .=  "<ul>";
		foreach ($stars as $star) {
			$ret .= $this->showStarLink($star);
		}
		$ret .=  "</ul>";
		
		foreach ($stars as $star) {
			$ret .= $this->showOrbiter($star, 3);
		}

		$ret .= "<a href='?".self::$systemLink."=$key&seed=" . $this->seed->getSeedStringModified($key) . "'>Randomize this System</a>";
		return $ret;
	}



	private function showStarLink(Star $star) {
		$ret = "";
		

		$ret .= "<a href=\"#" . urlencode($star->getType() ." " . $star->getName()) . "\">" . $star->getName() . "</a>\n" ;
		if ($star->getDistance() > 0)
			$ret .= "(" . $star->getDistance() . " AD)";
		return $ret;
	}

	private function showOrbiter(Orbiter $star, $depth) : String  {
		$ret = "";
		

		$ret .=  "<h$depth id=\"" .urlencode($star->getType() ." " . $star->getName()). "\" >" . $star->getType() ." " . $star->getName() . "</h$depth>\n" ;

		if ($depth <= 3) {
			$img = new StarImage();
			$ret .= $img->getStarImage($star);
		}
		$ret .=  "<p>" . $star->getExtraInfo() . "</p>";
		$ret .=  "<ul>";
		foreach ($star as $key => $value) {
			$ret .=  "<li>" . $this->translateKeySE($key) .": " . $this->translateValueSE($value) . "</li>" ;
		}
		$ret .=  "</ul>";

		$ret .=  "<ul>";
		$planets = $star->getOrbiters();
		foreach ($planets as $planet) {
			$ret .=  "<li>";
			$ret .= $this->showOrbiter($planet, $depth + 1);
			$ret .=  "</li>";
		}
		$ret .=  "</ul>";

		return $ret;
	}

	private function translateKeySE(String $key) : String{

		switch($key) {
			case "numPlanets" : return "Antal planeter";
			case "hasGasGiant" : return "Har gasjätte";
			case "hasAsteroidBelt" : return "Har asteroidbälte";
			case "size" : return "Storlek";
			case "atmosphere" : return "Atmosfär";
			case "temperature" : return "Temperatur";
			case "geosphere" : return "Geosfär";
			case "population" : return "Befolkning";
			case "spaceHarbor" : return "Rymdhamn";
			case "numFractions" : return "Antal Fraktioner";
			case "fractionBalans" : return "Balans mellan fraktioner";
			case "fractions" : return "Aktiva Fraktioner";
			case "inOrbit" : return "I omloppsbana";
			case "hooks" : return "Krokar";
			case "composition" : return "Sammansättning";
			case "signature" : return "Signatur";
			case "color" : return "Färg";
			case "distance" : return "Systemavstånd";
		}

		return $key;
	}

	private function translateValueSE($value) : String{

		if ($value === true) {
			return "Ja";
		} else if ($value === false) {
			return "Nej";
		}
		

		return $value;
	}

}
