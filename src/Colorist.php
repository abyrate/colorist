<?php

namespace Abyrate;

use Abyrate\Exceptions\ColoristException;
use Abyrate\Traits\HEXTrait;
use Abyrate\Traits\RGBTrait;

/**
 * Class Colorist
 * @package Abyrate
 *
 * @property float alpha
 */
class Colorist
{
	use RGBTrait, HEXTrait;

	/** @var float */
	protected $alpha = 1;


	/**
	 * Conversion models when updating properties
	 *
	 * @param $from
	 */
	protected function updateModels($from) {
		$methods = get_class_methods(self::class);

		if (in_array($from, [ 'rgb', 'rgba', 'r', 'g', 'b' ])) {

			foreach ($methods as $method) {
				if (is_int(mb_strpos($method, 'convertRgbTo'))) {
					$this->{$method}($this->red, $this->green, $this->blue);
				}
			}


		} elseif (!in_array($from, [ 'alpha' ])) {

			if (mb_substr($from, -1) == 'a') {
				$from = mb_substr($from, 0, mb_strlen($from) - 1);
			}

			$method_name = 'getRgbFrom' . ucfirst($from);
			$rgb = $this->{$method_name}();

			$this->red = $rgb[ 0 ];
			$this->green = $rgb[ 1 ];
			$this->blue = $rgb[ 2 ];

		}
	}


	/**
	 * @param string $string
	 *
	 * @return string
	 */
	protected function getModelName(string $string):string {
		$is_hex = mb_substr($string, 0, 1) == '#';

		if ($is_hex && mb_strlen($string) == 7) {
			return 'hex';
		} elseif ($is_hex && mb_strlen($string) == 9) {
			return 'hexa';
		} else {
			$pattern = '/([\w]*)\(/';
			preg_match_all($pattern, $string, $result, PREG_SET_ORDER);
			$result = $result[ 0 ];
			array_shift($result);

			return $result[ 0 ];
		}
	}


	/**
	 * Colorist constructor.
	 *
	 * @param string $color
	 *
	 * @throws ColoristException
	 */
	public function __construct(string $color) {
		$model_name = $this->getModelName($color);

		$method_name = 'parse' . mb_strtoupper($model_name);

		if (method_exists($this, $method_name)) {
			$this->{$method_name}($color);

			$this->updateModels($model_name);
		} else {
			throw new ColoristException('Unknown color model: ' . $model_name);
		}

		return $this;
	}


	/**
	 * Alias __construct method
	 *
	 * @param string $color
	 *
	 * @return Colorist
	 */
	public static function create(string $color):self {
		return new self($color);
	}


	/**
	 * @param string $name
	 *
	 * @return string|null
	 */
	public function __get(string $name) {
		$method_name = 'get' . ucfirst($name);

		if (method_exists($this, $method_name)) {
			return $this->{$method_name}();
		}

		return NULL;
	}


	/**
	 * @param string    $name
	 * @param int|float $value
	 */
	public function __set(string $name, $value) {
		$method_name = 'set' . ucfirst($name);

		if (method_exists($this, $method_name)) {
			$this->{$method_name}($value);
			$this->updateModels($name);
		}
	}


	/**
	 * @return float
	 */
	protected function getAlpha() {
		return $this->alpha;
	}


	/**
	 * @param float $value
	 */
	protected function setAlpha(float $value) {
		$this->alpha = $value;
	}
}