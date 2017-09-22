<?php


require_once("SVGImage.php");

class StarImage {

	private $starImage;

	public function __construct() {
		$this->starImage = new SVGImage(255, 32);
	}

	public function getStarImage(Orbiter $orbiter) : String {
		
		
		
		$r = 16;
		$y = 16;
		$x = 16;

		//$orbiter->visit($this);
		//$this->starImage->drawCircle($x, $y, $r);
		$this->drawItem($orbiter, $x, $y, $r);
		
		$orbiters = $orbiter->getOrbiters();
		$x += 6;

		//draw main planets
		foreach ($orbiters as $orb) {
			$x += $r + 8;


			$this->drawItem($orb, $x, $y, $r);
		}

		return $this->starImage->toString();
	}

	private function drawItem(Orbiter $orb, $x, $y, $r) {
		$this->starImage->drawDashCircle(16, 16, $x-$r);
		$this->starImage->setFillColor(255, 255, 255);
		switch($orb->getType()) {
				case "Stjärna" :  
					$this->starImage->setFillColor(255, 255, 0);
					$this->starImage->drawCircle($x, $y, $r); break;
				case "Måne" :  $this->starImage->drawCircle($x, $y, $r/4); break;
				case "Planet" : $this->starImage->drawCircle($x, $y, $r/4); break;
				case "Gasjätte" : $this->starImage->drawCircle($x, $y, $r/2); break;
				case "Asteroidbälte" : 
				case "Gränsrymd" : 
					$this->starImage->drawFrame($x-1, $y-6, $r/6, $r/8);
					$this->starImage->drawFrame($x+1, $y, $r/6,$r/5);
					$this->starImage->drawFrame($x-2, $y+6, $r/4,$r/6);
					//$this->starImage->drawFrame($x+2, $y+8, $r/5,$r/4);
					break;
				case "Rymdstation" :  
					$this->starImage->drawCircle($x, $y, $r/5);
					break;
				default : $this->starImage->drawCircle($x, $y, $r/4);	

			}

	}
}