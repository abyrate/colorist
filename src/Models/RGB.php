<?php

namespace Abyrate\Models;

use Abyrate\Exceptions\RgbException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Model;
use stdClass;

class RGB extends Model implements ModelInterface
{
	/** @var int $red */
	protected $red = 0;

	/** @var int $green */
	protected $green = 0;

	/** @var int $blue */
	protected $blue = 0;

	/** @var array $channels */
	protected $channels = [ 'red', 'green', 'blue' ];

	/** @var array $types */
	protected $types = [ 'rgb', 'rgba' ];


	/**
	 * Convert instance values to RGB
	 *
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function convertToRgb(bool $withAlpha = false, bool $toString = false) {
		return $this->get($withAlpha, $toString);
	}


	/**
	 * Convert instance values from RGB
	 *
	 * @param string|array $rgb
	 *
	 * @return void
	 */
	public function convertFromRgb($rgb) {
		$this->set($rgb);
	}


	/**
	 * Set single channel
	 *
	 * @param string               $channel
	 * @param string|integer|float $value
	 *
	 * @return void
	 */
	public function setChannel(string $channel, $value) {
		if (in_array($channel, $this->channels)) {
			$value = intval($value);

			$this->limitation($value, 255, 0);

			$this->$channel = $value;
		} elseif ($channel == 'alpha') {
			$this->syncAlpha($value);
		} else {
			throw RgbException::channelIsNotExist($channel);
		}
	}


	/**
	 * Get single channel
	 *
	 * @param string $channel
	 *
	 * @return float|integer|string
	 */
	public function getChannel(string $channel) {
		if (in_array($channel, $this->channels) || $channel == 'alpha') {
			return $this->$channel;
		} else {
			throw RgbException::channelIsNotExist($channel);
		}
	}


	/**
	 * Set all model channels
	 *
	 * @param string|array $value
	 *
	 * @return void
	 */
	public function set($value) {
		$channels = $this->parseValue($value);

		$this->red = $channels[ 0 ];
		$this->green = $channels[ 1 ];
		$this->blue = $channels[ 2 ];

		if (count($channels) == 4) {
			$this->syncAlpha($channels[ 3 ]);
		}
	}


	/**
	 * Get all model channels
	 *
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function get(bool $withAlpha = false, bool $toString = false) {
		$return = [
			'red'   => $this->red,
			'green' => $this->green,
			'blue'  => $this->blue,
		];

		if ($withAlpha) {
			$return[ 'alpha' ] = $this->alpha;
		}

		if ($toString) {
			return implode(',', $return);
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
			$value = explode(',', $value);
		}

		if (is_array($value)) {
			foreach ($value as &$item) {
				$item = mb_stripos($item, '.') === false ? intval($item) : floatval($item);
			}

			return $value;
		} else {
			throw RgbException::notArray();
		}

	}
}