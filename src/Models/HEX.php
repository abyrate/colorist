<?php

namespace Abyrate\Models;

use Abyrate\Exceptions\HexException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Model;
use Abyrate\Traits\HexTrait;
use \stdClass;

class HEX extends Model implements ModelInterface
{
	use HexTrait;

	/** @var string $hex */
	protected $hex = '#000000';

	/** @var string $hexa */
	protected $hexa = '#000000ff';

	/** @var array $channels */
	protected $channels = [ 'hex', 'hexa' ];

	/** @var array $types */
	protected $types = [ 'hex', 'hexa' ];


	/**
	 * @param string|array|null $values
	 *
	 * @return void
	 */
	public function __construct($value = NULL) {
		if (isset($value)) {
			$this->set($value);
		}
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
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function convertToRgb(bool $withAlpha = false, bool $toString = false) {
		$hex = str_replace('#', '', $this->hexa);

		list($red, $green, $blue) = $this->explodeHex($hex);

		$red = intval(hexdec($red));
		$green = intval(hexdec($green));
		$blue = intval(hexdec($blue));

		$result = compact('red', 'green', 'blue');

		if ($withAlpha) {
			$result[ 'alpha' ] = $this->alpha;
		}

		if ($toString) {
			return implode(',', $result);
		}

		return (object) $result;
	}


	/**
	 * @param string|array $rgb
	 *
	 * @return void
	 */
	public function convertFromRgb($rgb) {
		$hex = $this->RgbToHex($rgb);
		$this->set($hex);
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
	 * @param string|array $value
	 *
	 * @return void
	 */
	public function set($value) {
		$channels = $this->parseHex($value);
		$this->hex = '#' .
			$this->decToHex($channels[ 'red' ]) .
			$this->decToHex($channels[ 'green' ]) .
			$this->decToHex($channels[ 'blue' ]);

		$this->hexa = $this->hex . $this->decToHex($channels[ 'alpha' ]);

		$this->syncAlpha($channels[ 'alpha' ] / 255);
	}


	/**
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function get(bool $withAlpha = false, bool $toString = false) {
		if ($withAlpha) {
			$return = [ 'hexa' => $this->hexa ];
		} else {
			$return = [ 'hex' => $this->hex ];
		}


		if ($toString) {
			return array_shift($return);
		}

		return (object) $return;
	}
}