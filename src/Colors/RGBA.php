<?php

namespace Abyrate\Colors;


class RGBA extends RGB
{
	/** @var integer */
	public $a;


	public function __construct(int $r, int $g, int $b, float $a) {
		parent::__construct($r, $g, $b);
		$this->a = $a;
	}


	/**
	 * @return string
	 */
	public function __toString():string {
		return 'rgba(' . $this->r . ',' . $this->g . ',' . $this->b . ',' . $this->a . ')';
	}


	/**
	 * @return string
	 */
	public function string():string {
		return (string)$this;
	}
}