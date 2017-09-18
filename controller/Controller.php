<?php

class Controller {


	public function __construct(Horizon $h, View $v) {
		$this->h = $h;
		$this->v = $v;
	}

	public function doRandomize() {

		$this->h->fill();
		$this->v->show();
	}
}
