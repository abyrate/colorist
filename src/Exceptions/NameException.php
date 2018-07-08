<?php

namespace Abyrate\Exceptions;


use Exception;

class NameException extends Exception
{
	public static function notArray() {
		return new self('Value is not array');
	}


	public static function channelIsNotExist(string $channel) {
		return new self('Channel "' . $channel . '" is not exist');
	}


	public static function invalidValue($value) {
		return new self('Invalid value: ' .  print_r($value, true));
	}
}