<?php

use Abyrate\Exceptions\HexException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Models\HEX;
use PHPUnit\Framework\TestCase;
use Tests\Traits\ModeTestTrait;

class HEXModelTest extends TestCase
{
	use ModeTestTrait;

	protected $model = HEX::class;

	protected $channels = [ 'hex', 'hexa' ];

	protected $types = [ 'hex', 'hexa' ];

	protected $preset = '#00112200';

	protected $syncAlpha = [ '0.5', 0.5 ];

	protected $isType = 'hex';

	protected $isChannel = 'hex';

	protected $rgb = [
		'alpha'         => 0,
		'with_alpha'    => '0,17,34,0',
		'without_alpha' => '0,17,34',
		'object'        => [
			'red'   => 0,
			'green' => 17,
			'blue'  => 34,
		],
		'channels'      => [
			'hex'  => '#001122',
			'hexa' => '#00112200',
		],
	];

	protected $testChannels = [
		'hex'  => '#001122',
		'hexa' => '#00112200',
	];

	protected $testGet = [
		'with_alpha'    => '#00112200',
		'without_alpha' => '#001122',
		'object'        => [
			'hex' => '#001122'
		],
	];


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
}
