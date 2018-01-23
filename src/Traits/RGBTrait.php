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
	/** @var int $red red channel */
	private $red;

	/** @var int $green green channel */
	private $green;

	/** @var int $blue blue channel */
	private $blue;


	/**
	 * @param string $string
	 *
	 * @return string
	 */
	private function explodeStringRGB(string $string):array {
		$pattern = '/([\d\.]{1,4}\,?)/';
		preg_match_all($pattern, $string, $result);

		return $result[ 0 ];
	}


	/**
	 * @param string $color
	 */
	protected function parseRGB(string $color) {
		$result = $this->explodeStringRGB($color);

		$this->red = intval($result[ 0 ]);
		$this->green = intval($result[ 1 ]);
		$this->blue = intval($result[ 2 ]);
	}


	/**
	 * @param string $color
	 */
	protected function parseRGBA(string $color) {
		$result = $this->explodeStringRGB($color);

		$this->red = intval($result[ 0 ]);
		$this->green = intval($result[ 1 ]);
		$this->blue = intval($result[ 2 ]);
		$this->alpha = floatval($result[ 3 ]);
	}


	/**
	 * @return string
	 */
	protected function getRgb():string {
		return 'rgb(' . $this->red . ',' . $this->green . ',' . $this->blue . ')';
	}


	/**
	 * @return string
	 */
	protected function getRgba():string {
		return 'rgba(' . $this->red . ',' . $this->green . ',' . $this->blue . ',' . $this->alpha . ')';
	}


	/**
	 * @param array $value
	 *
	 * @throws ColoristException
	 */
	protected function setRgb(array $value) {
		if (count($value) < 3) {
			throw new ColoristException('Not a good number of arguments');
		}

		$this->red = $value[ 0 ];
		$this->green = $value[ 1 ];
		$this->blue = $value[ 2 ];
	}


	/**
	 * @param array $value
	 *
	 * @throws ColoristException
	 */
	protected function setRgba(array $value) {
		if (count($value) < 4) {
			throw new ColoristException('Not a good number of arguments');
		}

		$this->red = $value[ 0 ];
		$this->green = $value[ 1 ];
		$this->blue = $value[ 2 ];
		$this->alpha = $value[ 3 ];
	}


	/**
	 * @return int
	 */
	protected function getR() {
		return $this->red;
	}


	/**
	 * @return int
	 */
	protected function getG() {
		return $this->green;
	}


	/**
	 * @return int
	 */
	protected function getB() {
		return $this->blue;
	}


	/**
	 * @param int $value
	 */
	protected function setR(int $value) {
		$this->red = $value;
	}


	/**
	 * @param int $value
	 */
	protected function setG(int $value) {
		$this->green = $value;
	}


	/**
	 * @param int $value
	 */
	protected function setB(int $value) {
		$this->blue = $value;
	}

}