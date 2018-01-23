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

	protected $alpha = 1;


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
			$this->updateModels($name);
		}
	}


	protected function getAlpha() {
		return $this->alpha;
	}


	protected function setAlpha($value) {
		$this->alpha = $value;
	}
}