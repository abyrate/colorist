<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;

class RGBManipulationTest extends TestCase
{
	public function testGetRGB() {
		$color = Colorist::create('rgb(55,191,0)');

		$this->assertEquals($color->rgb, 'rgb(55,191,0)');
		// with alpha
		$this->assertEquals($color->rgba, 'rgba(55,191,0,1)');
	}


	public function testSetRGB() {
		$color = Colorist::create('rgb(55,191,0)');

		$color->rgba = [ 35, 26, 36, 0.5 ];

		$this->assertEquals($color->rgb, 'rgb(35,26,36)');
		// With alpha
		$this->assertEquals($color->rgba, 'rgba(35,26,36,0.5)');
	}


	public function testGetChannelR() {
		$color = Colorist::create('rgb(55,191,0)');
		$this->assertEquals($color->r, 55);
	}


	public function testGetChannelG() {
		$color = Colorist::create('rgb(55,191,0)');
		$this->assertEquals($color->g, 191);
	}


	public function testGetChannelB() {
		$color = Colorist::create('rgb(55,191,0)');
		$this->assertEquals($color->b, 0);
	}


	public function testSetChannelR() {
		$color = Colorist::create('rgb(55,191,0)');
		$color->r = 35;
		$this->assertEquals($color->r, 35);
	}


	public function testSetChannelG() {
		$color = Colorist::create('rgb(55,191,0)');
		$color->g = 25;
		$this->assertEquals($color->g, 25);
	}


	public function testSetChannelB() {
		$color = Colorist::create('rgb(55,191,0)');
		$color->b = 36;
		$this->assertEquals($color->b, 36);
	}
}
