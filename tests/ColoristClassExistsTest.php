<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;

class ColoristClassExistsTest extends TestCase
{
	public function testClassExists() {
		$this->assertTrue(class_exists(Colorist::class));
	}
}
