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
		echo "System " . $system->getName() . "\n" ;
		$stars = $system->getOrbiters();
		foreach ($stars as $star) {
			$this->showOrbiter($star, 1);
		}
	}

	public function showOrbiter(Orbiter $star, $depth) {
		
		for($i = 0; $i < $depth; $i++) {
			echo "\t";
		}

		echo " " . $star->getName() . "\n" ;
		$planets = $star->getOrbiters();
		foreach ($planets as $planet) {
			$this->showOrbiter($planet, $depth + 1);
		}
	}

	

}
