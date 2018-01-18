<?php

namespace Abyrate;


/**
 * Class Colorist
 * @package Abyrate
 */
class Colorist
{
	/**
	 * Colorist constructor.
	 *
	 * @param string $color
	 *
	 * @return Colorist
	 */
	public function __construct(string $color) {
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
}