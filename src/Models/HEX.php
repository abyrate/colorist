<?php

namespace Abyrate\Models;

use Abyrate\Exceptions\HexException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Model;
use \stdClass;

class HEX extends Model implements ModelInterface
{
	/** @var string $hexRed */
	protected $hexRed = 0;

	/** @var string $hexGreen */
	protected $hexGreen = 0;

	/** @var string $hexBlue */
	protected $hexBlue = 0;

	/** @var array $channels */
	protected $channels = [ 'hex', 'hexa' ];

	/** @var array $types */
	protected $types = [ 'hex', 'hexa' ];

	/** @var int $alpha */
	protected $alpha = 255;


	/**
	 * @param string|array|null $values
	 *
	 * @return void
	 */
	public function __construct($value = NULL) {
		$this->set($value);
	}


	/**
	 * @param string|array $value
	 *
	 * @return self
	 */
	public static function create($value):self {
		return new self($value);
	}


	/**
	 * @param string|int $alpha
	 *
	 * @return void
	 */
	public function syncAlpha($alpha) {
		if (is_string($alpha)) {
			$alpha = $this->strToDec($alpha);
		}

		$this->limitation($alpha, 255);

		$this->alpha = $alpha;
	}


	/**
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function convertToRgb(bool $withAlpha = false, bool $toString = false) {
		$return = [
			'red'   => $this->hexRed,
			'green' => $this->hexGreen,
			'blue'  => $this->hexBlue,
		];

		if ($withAlpha) {
			$return[ 'alpha' ] = $this->alpha / 255;
		}

		if ($toString) {
			return implode(',', $return);
		}

		return (object) $return;
	}


	/**
	 * @param string|array $rgb
	 *
	 * @return void
	 */
	public function convertFromRgb($rgb) {
		$value = preg_replace('/[^\d\,\.]+/', '', $rgb);
		$hex = explode(',', $value);

		foreach ($hex as &$item) {
			if (mb_stripos($item, '.') === false) {
				$item = dechex(intval($item));
			} else {
				$item = dechex(intval($item * 255));
			}

			if (mb_strlen($item) == 1) {
				$item = '0' . $item;
			}
		}

		$this->set(implode('', $hex));
	}


	/**
	 * @param string               $channel
	 * @param string|integer|float $value
	 *
	 * @return void
	 */
	public function setChannel(string $channel, $value) {
		if (in_array($channel, $this->channels)) {
			$this->set($value);
		} else {
			throw HexException::channelIsNotExist($channel);
		}
	}


	/**
	 * @param string $channel
	 *
	 * @return float|integer|string
	 */
	public function getChannel(string $channel) {
		if ($channel == 'hex') {
			return $this->get(false, true);
		} elseif ($channel == 'hexa') {
			return $this->get(true, true);
		} else {
			throw HexException::channelIsNotExist($channel);
		}
	}


	/**
	 * @param string|array|null $value
	 *
	 * @return void
	 */
	public function set($value) {
		if (isset($value)) {
			$channels = $this->parseValue($value);

			$this->hexRed = $channels[ 'red' ];
			$this->hexGreen = $channels[ 'green' ];
			$this->hexBlue = $channels[ 'blue' ];

			if ($channels[ 'alpha' ] != $this->alpha) {
				$this->syncAlpha($channels[ 'alpha' ]);
			}
		}
	}


	/**
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function get(bool $withAlpha = false, bool $toString = false) {
		$return = [
			'hexRed'   => $this->decToHex($this->hexRed),
			'hexGreen' => $this->decToHex($this->hexGreen),
			'hexBlue'  => $this->decToHex($this->hexBlue),
		];

		if ($withAlpha) {
			$return[ 'alpha' ] = $this->decToHex($this->alpha);
		}

		if ($toString) {
			return '#' . implode('', $return);
		}

		return (object) $return;
	}


	/**
	 * @param string|array $value
	 *
	 * @return array
	 */
	protected function parseValue($value):array {

		if (is_string($value)) {
			if (mb_stripos($value, '#') === 0) {
				$hex = mb_substr($value, 1);
			} elseif (mb_stripos($value, '#') !== false) {
				throw HexException::invalidValue($value);
			} else {
				$hex = $value;
			}

			list($red, $green, $blue, $alpha) = $this->explodeHex($hex);

			$red = $this->strToDec($red);
			$green = $this->strToDec($green);
			$blue = $this->strToDec($blue);
			$alpha = $this->strToDec($alpha);

			$value = [
				'red'   => $this->limitation($red, 255),
				'green' => $this->limitation($green, 255),
				'blue'  => $this->limitation($blue, 255),
				'alpha' => $this->limitation($alpha, 255),
			];

		}

		if (is_array($value)) {
			return $value;
		} else {
			throw HexException::notArray();
		}

	}


	/**
	 * @param string $value
	 *
	 * @return int
	 * @throws HexException
	 */
	protected function strToDec(string $value) {
		if (mb_strlen($value) == 1) {
			$value = str_repeat($value, 2);
			return hexdec('0x' . $value);
		} elseif (mb_strlen($value) == 2) {
			return hexdec('0x' . $value);
		} else {
			throw HexException::invalidValue($value);
		}
	}


	protected function decToHex($value) {
		$result = dechex($value);

		if ($value < 16) {
			$result = '0' . $result;
		}

		return mb_strtoupper($result);
	}


	/**
	 * @param string $value
	 *
	 * @return array
	 * @throws HexException
	 */
	protected function explodeHex(string $value) {
		$start = 0;
		$length = 2;
		$result = [];

		if (mb_strlen($value) < 6) {
			$length = 1;
		}

		while ($result[] = mb_substr($value, $start, $length)) {
			$start += $length;
		}

		$result = array_diff($result, [ '' ]);

		if (count($result) == 3) {
			$result[] = $this->decToHex($this->alpha);
		} elseif (count($result) != 4) {
			throw HexException::invalidValue($value);
		}

		return $result;
	}
}