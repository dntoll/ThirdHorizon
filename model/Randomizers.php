<?php


function dieRoll( $num) {
	$ret = 0;
	for ($i = 0; $i < $num; $i++) {
		$ret += rand()%6+1;
	}
	return $ret;
}

function t66( ) {
	$die1 = rand()%6+1;
	$die2 = rand()%6+1;
	
	return intval("$die1$die2");
}

function inOrbit() {
	$die = dieRoll(2);
	switch ($die) {
		case 2 : return inOrbit() . "" . inOrbit();//slå två gånger...
		case 3 : return "Bortglömda stationer"; break;
		case 4 : return "Satelliter"; break;
		case 5 : return "Rymdstation"; break;
		case 6 : 
		case 7 : 
		case 8 : return "Tom rymd"; break; //tom rymd
		case 9 : 
		case 10 : return "Måne/månar"; break;
		case 11 : return "Ringar"; break;
		case 12 : return "Asteroidbälte"; break;
	}

	throw Exception("should not get here");
}

function planetNameGenerator() {
	$hasNumber = rand() % 5 == 0;
	$number = rand() % 10000+2;



	$preNames = array("", "", "", "New", "", "");
	$firstParts = array("Sul", "War", "Antini", "Un", "Pemp", "Sata", "Xin", "M'", "Ly", "Sly", "Gany", "Kyo", "Hyro", "Mari", "Ari", "Ha", "Ya");
	$secondParts = array("du", "ly", "scha", "gol", "redo", "nis", "ri", "tir", "ni", "mede", "kin", "rir");
	$lastNames = array("", "", "", "Prime", "III", "Vesta", "VI");

	$firstPart = $firstParts[rand()%count($firstParts)];
	$secondPart = $secondParts[rand()%count($secondParts)];
	$lastName = $lastNames[rand()%count($lastNames)];

	if ($hasNumber == false)
		$preName = $preNames[rand()%count($preNames)];
	else
		$preName = "";


	return ($hasNumber ? $number : "") . "$preName $firstPart$secondPart $lastName";
}

function hooks() {
	$die = t66();
	
	switch ($die) {
		case 11 : return "Portalbyggarruiner";
		case 12 : return "Förstkomna ruiner";
		case 13 : return "Tidigare kolonisering";
		case 14 : return "Förfallen stad";
		case 15 : return "Störtat skepp";
		case 16 : return "Okända ruiner";

		case 21 : return "Titanstormar";
		case 22 : return "Översvämningar";
		case 23 : return "Extrem nederbörd";
		case 24 : return "Eldstormar och skogsbränder";
		case 25 : return "Vulkanutbrott";
		case 26 : return "Seismiskt högaktiv";

		case 31 : return "Kult";
		case 32 : return "Primitiva förstkomna";
		case 33 : return "Kolonister";
		case 34 : return "Rebeller";
		case 35 : return "Militärer";
		case 36 : return "Forskare";

		case 41 : return "Korsarer";
		case 42 : return "Fribrigader i uppror";
		case 43 : return "Fraktionssammandrabbningar";
		case 44 : return "Laglöshet";
		case 45 : return "Mörkret mellan stjärnorna";
		case 46 : return "Farliga väsen";

		case 51 : return "Diktatur";
		case 52 : return "Emirat";
		case 53 : return "Polisstat";
		case 54 : return "Folkvälde";
		case 55 : return "Ikonokrati";
		case 56 : return "Extremt patriarkat/matriarkat";

		case 61 : return "Krig";
		case 62 : return "Naturkatastrof";
		case 63 : return "Epidemi";
		case 64 : return "Ockupation";
		case 65 : return "Pilgrimaria";
		case 66 : return "Apokalyps";
	}
	throw new Exception("should not happen");
}

function fraction() {
	$die = dieRoll(2);
	switch ($die) {
		case 2 : return "Syndikatet";
		case 3 : return "Legionen"; 
		case 4 : return "Fria ligan";
		case 5 : return "Zenits hegemoni";
		case 6 : 
		case 7 : return "Konsortiet";
		case 8 : return "Ikonernas kyrka"; 
		case 9 : return "Ahlams tempel";
		case 10 : return "Nomadfederationen";
		case 11 : return "Pariatets orden"; 
		case 12 : return "Drakoniterna"; 
	}

	throw Exception("should not get here");
}

class RandomPlanet extends Planet {

