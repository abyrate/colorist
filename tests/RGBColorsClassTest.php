<?php

use PHPUnit\Framework\TestCase;
use Abyrate\Colors\RGB;

class RGBColorsClassTest extends TestCase
{
	public function testRedColor() {
		$rgb = new RGB(0, 102, 255);
		$this->assertEquals($rgb->r, 0);
	}


	public function testGreenColor() {
		$rgb = new RGB(0, 102, 255);
		$this->assertEquals($rgb->g, 102);
	}


	public function testBlueColor() {
		$rgb = new RGB(0, 102, 255);
		$this->assertEquals($rgb->b, 255);
	}


	public function testToStringConvert() {
		$rgb = new RGB(0, 102, 255);
		$this->assertEquals((string)$rgb, 'rgb(0,102,255)');
	}


	public function testStringMethod() {
		$rgb = new RGB(0, 102, 255);
		$this->assertEquals($rgb->string(), 'rgb(0,102,255)');
	}

}
