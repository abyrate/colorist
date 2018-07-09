<?php

namespace Abyrate;


use Abyrate\Exceptions\ColoristException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Models\HEX;
use Abyrate\Models\Name;
use Abyrate\Models\RGB;

class Colorist
{
	/** @var array $classes */
	protected $classes = [
		RGB::class,
		HEX::class,
		Name::class,
	];

	/** @var array $models */
	protected $models = [];

	/** @var array $channels */
	protected $channels = [];

	/** @var array $types */
	protected $types = [];


	/**
	 * @param string $value
	 *
	 * @return Colorist
	 */
	public static function create(string $value) {
		return new self($value);
	}


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
	 * @param string $channel
	 * @param        $value
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
	 * @param string $channel
	 *
	 * @return float|int
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
	 * @param string $model
	 * @param string $value
	 */
	public function set(string $model, string $value) {
		$model = $this->getModel($model);
		$model->set($value);
		$this->syncModels($model);
	}


	/**
	 * @param string $model
	 * @param bool   $withAlpha
	 * @param bool   $toString
	 *
	 * @return \stdClass|string
	 */
	public function get(string $model, bool $withAlpha = false, bool $toString = false) {
		$model = $this->getModel($model);

		return $model->get($withAlpha, $toString);
	}


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
	 * @param array $channels
	 */
	protected function loadChannels(array $channels) {
		$this->channels = array_merge($this->channels, $channels);
	}


	/**
	 * @param array $types
	 */
	protected function loadTypes(array $types) {
		$this->types = array_merge($this->types, $types);
	}


	/**
	 * @param string $value
	 *
	 * @return string
	 * @throws ColoristException
	 */
	protected function detectParser(string $value) {
		if (mb_stripos($value, '#') !== false) {
			return 'hex';
		} elseif (mb_stripos($value, '(') !== false) {
			return 'other';
		} else {
			return 'name';
		}
	}


	/**
	 * @param string $value
	 *
	 * @return array
	 */
	protected function otherParser(string $value) {
		preg_match('/([\w]+)\(([\d\,\.\ ]*)\)/i', $value, $matches);

		return [ $matches[ 1 ], explode(',', $matches[ 2 ]) ];
	}


	/**
	 * @param string $value
	 *
	 * @return array
	 * @throws ColoristException
	 */
	protected function hexParser(string $value) {
		$code = str_replace('#', '', $value);
		$length = mb_strlen($code);

		$method = in_array($length, [ 3, 6 ]) ? 'hex' : 'hexa';

		return [ $method, $code ];
	}


	/**
	 * @param string $value
	 *
	 * @return array
	 */
	protected function nameParser(string $value) {
		return [ 'name', $value ];
	}


	/**
	 * @param string $type
	 *
	 * @return ModelInterface|null
	 * @throws ColoristException
	 */
	protected function getModel(string $type) {
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
	 * @param Model|ModelInterface $source
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