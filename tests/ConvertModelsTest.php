<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;

class ConvertModelsTest extends TestCase
{
	public function testRGBToHEX() {
		$color = Colorist::create('rgb(15,25,70)');
		$hex = '#0' . dechex(15) . dechex(25) . dechex(70);
		$this->assertEquals($color->hex, $hex);
	}


	public function testHEXToRGB() {
		$hex = '#0' . dechex(15) . dechex(25) . dechex(70);
		$color = Colorist::create($hex);
		$this->assertEquals($color->rgb, 'rgb(15,25,70)');
	}


	public function testRGBAToHEXA() {
		$color = Colorist::create('rgba(15,25,70,0.5)');
		$hexa = '#0' . dechex(15) . dechex(25) . dechex(70) . dechex(intval(0.5 * 255));
		$this->assertEquals($color->hexa, $hexa);
	}


	public function testHEXAToRGBA() {
		$hexa = '#0' . dechex(15) . dechex(25) . dechex(70) . dechex(intval(0.2 * 255));
		$color = Colorist::create($hexa);
		$this->assertEquals($color->rgba, 'rgba(15,25,70,0.2)');
	}


	public function testRGBToName() {
		$color = Colorist::create('rgb(255,140,0)');
		$this->assertEquals($color->name, 'DarkOrange');
	}


	public function testNameToRGB() {
		$color = Colorist::create('DarkOrange');
		$this->assertEquals($color->rgb, 'rgb(255,140,0)');
	}
}
