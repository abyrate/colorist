<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;
use Abyrate\Exceptions\ColoristException;

class NameManipulationTest extends TestCase
{
	public function testGetName() {
		$color = Colorist::create('DarkOrange');
		$this->assertEquals($color->name, 'DarkOrange');
	}


	public function testSetName() {
		$color = Colorist::create('DarkOrange');
		$color->name = 'OrangeRed';
		$this->assertEquals($color->name, 'OrangeRed');
	}


	public function testBlackReturned() {
		$color = Colorist::create('DarkOrangeRed');
		$this->assertNull($color->name);
		$this->assertEquals($color->rgb, 'rgb(0,0,0)');
	}


	public function testCloseValueName() {
		// rgb(255,140,0) is DarkOrange
		$color = Colorist::create('rgb(255,139,0)');
		$this->assertEquals($color->name, 'DarkOrange');
	}
}
