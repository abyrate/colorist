<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;
use Abyrate\Exceptions\ColoristException;

class HEXManipulationTest extends TestCase
{
	public function testGetHEX() {
		$color = Colorist::create('#37bf00');

		$this->assertEquals($color->hex, '#37bf00');
	}


	public function testGetHEXA() {
		$color = Colorist::create('#37bf0015');
		$this->assertEquals($color->hexa, '#37bf0015');
	}


	public function testSetHEX() {
		$color = Colorist::create('#37bf00');
		$color->hex = '#37abab';
		$this->assertEquals($color->hex, '#37abab');
	}


	public function testSetHEXA() {
		$color = Colorist::create('#37bf00');
		$color->hexa = '#37bfab45';
		$this->assertEquals($color->hexa, '#37bfab45');
	}


	public function testExceptionNotGoodNumberOfArgumentsHEX() {
		$color = Colorist::create('#37bf00');

		try {
			$color->hex = '#37ab';
		} finally {
			$this->expectException(ColoristException::class);
		}
	}


	public function testExceptionNotGoodNumberOfArgumentsHEXA() {
		$color = Colorist::create('#37bf00');

		try {
			$color->hexa = '#37bfab';
		} finally {
			$this->expectException(ColoristException::class);
		}
	}
}
