<?php

use Abyrate\Colorist;
use Abyrate\Exceptions\RgbException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Models\RGB;
use PHPUnit\Framework\TestCase;

class RGBModelTest extends TestCase
{
	public function testCreateModel() {
		$model = RGB::create('15,40,53,1');

		$this->assertInstanceOf(ModelInterface::class, $model);
	}


	public function testConstructModel() {
		$model = new RGB();

		$this->assertInstanceOf(ModelInterface::class, $model);
	}


	public function testGetChannelsList() {
		$model = new RGB();

		$this->assertEquals([ 'red', 'green', 'blue' ], $model->getChannelsList());
	}


	public function testGetTypesList() {
		$model = new RGB();

		$this->assertEquals([ 'rgb', 'rgba' ], $model->getTypesList());
	}


	public function testConvertToRgb() {
		$model = new RGB('1,2,3,0.5');

		$model_to_rgb = $model->convertToRgb(true);

		$this->assertAttributeEquals(1,'red', $model_to_rgb);
		$this->assertAttributeEquals(2,'green', $model_to_rgb);
		$this->assertAttributeEquals(3,'blue', $model_to_rgb);
		$this->assertAttributeEquals(0.5,'alpha', $model_to_rgb);
	}


	public function testConvertFromRgb() {
		$model = new RGB();

		$model->convertFromRgb('15,25,35,0.7');

		$this->assertAttributeEquals(15,'red', $model);
		$this->assertAttributeEquals(25,'green', $model);
		$this->assertAttributeEquals(35,'blue', $model);
		$this->assertAttributeEquals(0.7,'alpha', $model);
	}


	public function testSetChannelRed() {
		$model = new RGB();

		$model->setChannel('red', 15);

		$this->assertAttributeEquals(15,'red', $model);
	}


	public function testSetChannelGreen() {
		$model = new RGB();

		$model->setChannel('green', 25);

		$this->assertAttributeEquals(25,'green', $model);
	}


	public function testSetChannelBlue() {
		$model = new RGB();

		$model->setChannel('blue', 150);

		$this->assertAttributeEquals(150,'blue', $model);
	}


	public function testSetChannelAlpha() {
		$model = new RGB();

		$model->setChannel('alpha', 0.25);

		$this->assertAttributeEquals(0.25,'alpha', $model);
	}


	public function testGetChannelRed() {
		$model = new RGB('15,25,35');

		$this->assertEquals(15, $model->getChannel('red'));
	}


	public function testGetChannelGreen() {
		$model = new RGB('15,25,35');

		$this->assertEquals(25, $model->getChannel('green'));
	}


	public function testGetChannelBlue() {
		$model = new RGB('15,25,35');

		$this->assertEquals(35, $model->getChannel('blue'));
	}


	public function testGetChannelAlpha() {
		$model = new RGB('15,25,35,.1');

		$this->assertEquals(0.1, $model->getChannel('alpha'));
	}


	public function testSet() {
		$model = new RGB();

		$model->set('15,25,35,0.7');

		$this->assertAttributeEquals(15,'red', $model);
		$this->assertAttributeEquals(25,'green', $model);
		$this->assertAttributeEquals(35,'blue', $model);
		$this->assertAttributeEquals(0.7,'alpha', $model);
	}


	public function testGet() {
		$model = new RGB();

		$model->set('15,25,35,0.7');
		$get_object = $model->get(true);

		$this->assertAttributeEquals(15,'red', $get_object);
		$this->assertAttributeEquals(25,'green', $get_object);
		$this->assertAttributeEquals(35,'blue', $get_object);
		$this->assertAttributeEquals(0.7,'alpha', $get_object);

		$this->assertEquals('15,25,35,0.7', $model->get(true, true));
	}


	public function testSetChannelIsNotExistException() {
		$model = new RGB();

		$this->expectException(RgbException::class);

		$this->expectExceptionMessage('Channel "qwer" is not exist');

		$model->setChannel('qwer', 15);

	}


	public function testGetChannelIsNotExistException() {
		$model = new RGB();

		$this->expectException(RgbException::class);

		$this->expectExceptionMessage('Channel "qwer" is not exist');

		$model->getChannel('qwer');
	}


	public function testParseValueNotArray() {
		$model = new RGB();

		$this->expectException(RgbException::class);

		$this->expectExceptionMessage('Value is not array');

		$model->set(15);
	}
}
