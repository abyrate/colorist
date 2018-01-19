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

	/** @var float */
	public $alpha = 1;


	/**
	 * RGB constructor.
	 *
	 * @param int $r
	 * @param int $g
	 * @param int $b
	 */
	public function __construct(int $r, int $g, int $b, float $alpha = 1) {
		$this->r = $r;
		$this->g = $g;
		$this->b = $b;
		$this->alpha = $alpha;
	}


	/**
	 * @return string
	 */
	public function __toString():string {
		return (string) $this->string();
	}


	/**
	 * @return string
	 */
	public function string($withAlpha = false):string {
		$channels = [
			$this->r,
			$this->g,
			$this->b
		];

		if ($withAlpha) {
			$channels[] = $this->alpha;
		}

		return ($withAlpha ? 'rgba' : 'rgb') . '(' . implode(',', $channels) . ')';
	}
}