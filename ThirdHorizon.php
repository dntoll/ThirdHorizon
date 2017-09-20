<?php

class ThirdHorizon {

	public static function getPresets() : Horizon{
		$third = new Horizon();

		$system = new StarSystem("Aiwaz");
		$third->addStarSystem($system);
		$star = new Star("Aiwaz A", 0, 3, true, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Aiwaz B", 15, 5, true, true); //Note systemavstånd okänt
		$system->add($star);

		$system = new StarSystem("Algebar");
		$third->addStarSystem($system);
		$star = new Star("Algebar", 0, 12, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Algol");
		$third->addStarSystem($system);
		$star = new Star("Algol", 0, 6, true, true); //Gasgiant, astrobelt
		$star->add(new Planet("Algol"));
		$system->add($star);
		$star = new Star("Persei", 0.1, 0, false, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Rhaas", 15, 2, false, false); //Gasgiant, astrobelt
		$system->add($star);
		
		$system = new StarSystem("Altai");
		$third->addStarSystem($system);
		$star = new Star("Altai", 0, 7, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Amedo");
		$third->addStarSystem($system);
		$star = new Star("Amedo A", 0, 10, true, true); //Gasgiant, astrobelt
		$star->add(new Planet("Amedo"));
		$system->add($star);
		$star = new Star("Amedo B (Ekharan)", 100, 3, false, false); //Gasgiant, astrobelt
		$star->add(new Orbiter("Ekharans öga"));
		$system->add($star);

		$system = new StarSystem("Anaspora");
		$third->addStarSystem($system);
		$star = new Star("Anaspora", 0, 3, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Awadhi");
		$third->addStarSystem($system);
		$star = new Star("Awadhi A", 0, 3, false, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Awadhi B", 2, 7, true, true); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Awadhi C", 600, 0, false, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Caph");
		$third->addStarSystem($system);
		$star = new Star("Caph A", 0, 4, false, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Caph B", 100, 5, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Dabaran");
		$third->addStarSystem($system);
		$star = new Star("Dabaran A (röd jätte)", 0, 7, true, true); //Gasgiant, astrobelt
		$star->add(new Planet("Dabaran"));
		$star->add(new Planet("Salamanx"));
		$star->add(new Planet("Arara"));
		$system->add($star);
		$star = new Star("Dabaran B (liten så den knappt syns)", 0.5, 0, true, true); //Gasgiant, astrobelt
		$system->add($star);		

		$system = new StarSystem("Daybul");
		$third->addStarSystem($system);
		$star = new Star("Daybul A", 0, 3, true, true); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Daybul B", 60, 3, true, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Dziban");
		$third->addStarSystem($system);
		$star = new Star("Dziban", 0, 3, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Eanu");
		$third->addStarSystem($system);
		$star = new Star("Eanu A", 0, 3, true, true); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Eanu B", 15, 3, true, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Erequ");
		$third->addStarSystem($system);
		$star = new Star("Erequ", 0, 5, false, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Errai");
		$third->addStarSystem($system);
		$star = new Star("Errai A", 0, 6, false, true); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Errai B", 70, 2, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Ghodar");
		$third->addStarSystem($system);
		$star = new Star("Ghodar", 0, 3, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Hamura");
		$third->addStarSystem($system);
		$star = new Star("Hamura", 0, 2, true, false); //Gasgiant, astrobelt

		$hamura = new Planet("Hamura");
		$hamura->add(new SpaceStation("Hamurabi"));
		$star->add($hamura);

		$system->add($star);
		
		
		$kua = new StarSystem("Kua");
		$third->addStarSystem($kua);
		$kuastar = new Star("Kua", 0, 6, true, true);
		$kua->add($kuastar);
		$kuastar->add(new Planet("Lubau"));
		$kuastar->add(new Planet("Jina"));
		$kuaplanet = new Planet("Kua");
		$orbiter = new SpaceStation("Coriolis");
		$orbiter->population = 521465 + 189453;
		$orbiter->size = "6136m hög, 3540m diameter";
		$kuaplanet->add($orbiter);
		$kuaplanet->add(new SpaceStation("Nätet"));
		$kuastar->add($kuaplanet);
		$kuastar->add(new Asteroidbelt("Asteroidbältet"));
		$kuastar->add(new Planet("Xene"));
		$kuastar->add(new Planet("Surha"));
		$gransrymden = new Fringe("Gränsrymden");
		$gransrymden->add(new SpaceStation("Djachroum"));
		$kuastar->add($gransrymden);
		
		
		
		$mira = new StarSystem("Marfik");
		$third->addStarSystem($mira);
		$star = new Star("Marfik", 0, 4, false, false);
		$mira->add($star);

		$mira = new StarSystem("Melik");
		$third->addStarSystem($mira);
		$star = new Star("Melik", 0, 5, true, false); //Gasgiant, astrobelt
		$mira->add($star);

		$system = new StarSystem("Menkar");
		$third->addStarSystem($mira);
		$star = new Star("Menkar A", 0, 4, true, false); //Gasgiant, astrobelt
		$system->add($star);
		$star->add(new Planet("Menkar"));
		$star = new Star("Menkar B", 0, 3, true, true); //Gasgiant, astrobelt
		$system->add($star);
		

		$mira = new StarSystem("Mira");
		$third->addStarSystem($mira);
		$star = new Star("Mira A", 0, 6, true, true);
		$star->add(new Planet("Mira"));
		$mira->add($star);
		$star = new Star("Mira B (Antmira)", 25, 4, true, false);
		$mira->add($star);
		$star = new Star("Mira C (Menau)", 1000, 5, true, false);
		$star->add(new Planet("Menau"));
		$mira->add($star);

		$system = new StarSystem("Nagar");
		$third->addStarSystem($system);
		$star = new Star("Nagar A", 0, 4, true, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Nagar B", 500, 0, false, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Nharmada");
		$third->addStarSystem($system);
		$star = new Star("Nharmada A", 0, 2, false, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Nharmada B", 0.5, 7, false, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Nharmada C (röd jätte)", 40, 4, true, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Odacon");
		$third->addStarSystem($system);
		$star = new Star("Odacon", 0, 5, false, true); //Gasgiant, astrobelt
		$star->add(new SpaceStation("Khôban"));
		$sethlan = new Planet("Sethlan");
		$sethlan->add(new SpaceStation("Echron"));
		$star->add($sethlan);
		$star->add(new Asteroidbelt("Askbältet"));
		$star->add(new Planet("Qayna"));
		$system->add($star);

		$system = new StarSystem("Ordana");
		$third->addStarSystem($system);
		$star = new Star("Ordana A", 0, 7, true, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Ordana B", 200, 6, false, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Rigel");
		$third->addStarSystem($system);
		$star = new Star("Rigel", 0, 1, false, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Sadaal");
		$third->addStarSystem($system);
		$star = new Star("Ashegird (Sadaal)", 0, 9, true, false); //Gasgiant, astrobelt
		$star->add(new Planet("Sadaal"));
		$system->add($star);
		$star = new Star("Bahram", 50, 1, false, true); //Gasgiant, astrobelt
		$star->add(new Planet("Bahram"));
		$system->add($star);

		$system = new StarSystem("Sivas");
		$third->addStarSystem($system);
		$star = new Star("Sivas", 0, 5, true, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Taoan");
		$third->addStarSystem($system);
		$star = new Star("Taoan", 0, 3, true, false); //Gasgiant, astrobelt
		$star->add(new Planet("Taoan (gasjätte)"));
		$system->add($star);

		$system = new StarSystem("Tarazug");
		$third->addStarSystem($system);
		$star = new Star("Tarazug", 0, 4, true, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Uharu");
		$third->addStarSystem($system);
		$star = new Star("Uharu", 0, 3, false, false); //Gasgiant, astrobelt
		$uharu = new Planet("Uharu");
		$uharu->add(new Moon("den lavatäckta månen Pyre"));
		$star->add($uharu);
		$system->add($star);
		$star = new Star("Zuhal", 15, 26, false, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Yastapol");
		$third->addStarSystem($system);
		$star = new Star("Yastapol", 0, 2, true, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Zalos");
		$third->addStarSystem($system);
		$star = new Star("Zalos A", 0, 3, false, true); //Gasgiant, astrobelt
		$star->add(new Planet("Zalos A"));
		$benegia = new Planet("Benegia");
		$benegia->add(new SpaceStation("Karrmerruk"));
		$benegia->add(new Orbiter("Kryssaren Martyrens hammare"));
		$star->add($benegia);
		$system->add($star);
		$star = new Star("Zalos B", 10, 4, true, false); //Gasgiant, astrobelt
		$star->add(new Planet("Zalos B"));
		$system->add($star);
		

		$system = new StarSystem("Zamusa");
		$third->addStarSystem($system);
		$star = new Star("Zamusa", 0, 2, false, false); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Zhau");
		$third->addStarSystem($system);
		$star = new Star("Zhau A", 0, 6, false, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Zhau B", 0, 4, true, false); //Gasgiant, astrobelt
		$system->add($star);
		$star = new Star("Zhau C", 0, 3, false, true); //Gasgiant, astrobelt
		$system->add($star);

		$system = new StarSystem("Zib");
		$third->addStarSystem($system);
		$star = new Star("Zamusa", 0, 4, false, true); //Gasgiant, astrobelt
		$system->add($star);

		
		return $third;
	}
}
