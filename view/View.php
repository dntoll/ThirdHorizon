<?php



class View {
	public function __construct(Horizon $h) {
		$this->h = $h;
	}

	public function show() {
		$systems = $this->h->getStarSystems();
		foreach ($systems as $system) {
			$this->showSystem($system);
		}
	}

	public function showSystem(StarSystem $system) {
		echo "\nSystem " . $system->getName() . "\n" ;
		$stars = $system->getOrbiters();
		foreach ($stars as $star) {
			$this->showOrbiter($star, 1);
		}
	}

	public function showOrbiter(Orbiter $star, $depth) {
		$tabs = "";
		for($i = 0; $i < $depth; $i++) {
			$tabs .= "\t";
		}

		echo "$tabs" . get_class($star) ." " . $star->getName() . "\n" ;

		foreach ($star as $key => $value) {
			echo $tabs . "\t$key: $value" . "\n" ;
		}

		$planets = $star->getOrbiters();
		foreach ($planets as $planet) {
			$this->showOrbiter($planet, $depth + 1);
		}
	}

	

}
