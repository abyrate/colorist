<?php

namespace Abyrate\Traits;

use Abyrate\Exceptions\ColoristException;

/**
 * Class HEXTrait
 * @package Abyrate\Traits
 *
 * @property string hex
 * @property string hexa
 */
trait HEXTrait
{
	private $hex;

	private $hexa;


	private function explodeStringHEX(string $string) {
		$string = str_replace('#', '', $string);
		return sscanf($string, '%2s%2s%2s%2s');
	}


	protected function parseHEX(string $color) {
		$result = $this->explodeStringHEX($color);

		$this->hex = $color;
		$this->red = intval(hexdec($result[ 0 ]));
		$this->green = intval(hexdec($result[ 1 ]));
		$this->blue = intval(hexdec($result[ 2 ]));
	}


	protected function parseHEXA(string $color) {
		$result = $this->explodeStringHEX($color);

		$this->hexa = $color;
		$this->red = intval(hexdec($result[ 0 ]));
		$this->green = intval(hexdec($result[ 1 ]));
		$this->blue = intval(hexdec($result[ 2 ]));
		$this->blue = floatval(hexdec($result[ 3 ])/255);
	}


	protected function getHex() {
		return $this->hex;
	}


	protected function getHexa() {
		return $this->hexa;
	}


	protected function setHex(string $value) {
		if (mb_strlen($value) < 7) {
			throw new ColoristException('Not a good number of arguments');
		}

		$this->parseHEX($value);
	}


	protected function setHexa(string $value) {
		if (mb_strlen($value) < 9) {
			throw new ColoristException('Not a good number of arguments');
		}

		$this->parseHEXA($value);
	}
}