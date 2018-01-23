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


	private function explodeStringHEX(string $string) {
		$string = str_replace('#', '', $string);
		return sscanf($string, '%2s%2s%2s%2s');
	}


	protected function parseHEX(string $color) {
		$this->hex = $color;
	}


	protected function parseHEXA(string $color) {
		$this->hex = mb_substr($color, 0, 7);
		$this->alpha = hexdec(mb_substr($color, 7, 2)) / 255;
	}


	protected function getHex() {
		return $this->hex;
	}


	protected function getHexa() {
		$alpha = intval($this->alpha * 255);
		$alpha = ($alpha < 16 ? '0' : '') . dechex($alpha);
		return $this->hex . $alpha;
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


	protected function getRgbFromHex() {
		$exploded = array_diff($this->explodeStringHEX($this->hex), [ NULL ]);

		return [
			hexdec($exploded[ 0 ]),
			hexdec($exploded[ 1 ]),
			hexdec($exploded[ 2 ]),
		];
	}


	protected function convertRgbToHex($red, $green, $blue) {
		$red = ($red < 16 ? '0' : '') . dechex($red);
		$green = ($green < 16 ? '0' : '') . dechex($green);
		$blue = ($blue < 16 ? '0' : '') . dechex($blue);

		$this->hex = '#' . $red . $green . $blue;
	}
}