<?php

namespace Abyrate\Colors;

/**
 * Class RGB
 * @package Abyrate\Colors
 */
class RGB
{
	/** @var integer */
	public $r;

	/** @var integer */
	public $g;

	/** @var integer */
	public $b;


	/**
	 * RGB constructor.
	 *
	 * @param int $r
	 * @param int $g
	 * @param int $b
	 */
	public function __construct(int $r, int $g, int $b) {
		$this->r = $r;
		$this->g = $g;
		$this->b = $b;
	}


	/**
	 * @return string
	 */
	public function __toString():string {
		return 'rgb(' . $this->r . ',' . $this->g . ',' . $this->b . ')';
	}


	/**
	 * @return string
	 */
	public function string():string {
		return (string)$this;
	}
}