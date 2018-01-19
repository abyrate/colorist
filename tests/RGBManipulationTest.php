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
		// with alpha
		$this->assertEquals($color->getRGB(true), new RGB(55, 191, 0, 1));
	}


	public function testSetRGB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$color->setRGB(35, 26, 36, 0.5);

		$this->assertEquals($color->getRGB(), new RGB(35, 26, 36, 0.5));
	}


	public function testGetChannelR() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChannel('r'), 55);
		$this->assertEquals($color->getChannel(Colorist::CHANNEL_R), 55);
	}


	public function testGetChannelG() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChannel('g'), 191);
		$this->assertEquals($color->getChannel(Colorist::CHANNEL_G), 191);
	}


	public function testGetChannelB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChannel('b'), 0);
		$this->assertEquals($color->getChannel(Colorist::CHANNEL_B), 0);
	}


	public function testGetChannelAlpha() {
		$amber = 'rgb(55,191,0,0.8)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->getChannel('alpha'), 0.8);
		$this->assertEquals($color->getChannel(Colorist::CHANNEL_ALPHA), 0.8);
	}


	public function testSetChannelR() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChannel('r', 35)->getRGB()->r, 35);
		$this->assertEquals($color->setChannel(Colorist::CHANNEL_R, 50)->getRGB()->r, 50);
	}


	public function testSetChannelG() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChannel('g', 26)->getRGB()->g, 26);
		$this->assertEquals($color->setChannel(Colorist::CHANNEL_G, 100)->getRGB()->g, 100);
	}


	public function testSetChannelB() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChannel('b', 36)->getRGB()->b, 36);
		$this->assertEquals($color->setChannel(Colorist::CHANNEL_B, 200)->getRGB()->b, 200);
	}


	public function testSetChannelAlpha() {
		$amber = 'rgb(55,191,0)';

		$color = Colorist::create($amber);

		$this->assertEquals($color->setChannel('alpha', 0.3)->getRGB()->alpha, 0.3);
		$this->assertEquals($color->setChannel(Colorist::CHANNEL_ALPHA, 0.6)->getRGB()->alpha, 0.6);
	}
}
