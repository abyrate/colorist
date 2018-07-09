<?php

namespace Abyrate\Traits;


use Abyrate\Exceptions\HexException;

trait HexTrait
{
	/**
	 * Converting rgb to hex code
	 *
	 * @param string $rgb
	 * @param bool   $withAlpha
	 *
	 * @return string
	 */
	protected function RgbToHex(string $rgb, bool $withAlpha = true):string {
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

		if (count($hex) == 4 && !$withAlpha) {
			unset($hex[ 3 ]);
		}

		return implode('', $hex);
	}


	/**
	 * Converting hex code to decimal number
	 *
	 * @param string $value hex code in string format
	 *
	 * @return int
	 * @throws HexException
	 */
	protected function strToDec(string $value):int {
		if (mb_strlen($value) == 1) {
			$value = str_repeat($value, 2);
			return hexdec('0x' . $value);
		} elseif (mb_strlen($value) == 2) {
			return hexdec('0x' . $value);
		} else {
			throw HexException::invalidValue($value);
		}
	}


	/**
	 * Converting decimal number to hex code string
	 *
	 * @param integer $value
	 *
	 * @return string
	 */
	protected function decToHex(int $value):string {
		$result = dechex($value);

		if ($value < 16) {
			$result = '0' . $result;
		}

		return mb_strtolower($result);
	}


	/**
	 * @param string $value
	 *
	 * @return array
	 * @throws HexException
	 */
	protected function parseHex(string $value):array {

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