<?php

namespace Abyrate\Interfaces;


use stdClass;

interface ModelInterface
{
	/**
	 * Creating instance model
	 *
	 * @param string $values
	 *
	 * @return self
	 */
	public static function create(string $values);


	/**
	 * @return array
	 */
	public function getChannelsList():array;


	/**
	 * @return array
	 */
	public function getTypesList():array;


	/**
	 * @param string|float $alpha
	 *
	 * @return void
	 */
	public function syncAlpha($alpha);


	/**
	 * @param string $type
	 *
	 * @return boolean
	 */
	public function isType(string $type):bool;


	/**
	 * @param string $channel
	 *
	 * @return boolean
	 */
	public function isChannel(string $channel):bool;


	/**
	 * Convert instance values to RGB
	 *
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function convertToRgb(bool $withAlpha = false, bool $toString = false);


	/**
	 * Convert instance values from RGB
	 *
	 * @param string|array $rgb
	 *
	 * @return void
	 */
	public function convertFromRgb($rgb);


	/**
	 * Set single channel
	 *
	 * @param string               $channel
	 * @param string|integer|float $value
	 *
	 * @return void
	 */
	public function setChannel(string $channel, $value);


	/**
	 * Get single channel
	 *
	 * @param string $channel
	 *
	 * @return float|integer|string
	 */
	public function getChannel(string $channel);


	/**
	 * Set all model channels
	 *
	 * @param string|array $value
	 *
	 * @return void
	 */
	public function set($value);


	/**
	 * Get all model channels
	 *
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|stdClass
	 */
	public function get(bool $withAlpha = false, bool $toString = false);
}