<?php

namespace Abyrate\Exceptions;


use Exception;

class ColoristException extends Exception
{
	public static function invalidValue($value) {
		return new self('Invalid value to detect model (' . print_r($value, true) . ')');
	}


	public static function notFoundParserMethod(string $name) {
		return new self('Not found parser method: ' . $name);
	}


	public static function UndefinedValue(string $value) {
		return new self('Undefined value: ' . $value);
	}


	public static function typeModelIsUndefined(string $type) {
		return new self('Type model is undefined: ' . $type);
	}


	public static function channelIsUndefined(string $channel) {
		return new self('Channel is undefined: ' . $channel);
	}


	public static function modelIsUndefined(string $model) {
		return new self('Model is undefined: ' . $model);
	}


	public static function modelNotFound(string $model) {
		return new self('Model not found: ' . $model);
	}


	public static function channelNotFound(string $channel) {
		return new self('Channel not found: ' . $channel);
	}
}