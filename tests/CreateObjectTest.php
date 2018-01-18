<?php

use PHPUnit\Framework\TestCase;
use Abyrate\Colorist;

class CreateObjectTest extends TestCase
{
	public function testCreateObjectFromConstructMethod() {
		$this->assertTrue((new Colorist('rgb(0,0,0)')) instanceof Colorist);
	}


	public function testCreateObjectFromStaticMethod() {
		$this->assertTrue(Colorist::create('rgb(0,0,0)') instanceof Colorist);
	}
}
