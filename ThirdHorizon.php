<?php

class ThirdHorizon {

	public static function getPresets() : Horizon{
		$third = new Horizon();
		
		$kua = new StarSystem("Kua");
		$third->addStarSystem($kua);
		$kuastar = new Star("Kua", 0, 6, true, true);
		$kua->add($kuastar);
		$kuastar->add(new Planet("Lubau"));
		$kuastar->add(new Planet("Jina"));
		$kuaplanet = new Planet("Kua");
		$kuaplanet->add(new Orbiter("Coriolis"));
		$kuaplanet->add(new Orbiter("Nätet"));
		$kuastar->add($kuaplanet);
		$kuastar->add(new Planet("Asteroidbältet"));
		$kuastar->add(new Planet("Xene"));
		$kuastar->add(new Planet("Surha"));
		$kuastar->add(new Planet("Gränsrymden"));
		
		
		

		$mira = new StarSystem("Mira");
		$third->addStarSystem($mira);
		$star = new Star("Mira A", 0, 6, true, true);
		
		$mira->add($star);
		$star->add(new Planet("Mira"));
		$star = new Star("Mira B (Antmira)", 25, 4, true, false);
		$mira->add($star);
		$star = new Star("Mira C (Menau)", 1000, 5, true, false);
		$mira->add($star);
		
		return $third;
	}
}
