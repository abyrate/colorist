<?php

namespace Abyrate;

use Abyrate\Colors\RGB;


/**
 * Class Colorist
 * @package Abyrate
 */
class Colorist
{
	const CHANNEL_R = 'r';
	const CHANNEL_G = 'g';
	const CHANNEL_B = 'b';
	const CHANNEL_ALPHA = 'alpha';

	protected $channels = [
		'rgb' => [ self::CHANNEL_R, self::CHANNEL_G, self::CHANNEL_B ]
	];

	/** @var RGB */
	protected $rgb;

	/** @var float */
	protected $alpha = 1;


	/**
	 * @param string $color
	 */
	protected function parseRGB(string $color) {
		$pattern = '/([\d\.]{1,4}\,?)/';
		preg_match_all($pattern, $color, $result);
		$result = $result[ 0 ];

		$this->rgb = new RGB(
			intval($result[ 0 ]),
			intval($result[ 1 ]),
			intval($result[ 2 ]),
			count($result) == 4 ? floatval($result[ 3 ]) : $this->alpha
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
			// TODO hex parser
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
	 * @return int|null
	 */
	public function getChannel(string $channel) {
		if (in_array($channel, $this->channels[ 'rgb' ])) {
			return $this->rgb->{$channel};
		} elseif ($channel == self::CHANNEL_ALPHA) {
			return $this->rgb->alpha;
		}

		return NULL;
	}


	/**
	 * @param string $channel
	 * @param int    $value
	 *
	 * @return $this
	 */
	public function setChannel(string $channel, float $value) {
		if (in_array($channel, $this->channels[ 'rgb' ])) {
			$this->rgb->{$channel} = $value;
		} elseif ($channel == self::CHANNEL_ALPHA) {
			$this->rgb->alpha = $value;
		}

		return $this;
	}


	/**
	 * @return RGB
	 */
	public function getRGB() {
		return $this->rgb;
	}


	/**
	 * @param int   $r
	 * @param int   $g
	 * @param int   $b
	 * @param float $alpha
	 *
	 * @return Colorist
	 */
	public function setRGB(int $r, int $g, int $b, float $alpha = 1):self {
		$this->rgb->r = $r;
		$this->rgb->g = $g;
		$this->rgb->b = $b;
		$this->rgb->alpha = $alpha;

		return $this;
	}
}