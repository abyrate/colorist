<?php

namespace Abyrate;


abstract class Model
{
	/** @var array $channels */
	protected $channels = [ ];

	/** @var array $types */
	protected $types = [ ];

	/** @var float $alpha */
	protected $alpha = 1;


	/**
	 * @param string|null $values
	 *
	 * @return void
	 */
	public function __construct(string $value = NULL) {
		if (!is_null($value)) {
			$this->set($value);
		}
	}


	/**
	 * @param string $value
	 *
	 * @return self
	 */
	public static function create(string $value) {
		return new static($value);
	}


	/**
	 * @return array
	 */
	public function getChannelsList():array {
		return $this->channels;
	}


	/**
	 * @return array
	 */
	public function getTypesList():array {
		return $this->types;
	}


	/**
	 * @param string|float $alpha
	 *
	 * @return void
	 */
	public function syncAlpha($alpha) {
		$alpha = str_replace(',', '.', $alpha);
		$alpha = floatval($alpha);

		$this->limitation($alpha, 1);

		$this->alpha = $alpha;
	}


	/**
	 * @param string $type
	 *
	 * @return boolean
	 */
	public function isType(string $type):bool {
		return in_array($type, $this->types);
	}


	/**
	 * @param string $channel
	 *
	 * @return boolean
	 */
	public function isChannel(string $channel):bool {
		return in_array($channel, $this->channels);
	}


	/**
	 * Set all model channels
	 *
	 * @param string|array $value
	 *
	 * @return void
	 */
	abstract public function set($value);


	/**
	 * Limitation of a variable in the range
	 *
	 * @param int|float $value
	 * @param int       $max
	 * @param int       $min
	 *
	 * @return int|float
	 */
	protected function limitation(&$value, int $max, int $min = 0) {
		if ($value > $max) {
			$value = $max;
		} elseif ($value < $min) {
			$value = $min;
		}

		return $value;
	}
}