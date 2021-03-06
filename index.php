<?php


require_once("model/Horizon.php");
require_once("model/Randomizers.php");
require_once("controller/Controller.php");
require_once("view/View.php");
require_once("view/HTMLView.php");

require_once("ThirdHorizon.php");



$horizon = ThirdHorizon::getPresets();
$view = new View($horizon);


$showHorizon = new Controller($horizon, $view);
$controllerOutput = $showHorizon->doRandomize();

$hv = new HTMLView();
$hv->echoPage($controllerOutput);


