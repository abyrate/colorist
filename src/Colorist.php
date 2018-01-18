<?php

namespace Abyrate;

use Abyrate\Colors\RGB;


/**
 * Class Colorist
 * @package Abyrate
 */
class Colorist
{
	const CHANEL_R = 'r';
	const CHANEL_G = 'g';
	const CHANEL_B = 'b';

	protected $chanels = [
		'rgb' => [ self::CHANEL_R, self::CHANEL_G, self::CHANEL_B ]
	];

	/** @var RGB */
	protected $rgb;


	/**
	 * @param string $color
	 */
	protected function parseRGB(string $color) {
		$pattern = '/([\d]{1,3}\,?)/';
		preg_match_all($pattern, $color, $result);
		$result = $result[ 0 ];

		$this->rgb = new RGB(
			intval($result[ 0 ]),
			intval($result[ 1 ]),
			intval($result[ 2 ])
		);
	}


	/**
	 * Colorist constructor.
	 *
	 * @param string $color
	 *
	 * @return Colorist
	 */
	public function __construct(string $color) {

		if (is_int(mb_stripos($color, '#'))) {
			// hexparser
		} elseif (is_int(mb_stripos($color, 'rgba'))) {
			// rgba parser
		} elseif (is_int(mb_stripos($color, 'rgb'))) {
			$this->parseRGB($color);
		}

		return $this;
	}


	/**
	 * @param string $color
	 *
	 * @return Colorist
	 */
	public static function create(string $color) {
		return new self($color);
	}


	/**
	 * @param string $chanel
	 *
	 * @return int
	 */
	public function getChanel(string $chanel):int {
		if (in_array($chanel, $this->chanels[ 'rgb' ])) {
			return $this->rgb->{$chanel};
		}

		return NULL;
	}


	/**
	 * @param string $chanel
	 * @param int    $value
	 *
	 * @return int
	 */
	public function setChanel(string $chanel, int $value):int {
		if (in_array($chanel, $this->chanels[ 'rgb' ])) {
			return $this->rgb->{$chanel} = $value;
		}

		return NULL;
	}


	/**
	 * @return RGB
	 */
	public function getRGB() {
		return $this->rgb;
	}


	/**
	 * @param int $r
	 * @param int $g
	 * @param int $b
	 *
	 * @return Colorist
	 */
	public function setRGB(int $r, int $g, int $b):self {
		$this->rgb->r = $r;
		$this->rgb->g = $g;
		$this->rgb->b = $b;

		return $this;
	}
}