<?php

namespace Abyrate\Interfaces;


interface ModelInterface
{
	/**
	 * @param string|array $values
	 *
	 * @return self
	 */
	public static function create($values);


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
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|\stdClass
	 */
	public function convertToRgb(bool $withAlpha = false, bool $toString = false);


	/**
	 * @param string|array $rgb
	 *
	 * @return void
	 */
	public function convertFromRgb($rgb);


	/**
	 * @param string               $channel
	 * @param string|integer|float $value
	 *
	 * @return void
	 */
	public function setChannel(string $channel, $value);


	/**
	 * @param string $channel
	 *
	 * @return float|integer
	 */
	public function getChannel(string $channel);


	/**
	 * @param string|array $value
	 *
	 * @return void
	 */
	public function set($value);


	/**
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|\stdClass
	 */
	public function get(bool $withAlpha = false, bool $toString = false);
}