	public function __construct() {
		$atmodies = 0; //modifierare
		$geodies = 0;//modifierare
		$popdies = 0;
		$harborModifier = 0;

		$die = dieRoll(2);
		switch ($die) {
			case 2 : $this->size = "1000 km, Närmast 0 G"; $popdies = -4; break;
			case 3 : $this->size = "2000 km, 0.1 G"; $popdies = -4; break;
			case 4 : $this->size = "4000 km, 0.2 G"; $popdies = -4; break;
			case 5 : 
			case 6 : $this->size = "7000 km, 0.5 G"; break;
			case 7 : 
			case 8 : $this->size = "10 000 km, 0.7 G"; break;
			case 9 : 
			case 10 : $this->size = "12 500 km, 1 G"; break;
			case 11 : $this->size = "15 000 km, 1.5 G"; break;
			case 12 : $this->size = "20 000 km, 2 G"; break;
		}

		$die = dieRoll(2);

		switch ($die) {
			case 2 : $this->atmosphere = "Giftig"; break;
			case 3 : $this->atmosphere = "Tunn"; $geodies = -4; break;
			case 4 : 
			case 5 : 
			case 6 : 
			case 7 : 
			case 8 : $this->atmosphere = "Andningsbar"; break;
			case 9 : $this->atmosphere = "Tät"; $atmodies = 1; $geodies = -4; break;
			case 10 : $this->atmosphere = "Frätande, giftig"; $atmodies = 6; $geodies = -4; break;
			case 11 : $this->atmosphere = "Infiltrerande, giftig"; $atmodies = 6; break;
			case 12 : $this->atmosphere = "Special"; break;
		}



		$die = dieRoll(2);
		switch ($die + $atmodies) {
			case -4 : 
			case -3 : 
			case -2 : 
			case -1 : 
			case 0 :
			case 1 : 
			case 2 : $this->temperature = "Frusen < -50˚, Allt vatten är fruset och atmosfären är väldigt torr."; break;
			case 3 : 
			case 4 : $this->temperature = "Kall -50˚ till 0˚, Lite vatten finns, istid på land och få moln."; break;
			case 5 : 
			case 6 : 
			case 7 : 
			case 8 : 
			case 9 : $this->temperature = "Tempererad 0˚ till 30˚ Jordlik planet med moln och polarisar"; break;
			case 10 : 
			case 11 : $this->temperature = "Varm 31˚ till 80˚ Lite vatten finns, små polarisar och mycket moln"; $geodies = -2;break;
			default : $this->temperature = "Brännande >80˚ Ingen polaris, och mycket lite vatten";$geodies = -4; break;
		}

		$die = dieRoll(2);
		switch ($die + $geodies) {
			case -4 : 
			case -3 : 
			case -2 : 
			case -1 : 
			case 0 :
			case 1 : 
			case 2 : $this->geosphere = "Ökenvärld Endast öken och bara underjordiskt vatten."; break;
			case 3 : 
			case 4 : $this->geosphere = "Torr värld Utbredda öknar och torra slätter med enstaka mindre hav."; break;
			case 5 : $this->geosphere = "Våt värld Stora hav men mest landyta"; break;
			case 6 : 
			case 7 : 
			case 8 : 
			case 9 : $this->geosphere = "Jordlik värld."; break;
			case 10 : $this->geosphere = "Ö-värld Oceaner och mindre landyta"; break;
			case 11 : $this->geosphere = "Havsvärld Endast enstaka arkipelager och småöar."; break;
			default : $this->geosphere = "Vattenvärld Endast ocean."; break;
		}

		$die = dieRoll(2);
		switch ($die + $popdies) {
			case -4 : 
			case -3 : 
			case -2 : 
			case -1 : 
			case 0 :
			case 1 : 
			case 2 : $this->population = "Obebodd."; break;
			case 3 : $this->population = "Övergiven utpost."; $harborModifier = -8; break;
			case 4 : $this->population = "Utpost."; $harborModifier = -6; break;
			case 5 : $this->population = "Hundratals invånare."; $harborModifier = -6; break;
			case 6 : 
			case 7 : $this->population = "Tusentals invånare."; $harborModifier = -4; break;
			case 8 : 
			case 9 : $this->population = "Tiotusentals invånare."; break;
			case 10 : 
			case 11 : $this->population = "Hundratusentals invånare."; $harborModifier = +1 ; break;
			default : $this->population = "Miljontals invånare."; $harborModifier = +4; break;
		}

		$die = dieRoll(2);
		switch ($die + $harborModifier) {
			case -4 : 
			case -3 : 
			case -2 : 
			case -1 : 
			case 0 :
			case 1 : 
			case 2 : 
			case 3 : $this->spaceHarbor = "Primitivt landningsfält (-3 underhåll)."; break;
			case 4 : 
			case 5 : $this->spaceHarbor = "Enkel rymdhamn (-3 underhåll)."; break;
			case 6 : 
			case 7 : 
			case 8 : $this->spaceHarbor = "Medelstor rymdhamn (±0 underhåll). "; break;
			case 9 : 
			case 10 :$this->spaceHarbor = "Vältrafikerad rymdhamn (±0 underhåll). "; break; 
			case 11 : $this->spaceHarbor = "Handelskluster rymdhamnar (+1 underhåll)."; break;
			default : $this->spaceHarbor = "Metropolis rymdhamnar (+1 underhåll)."; break;
		}

		$die = dieRoll(1);
		switch ($die) {
			case 1 : $this->numFractions = 1; $this->fractionBalans = "En ensam dominerande";  break;
			case 2 : $this->numFractions = 2; $this->fractionBalans = "Två i balans";  break;
			case 3 : $this->numFractions = 2; $this->fractionBalans = "Två konkurrerande";  break;
			case 4 : $this->numFractions = 2; $this->fractionBalans = "En dominerande, en svag";  break;
			case 5 : $this->numFractions = 3; $this->fractionBalans = "Tre konkurrerande";  break;
			case 6 : $this->numFractions = dieRoll(1); $this->fractionBalans = " slå en tärning för varje fraktion, resultatet är styrkan gentemot de andra.";  break;
			
		}

		$this->fractions = "";
		for($i = 0; $i < $this->numFractions; $i++) { //TODO should not be able to roll the same again...
			$this->fractions .= fraction() . ", ";
		}

		$this->inOrbit = inOrbit();

		$this->hooks = hooks() . ", " . hooks();

		parent::__construct(planetNameGenerator() );
	}

