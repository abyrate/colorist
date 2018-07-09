<?php

namespace Abyrate\Exceptions;


use Exception;

class RgbException extends Exception
{
	public static function notArray() {
		return new self('Value is not array');
	}


	public static function channelIsNotExist(string $channel) {
		return new self('Channel "' . $channel . '" is not exist');
	}
}