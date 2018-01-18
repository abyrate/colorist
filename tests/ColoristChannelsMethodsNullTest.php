<?php

use Abyrate\Colorist;
use PHPUnit\Framework\TestCase;

class ColoristChannelsMethodsNullTest extends TestCase
{
	public function testGetChannelReturnNull() {
		$amber = 'rgb(55,191,0)';
		$color = Colorist::create($amber);
		$this->assertNull($color->getChannel('Q'));
	}
}
