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

		$value = 3;
		$model->syncAlpha($value);

		$this->assertAttributeEquals(1, 'alpha', $model);
	}


	public function testLimitationMin() {
		$model = new Model();

		$value = -5;
		$model->syncAlpha($value);

		$this->assertAttributeEquals(0, 'alpha', $model);
	}
}
