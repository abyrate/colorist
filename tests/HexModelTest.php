<?php

use Abyrate\Exceptions\HexException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Models\HEX;
use PHPUnit\Framework\TestCase;

class HEXModelTest extends TestCase
{
	public function testCreateModel() {
		$model = HEX::create('#00112233');

		$this->assertInstanceOf(ModelInterface::class, $model);
	}


	public function testConstructModel() {
		$model = new HEX();

		$this->assertInstanceOf(ModelInterface::class, $model);
	}


	public function testGetChannelsList() {
		$model = new HEX();

		$this->assertEquals([ 'hex', 'hexa' ], $model->getChannelsList());
	}


	public function testGetTypesList() {
		$model = new HEX();

		$this->assertEquals([ 'hex', 'hexa' ], $model->getTypesList());
	}


	public function testConvertToRgb() {
		$model = new HEX('#ff553311');

		$model_to_HEX = $model->convertToRgb(true);

		$this->assertAttributeEquals(255, 'red', $model_to_HEX);
		$this->assertAttributeEquals(85, 'green', $model_to_HEX);
		$this->assertAttributeEquals(51, 'blue', $model_to_HEX);
		$this->assertAttributeEquals(0.066666666666667, 'alpha', $model_to_HEX);

		$this->assertEquals('255,85,51,0.066666666666667', $model->convertToRgb(true, true));
	}


	public function testConvertFromHEX() {
		$model = new HEX();

		$model->convertFromRgb('15,25,35,0.7');

		$this->assertAttributeEquals(15, 'hexRed', $model);
		$this->assertAttributeEquals(25, 'hexGreen', $model);
		$this->assertAttributeEquals(35, 'hexBlue', $model);
		$this->assertAttributeEquals(178, 'alpha', $model);
	}


	public function testSetChannelHex() {
		$model = new HEX();

		$model->setChannel('hex', 'ff5533');

		$this->assertAttributeEquals(255, 'hexRed', $model);
		$this->assertAttributeEquals(85, 'hexGreen', $model);
		$this->assertAttributeEquals(51, 'hexBlue', $model);
	}


	public function testSyncAlpha() {
		$model = new HEX();

		$model->syncAlpha('15');
		$this->assertAttributeEquals(21, 'alpha', $model);

		$this->expectException(HexException::class);
		$this->expectExceptionMessage('Invalid value: 152');

		$model->syncAlpha('152');
	}


	public function testSetChannelHexa() {
		$model = new HEX();

		$model->setChannel('hexa', 'ff553311');

		$this->assertAttributeEquals(255, 'hexRed', $model);
		$this->assertAttributeEquals(85, 'hexGreen', $model);
		$this->assertAttributeEquals(51, 'hexBlue', $model);
		$this->assertAttributeEquals(17, 'alpha', $model);
	}


	public function testGetChannelHex() {
		$model = new HEX('#0F1923');

		$this->assertEquals('#0F1923', $model->getChannel('hex'));
	}


	public function testGetChannelHexa() {
		$model = new HEX('#0F192380');

		$this->assertEquals('#0F192380', $model->getChannel('hexa'));
	}


	public function testSet() {
		$model = new HEX();

		$model->set('ff553311');

		$this->assertAttributeEquals(255, 'hexRed', $model);
		$this->assertAttributeEquals(85, 'hexGreen', $model);
		$this->assertAttributeEquals(51, 'hexBlue', $model);
		$this->assertAttributeEquals(17, 'alpha', $model);
	}


	public function testGet() {
		$model = new HEX();

		$model->set('#0F192380');
		$get_object = $model->get(true);

		$this->assertAttributeEquals('0F', 'hexRed', $get_object);
		$this->assertAttributeEquals('19', 'hexGreen', $get_object);
		$this->assertAttributeEquals('23', 'hexBlue', $get_object);
		$this->assertAttributeEquals('80', 'alpha', $get_object);
	}


	public function testSetChannelIsNotExistException() {
		$model = new HEX();

		$this->expectException(HexException::class);

		$this->expectExceptionMessage('Channel "qwer" is not exist');

		$model->setChannel('qwer', 15);

	}


	public function testGetChannelIsNotExistException() {
		$model = new HEX();

		$this->expectException(HexException::class);

		$this->expectExceptionMessage('Channel "qwer" is not exist');

		$model->getChannel('qwer');
	}


	public function testParseValueNotArray() {
		$model = new HEX();

		$this->expectException(HexException::class);

		$this->expectExceptionMessage('Value is not array');

		$model->set(15);
	}


	public function testInvalidValue() {
		$model = new HEX();

		$this->expectException(HexException::class);
		$this->expectExceptionMessage('Invalid value: dd#eeaa');

		$model->set('dd#eeaa');
	}


	public function testExplodeHex() {
		$model = new HEX();

		$model->set('#aaa');

		$this->expectException(HexException::class);
		$this->expectExceptionMessage('Invalid value: ddeeaa1122');

		$model->set('ddeeaa1122');
	}
}
