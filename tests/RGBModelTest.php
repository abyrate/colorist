<?php

use Abyrate\Colorist;
use Abyrate\Exceptions\RgbException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Models\RGB;
use PHPUnit\Framework\TestCase;
use Tests\Traits\ModeTestTrait;

class RGBModelTest extends TestCase
{
	use ModeTestTrait;

	protected $model = RGB::class;

	protected $channels = [ 'red', 'green', 'blue' ];

	protected $types = [ 'rgb', 'rgba' ];

	protected $preset = '15,40,53,0.5';

	protected $syncAlpha = [ '0.5', 0.5 ];

	protected $isType = 'rgb';

	protected $isChannel = 'green';

	protected $rgb = [
		'alpha'         => 0.5,
		'with_alpha'    => '15,40,53,0.5',
		'without_alpha' => '15,40,53',
		'object'        => [
			'red'   => 15,
			'green' => 40,
			'blue'  => 53,
		],
		'channels'      => [
			'red'   => 15,
			'green' => 40,
			'blue'  => 53,
		],
	];

	protected $testChannels = [
		'red'   => 15,
		'green' => 40,
		'blue'  => 53,
	];

	protected $testGet = [
		'with_alpha'    => '15,40,53,0.5',
		'without_alpha' => '15,40,53',
		'object'        => [
			'red'   => 15,
			'green' => 40,
			'blue'  => 53,
		],
	];


	public function testSetChannelAlpha() {
		$model = new RGB();

		$model->setChannel('alpha', 0.5);

		$this->assertAttributeEquals(0.5, 'alpha', $model);
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
