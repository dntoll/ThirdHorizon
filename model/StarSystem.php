<?php

class StarSystem extends Orbiter{
	public function fill() {
		foreach($this->orbiters as $star) {
			$star->fill();
		}
	}
}
