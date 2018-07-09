<?php

namespace Abyrate\Exceptions;


use Exception;

class NameException extends Exception
{
	public static function channelIsNotExist(string $channel) {
		return new self('Channel "' . $channel . '" is not exist');
	}
}