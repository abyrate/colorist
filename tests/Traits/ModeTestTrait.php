<?php

namespace Tests\Traits;


use Abyrate\Interfaces\ModelInterface;

trait ModeTestTrait
{
	public function testCreateModel() {
		/** @var ModelInterface $model */
		$model = ( $this->model )::create($this->preset);

		$this->assertInstanceOf(ModelInterface::class, $model);
	}


	public function testConstructModel() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$this->assertInstanceOf(ModelInterface::class, $model);
	}


	public function testGetChannelsList() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$this->assertEquals($this->channels, $model->getChannelsList());
	}


	public function testGetTypesList() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$this->assertEquals($this->types, $model->getTypesList());
	}


	public function testSyncAlpha() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$model->syncAlpha($this->syncAlpha[ 0 ]);
		$this->assertAttributeEquals($this->syncAlpha[ 1 ], 'alpha', $model);
	}


	public function testIsType() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$this->assertEquals(true, $model->isType($this->isType));
	}


	public function testIsChannel() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$this->assertEquals(true, $model->isChannel($this->isChannel));
	}


	public function testConvertToRgb() {
		/** @var ModelInterface $model */
		$model = new $this->model($this->preset);

		$this->assertEquals(
			$this->rgb[ 'with_alpha' ],
			$model->convertToRgb(true, true)
		);

		$this->assertEquals(
			$this->rgb[ 'without_alpha' ],
			$model->convertToRgb(false, true)
		);

		$this->assertEquals(
			(object) $this->rgb[ 'object' ],
			$model->convertToRgb(false)
		);
	}


	public function testConvertFromRgb() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$model->convertFromRgb($this->rgb[ 'with_alpha' ]);

		foreach ($this->rgb[ 'channels' ] as $channel => $value) {
			$this->assertAttributeEquals($value, $channel, $model);
		}

		$this->assertAttributeEquals($this->rgb[ 'alpha' ], 'alpha', $model);
	}


	public function testSetChannels() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		foreach ($this->testChannels as $channel => $value) {
			$model->setChannel($channel, $value);

			$this->assertAttributeEquals($value, $channel, $model);
		}
	}


	public function testGetChannel() {
		/** @var ModelInterface $model */
		$model = new $this->model($this->preset);

		foreach ($this->testChannels as $channel => $value) {
			$this->assertEquals($value, $model->getChannel($channel));
		}
	}


	public function testSet() {
		/** @var ModelInterface $model */
		$model = new $this->model();

		$model->set($this->preset);

		foreach ($this->testChannels as $channel => $value) {
			$this->assertAttributeEquals($value, $channel, $model);
		}
	}


	public function testGet() {
		/** @var ModelInterface $model */
		$model = new $this->model($this->preset);

		$this->assertEquals(
			$this->testGet[ 'with_alpha' ],
			$model->get(true, true)
		);

		$this->assertEquals(
			$this->testGet[ 'without_alpha' ],
			$model->get(false, true)
		);

		$this->assertEquals(
			(object) $this->testGet[ 'object' ],
			$model->get()
		);
	}
}