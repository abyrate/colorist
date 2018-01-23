<?php

namespace Abyrate;

use Abyrate\Exceptions\ColoristException;
use Abyrate\Traits\RGBTrait;

/**
 * Class Colorist
 * @package Abyrate
 *
 * @property float alpha
 */
class Colorist
{
	use RGBTrait;

	protected $alpha = 1;


	protected function getModelName(string $string):string {
		$pattern = '/([\w]*)\(/';
		preg_match_all($pattern, $string, $result, PREG_SET_ORDER);
		$result = $result[ 0 ];
		array_shift($result);

		return $result[ 0 ];
	}


	public function __construct(string $color) {
		$model_name = $this->getModelName($color);

		$method_name = 'parse' . mb_strtoupper($model_name);

		if (method_exists($this, $method_name)) {
			$this->{$method_name}($color);
		} else {
			throw new ColoristException('Unknown color model: ' . $model_name);
		}

		return $this;
	}


	public static function create(string $color) {
		return new self($color);
	}


	public function __get($name) {
		$method_name = 'get' . ucfirst($name);

		if (method_exists($this, $method_name)) {
			return $this->{$method_name}();
		}

		return NULL;
	}


	public function __set($name, $value) {
		$method_name = 'set' . ucfirst($name);

		if (method_exists($this, $method_name)) {
			$this->{$method_name}($value);
		}
	}


	protected function getAlpha() {
		return $this->alpha;
	}


	protected function setAlpha($value) {
		$this->alpha = $value;
	}
}