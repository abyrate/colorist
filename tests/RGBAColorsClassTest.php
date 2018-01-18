<?php

use Abyrate\Colors\RGBA;
use PHPUnit\Framework\TestCase;

class RGBAColorsClassTest extends TestCase
{
	public function testRedColor() {
		$rgba = new RGBA(0, 102, 255, 1);
		$this->assertEquals($rgba->r, 0);
	}


	public function testGreenColor() {
		$rgba = new RGBA(0, 102, 255, 0.5);
		$this->assertEquals($rgba->g, 102);
	}


	public function testBlueColor() {
		$rgba = new RGBA(0, 102, 255, 0.5);
		$this->assertEquals($rgba->b, 255);
	}


	public function testAlphaChanel() {
		$rgba = new RGBA(0, 102, 255, 0.5);
		$this->assertEquals($rgba->a, 0.5);
	}


	public function testToStringConvert() {
		$rgba = new RGBA(0, 102, 255, 0.5);
		$this->assertEquals((string)$rgba, 'rgba(0,102,255,0.5)');
	}


	public function testStringMethod() {
		$rgba = new RGBA(0, 102, 255, 0.8);
		$this->assertEquals($rgba->string(), 'rgba(0,102,255,0.8)');
	}

}
