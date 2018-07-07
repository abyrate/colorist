<?php

use Abyrate\Colorist;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Model;
use Abyrate\Models\RGB;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
	public function testLimitationMax() {
		$model = new Model();

		$value = 300;
		$model->limitation($value, 255, 0);

		$this->assertEquals(255, $value);
	}


	public function testLimitationMin() {
		$model = new Model();

		$value = 10;
		$model->limitation($value, 255, 200);

		$this->assertEquals(200, $value);
	}
}
