<?php

namespace Abyrate;


use Abyrate\Exceptions\ColoristException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Models\HEX;
use Abyrate\Models\Name;
use Abyrate\Models\RGB;
use stdClass;

/**
 * Main class for manipulation with color models
 * @package Abyrate
 */
class Colorist
{
	/**
	 * List of model classes
	 *
	 * @var array $classes
	 */
	protected $classes = [
		RGB::class,
		HEX::class,
		Name::class,
	];

	/**
	 * Loaded models
	 *
	 * @var array $models
	 */
	protected $models = [];

	/**
	 * List supported channels. Automatically generated list
	 *
	 * @var array $channels
	 */
	protected $channels = [];

	/**
	 * List supported types. Automatically generated list
	 *
	 * @var array $types
	 */
	protected $types = [];


	/**
	 * Colorist constructor.
	 *
	 * @param string|NULL $value
	 *
	 * @throws ColoristException
	 */
	public function __construct(string $value = NULL) {
		$this->loadModels();

		if (!is_null($value)) {

			$parser_name = $this->detectParser($value);
			$parser_name .= 'Parser';

			list($type, $value) = call_user_func([ $this, $parser_name ], $value);

			if (!in_array($type, $this->types)) {
				throw ColoristException::typeModelIsUndefined($type);
			}

			/** @var ModelInterface $model */
			foreach ($this->models as $model) {
				if ($model->isType($type)) {
					$model->set($value);
					break;
				}
			}

		}

	}


	/**
	 * Static method for create and set
	 *
	 * @param string $value
	 *
	 * @return Colorist
	 */
	public static function create(string $value) {
		return new self($value);
	}


	/**
	 * @return array
	 */
	public function getChannelsList():array {
		return $this->channels;
	}


	/**
	 * @return array
	 */
	public function getTypesList():array {
		return $this->types;
	}


	/**
	 * Set one channel
	 *
	 * @param string               $channel
	 * @param string|integer|float $value
	 *
	 * @throws ColoristException
	 */
	public function setChannel(string $channel, $value) {
		if (!in_array($channel, $this->channels)) {
			throw ColoristException::channelIsUndefined($channel);
		}

		/** @var ModelInterface $model */
		foreach ($this->models as $model) {
			if ($model->isChannel($channel)) {
				$model->setChannel($channel, $value);
				$this->syncModels($model);
				break;
			}
		}
	}


	/**
	 * Get value of one channel
	 *
	 * @param string $channel
	 *
	 * @return float|int|string
	 * @throws ColoristException
	 */
	public function getChannel(string $channel) {
		$model = NULL;

		if (!in_array($channel, $this->channels)) {
			throw ColoristException::channelIsUndefined($channel);
		}

		/** @var ModelInterface $model */
		foreach ($this->models as $model) {
			if ($model->isChannel($channel)) {
				break;
			}
		}

		return $model->getChannel($channel);
	}


	/**
	 * Set model
	 *
	 * @param string $model
	 * @param string $value
	 *
	 * @return void
	 */
	public function set(string $model, string $value) {
		$model = $this->getModel($model);
		$model->set($value);
		$this->syncModels($model);
	}


	/**
	 * Get model
	 *
	 * @param string $model
	 * @param bool   $withAlpha
	 * @param bool   $toString
	 *
	 * @return stdClass|string
	 */
	public function get(string $model, bool $withAlpha = false, bool $toString = false) {
		$model = $this->getModel($model);

		return $model->get($withAlpha, $toString);
	}


	/**
	 * Loading models
	 */
	protected function loadModels() {
		foreach ($this->classes as $class) {
			/** @var ModelInterface $model */
			$model = new $class();

			$this->loadChannels($model->getChannelsList());
			$this->loadTypes($model->getTypesList());
			$this->models[] = $model;
		}
	}


	/**
	 * Loading channels
	 *
	 * @param array $channels
	 */
	protected function loadChannels(array $channels) {
		$this->channels = array_merge($this->channels, $channels);
	}


	/**
	 * Loading types
	 *
	 * @param array $types
	 */
	protected function loadTypes(array $types) {
		$this->types = array_merge($this->types, $types);
	}


	/**
	 * Detecting the parser from the set value
	 *
	 * @param string $value
	 *
	 * @return string
	 * @throws ColoristException
	 */
	protected function detectParser(string $value):string {
		if (mb_stripos($value, '#') !== false) {
			return 'hex';
		} elseif (mb_stripos($value, '(') !== false) {
			return 'other';
		} else {
			return 'name';
		}
	}


	/**
	 * Getting the model and values from other. Format: rgb(0,0,0); hsv(15,10,3)
	 *
	 * @param string $value
	 *
	 * @return array
	 */
	protected function otherParser(string $value):array {
		preg_match('/([\w]+)\(([\d\,\.\ ]*)\)/i', $value, $matches);

		return [ $matches[ 1 ], explode(',', $matches[ 2 ]) ];
	}


	/**
	 * Getting the model and values from hex. Format: #000; #112233
	 *
	 * @param string $value
	 *
	 * @return array
	 * @throws ColoristException
	 */
	protected function hexParser(string $value):array {
		$code = str_replace('#', '', $value);
		$length = mb_strlen($code);

		$method = in_array($length, [ 3, 6 ]) ? 'hex' : 'hexa';

		return [ $method, $code ];
	}


	/**
	 * Getting the model and values from name. Format: orange; red
	 *
	 * @param string $value
	 *
	 * @return array
	 */
	protected function nameParser(string $value):array {
		return [ 'name', $value ];
	}


	/**
	 * Getting a model by type
	 *
	 * @param string $type
	 *
	 * @return ModelInterface|null
	 * @throws ColoristException
	 */
	protected function getModel(string $type):ModelInterface {
		$return = NULL;

		if (!in_array($type, $this->types)) {
			throw ColoristException::modelIsUndefined($type);
		}

		/** @var ModelInterface $_model */
		foreach ($this->models as $_model) {
			if (in_array($type, $_model->getTypesList())) {
				$return = $_model;
				break;
			}
		}

		return $return;
	}


	/**
	 * Synchronization of models
	 *
	 * @param Model|ModelInterface $source Synchronization source
	 */
	protected function syncModels(ModelInterface $source) {
		$rgb = $source->convertToRgb(true, true);

		/** @var ModelInterface $model */
		foreach ($this->models as $model) {
			if (get_class($source) != get_class($model)) {
				$model->convertFromRgb($rgb);
			}
		}
	}

}