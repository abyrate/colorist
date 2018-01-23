<?php

namespace Abyrate\Traits;


use Abyrate\Exceptions\ColoristException;

/**
 * Trait RGBTrait
 * @package Abyrate\Traits
 *
 * @property string rgb
 * @property string rgba
 * @property int    r
 * @property int    g
 * @property int    b
 */
trait RGBTrait
{
	private $red;

	private $green;

	private $blue;


	private function explodeStringRGB(string $string) {
		$pattern = '/([\d\.]{1,4}\,?)/';
		preg_match_all($pattern, $string, $result);

		return $result[ 0 ];
	}


	protected function parseRGB(string $color) {
		$result = $this->explodeStringRGB($color);

		$this->red = intval($result[ 0 ]);
		$this->green = intval($result[ 1 ]);
		$this->blue = intval($result[ 2 ]);
	}


	protected function parseRGBA(string $color) {
		$result = $this->explodeStringRGB($color);

		$this->red = intval($result[ 0 ]);
		$this->green = intval($result[ 1 ]);
		$this->blue = intval($result[ 2 ]);
		$this->alpha = floatval($result[ 3 ]);
	}


	protected function getRgb() {
		return 'rgb(' . $this->red . ',' . $this->green . ',' . $this->blue . ')';
	}


	protected function getRgba() {
		return 'rgba(' . $this->red . ',' . $this->green . ',' . $this->blue . ',' . $this->alpha . ')';
	}


	protected function setRgb(array $value) {
		if (count($value) < 3) {
			throw new ColoristException('Not a good number of arguments');
		}

		$this->red = $value[ 0 ];
		$this->green = $value[ 1 ];
		$this->blue = $value[ 2 ];
	}


	protected function setRgba(array $value) {
		if (count($value) < 4) {
			throw new ColoristException('Not a good number of arguments');
		}

		$this->red = $value[ 0 ];
		$this->green = $value[ 1 ];
		$this->blue = $value[ 2 ];
		$this->alpha = $value[ 3 ];
	}


	protected function getR() {
		return $this->red;
	}


	protected function getG() {
		return $this->green;
	}


	protected function getB() {
		return $this->blue;
	}


	protected function setR($value) {
		$this->red = $value;
	}


	protected function setG($value) {
		$this->green = $value;
	}


	protected function setB($value) {
		$this->blue = $value;
	}

}