<?php

use Abyrate\Colorist;
use Abyrate\Colors\RGB;
use PHPUnit\Framework\TestCase;

class RGBManipulationTest extends TestCase
{
	public function testGetRGB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getRGB(), new RGB(55, 191, 0));
	}


	public function testSetRGB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$color->setRGB(35, 26, 36);

		$this->assertEquals($color->getRGB(), new RGB(35, 26, 36));
	}


	public function testGetChanelR() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChanel('r'), 55);
		$this->assertEquals($color->getChanel(Colorist::CHANEL_R), 55);
	}


	public function testGetChanelG() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChanel('g'), 191);
		$this->assertEquals($color->getChanel(Colorist::CHANEL_G), 191);
	}


	public function testGetChaneB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChanel('b'), 0);
		$this->assertEquals($color->getChanel(Colorist::CHANEL_B), 0);
	}


	public function testSetChanelR() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChanel('r', 35), 35);
		$this->assertEquals($color->setChanel(Colorist::CHANEL_R, 50), 50);
	}


	public function testSetChanelG() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChanel('g', 26), 26);
		$this->assertEquals($color->setChanel(Colorist::CHANEL_G, 100), 100);
	}


	public function testSetChaneB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChanel('b', 36), 36);
		$this->assertEquals($color->setChanel(Colorist::CHANEL_B, 200), 200);
	}
}
