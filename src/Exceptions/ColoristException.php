<?php

namespace Abyrate\Exceptions;


use Exception;

class ColoristException extends Exception
{
	public static function typeModelIsUndefined(string $type) {
		return new self('Type model is undefined: ' . $type);
	}


	public static function channelIsUndefined(string $channel) {
		return new self('Channel is undefined: ' . $channel);
	}


	public static function modelIsUndefined(string $model) {
		return new self('Model is undefined: ' . $model);
	}
}