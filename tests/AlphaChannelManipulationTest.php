<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;

class AlphaChannelManipulationTest extends TestCase
{
	public function testDefaultValueAlpha() {
		$color = Colorist::create('rgb(55,191,0)');
		$this->assertEquals($color->alpha, 1);
	}


	public function testGetChannelAlpha() {
		$color = Colorist::create('rgba(55,191,0,0.8)');
		$this->assertEquals($color->alpha, 0.8);
	}


	public function testSetChannelAlpha() {
		$color = Colorist::create('rgb(55,191,0)');
		$color->alpha = 0.3;
		$this->assertEquals($color->alpha, 0.3);
	}
}
