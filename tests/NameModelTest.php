<?php

use Abyrate\Exceptions\NameException;
use Abyrate\Models\Name;
use PHPUnit\Framework\TestCase;
use Tests\Traits\ModeTestTrait;

class NameModelTest extends TestCase
{
	use ModeTestTrait;

	protected $model = Name::class;

	protected $channels = [ 'name' ];

	protected $types = [ 'name' ];

	protected $preset = 'orangered';

	protected $syncAlpha = [ '0.5', 0.5 ];

	protected $isType = 'name';

	protected $isChannel = 'name';

	protected $rgb = [
		'alpha'         => 1,
		'with_alpha'    => '255,69,0,1',
		'without_alpha' => '255,69,0',
		'object'        => [
			'red'   => 255,
			'green' => 69,
			'blue'  => 0,
		],
		'channels'      => [
			'name' => 'orangered',
		],
	];

	protected $testChannels = [
		'name' => 'orangered',
	];

	protected $testGet = [
		'with_alpha'    => 'orangered',
		'without_alpha' => 'orangered',
		'object'        => [ 'name' => 'orangered' ],
	];



	public function testChannelIsNotExistExceptionInGetChannel() {
		$model = new Name('orangered');

		$this->expectException(NameException::class);
		$this->expectExceptionMessage('Channel "qwer" is not exist');

		$model->getChannel('qwer');
		$model->setChannel('qwer', '');
	}


	public function testChannelIsNotExistExceptionInSetChannel() {
		$model = new Name('orangered');

		$this->expectException(NameException::class);
		$this->expectExceptionMessage('Channel "qwer" is not exist');

		$model->setChannel('qwer', '');
	}


	public function testPickColorName() {
		$model = new Name();

		$model->convertFromRgb('255,165,15, 0.5');

		$this->assertAttributeEquals('orange', 'name', $model);
	}
}