	public function getSize() : String {
		
	}

	
}

class RandomGasGiant extends Planet {
	public function __construct() {
		$die = dieRoll(2);
		switch ($die) {
			case 2 : $this->size = "40 000 km"; break;
			case 3 : $this->size = "60 000 km"; break;
			case 4 : $this->size = "100 000 km"; break;
			case 5 : 
			case 6 : 
			case 7 : 
			case 8 : 
			case 9 : $this->size = "150 000 km"; break;
			case 10 : 
			case 11 : $this->size = "200 000 km"; break;
			case 12 : $this->size = "250 000 km"; break;
		}

		$die = dieRoll(2);
		switch ($die) {
			case 2 : $this->color = "Vit"; break;
			case 3 : $this->color = "Gråskimrande"; break;
			case 4 : 
			case 5 : 
			case 6 : $this->color = "Svavelgul"; break;
			case 7 : 
			case 8 : 
			case 9 : $this->color = "Rödorange"; break;
			case 10 : $this->color = "Smaragdgrön"; break;
			case 11 : $this->color = "Azurblå"; break;
			case 12 : $this->color = "Svart"; break;
		}

		$die = dieRoll(2);
		switch ($die) {
			case 2 : 
			case 3 : 
			case 4 : 
			case 5 : 
			case 6 : $this->temperature = "-200˚"; break;
			case 7 : $this->temperature = "0˚"; break;
			case 8 : 
			case 9 : $this->temperature = "500˚"; break;
			case 10 : $this->temperature = "1000˚"; break;
			case 11 : $this->temperature = "2000˚"; break;
			case 12 : $this->temperature = "3000˚"; break;
		}

		$die = dieRoll(2);
		switch ($die) {
			case 2 : 
			case 3 : $this->signature = "Ringar"; break;
			case 4 : 
			case 5 : 
			case 6 : $this->signature = "Stormar"; break;
			case 7 : 
			case 8 : $this->signature = "Fläck - superstorm"; break;
			case 9 : 
			case 10 : $this->signature = "Varmt/kallt hål"; break;
			case 11 : $this->signature = "Gasvarelser"; break;
			case 12 : $this->signature = "Artefakt i omloppsbana"; break;
		}

		

		$this->inOrbit = inOrbit();

		parent::__construct(planetNameGenerator());
	}
}



class RandomBelt extends Planet {
	public function __construct() {

		$die = dieRoll(1);
		switch ($die) {
			case 1 : $this->size = "Smalt som en ring, mindre än en planetdiameter (5 - 10 000 km)"; break;
			case 2 : 
			case 3 : 
			case 4 : $this->size = "Vanligt, cirka 1-2 AD från kant till kant"; break;
			case 5 : $this->size = "Massivt, 10 AD brett och högt. Det skymmer solen för de yttre planeterna"; break;
			case 6 : $this->size = "Utspritt, >20 AD brett"; break;
		}

		$die = dieRoll(1);
		switch ($die) {
			case 1 : $this->composition = "Damm/aska"; break;
			case 2 : $this->composition = "Is"; break;
			case 3 : 
			case 4 : 
			case 5 : $this->composition = "Grus och is"; break;
			case 6 : $this->composition = "Metall, vrak och planetlämningar"; break;
		}

		$die = dieRoll(2);
		switch ($die) {
			case 2 : $this->signature = "Bältet är närmast svart som mörkret mellan stjärnorna och svårnavigerat"; break;
			case 3 : $this->signature = "Bältet är mycket ljusstarkt och syns alltid på himlen, även dagtid"; break;
			case 4 : $this->signature = "En större planet finns mitt i bältet"; break;
			case 5 : 
			case 6 : 
			case 7 : 
			case 8 : $this->signature = ""; break; //Inget särskilt
			case 9 : $this->signature = "Bältet går i vinkel mot övriga planeters banor"; break;
			case 10 : $this->signature = "Bältet frekventeras av vakuumvarelser"; break;
			case 11 : $this->signature = "Bältet oscillerar i storlek över segmenten, som tidvatten"; break;
			case 12 : $this->signature = "Bältet innehåller mycket rester från portalbyggarna"; break;
		}

		parent::__construct("Asteroidbälte");
	}
}
