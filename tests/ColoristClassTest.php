<?php

use Abyrate\Colorist;
use Abyrate\Exceptions\ColoristException;
use PHPUnit\Framework\TestCase;

class ColoristClassTest extends TestCase
{
	public function testClassExists() {
		$this->assertTrue(class_exists(Colorist::class));
	}


	public function testCreateWithRgbValue() {
		$colorist = Colorist::create('rgb(1,1,1,1)');

		$this->assertInstanceOf(Colorist::class, $colorist);
	}


	public function testConstruct() {
		$colorist = new Colorist();

		$this->assertInstanceOf(Colorist::class, $colorist);
	}


	public function testGetChannelsList() {
		$colorist = new Colorist();

		$this->assertAttributeEquals($colorist->getChannelsList(), 'channels', $colorist);
	}


	public function testGetTypesList() {
		$colorist = new Colorist();

		$this->assertAttributeEquals($colorist->getTypesList(), 'types', $colorist);
	}


	public function testSetAndGetChannel() {
		$colorist = new Colorist();

		$colorist->setChannel('red', 15);

		$red = $colorist->getChannel('red');

		$this->assertEquals(15, $red);
	}


	public function testSetAndGet() {
		$colorist = new Colorist();

		$colorist->set('rgb', '15,25,35,0');

		$rgb = $colorist->get('rgb', true, true);

		$this->assertEquals('15,25,35,0', $rgb);
	}


	public function testParsers() {
		$this->assertInstanceOf(Colorist::class, Colorist::create('#001122'));
		$this->assertInstanceOf(Colorist::class, Colorist::create('orange'));
	}


	public function testTypeModelIsUndefined() {
		$this->expectException(ColoristException::class);

		$this->expectExceptionMessage('Type model is undefined: qwer');

		new Colorist('qwer(5,6,7,5)');
	}


	public function testChannelIsUndefinedExceptionInTheSetChannel() {
		$colorist = new Colorist();

		$this->expectException(ColoristException::class);
		$this->expectExceptionMessage('Channel is undefined: qwer');

		$colorist->setChannel('qwer', 15);
	}


	public function testChannelIsUndefinedExceptionInTheGetChannel() {
		$colorist = new Colorist();

		$this->expectException(ColoristException::class);
		$this->expectExceptionMessage('Channel is undefined: qwer');

		$colorist->getChannel('qwer');
	}


	public function testModelIsUndefinedException() {
		$colorist = new Colorist();

		$this->expectException(ColoristException::class);
		$this->expectExceptionMessage('Model is undefined: qwer');

		$colorist->get('qwer');
	}
}
