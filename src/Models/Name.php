<?php

namespace Abyrate\Models;


use Abyrate\Exceptions\NameException;
use Abyrate\Interfaces\ModelInterface;
use Abyrate\Model;
use Abyrate\Traits\HexTrait;

class Name extends Model implements ModelInterface
{
	use HexTrait;

	/** @var string $name */
	protected $name = 'black';

	/** @var array $channels */
	protected $channels = [ 'name' ];

	/** @var array $types */
	protected $types = [ 'name' ];

	/** @var array array html names */
	protected $names = [
		// Red
		'indianred'            => 'cd5c5c',
		'lightcoral'           => 'f08080',
		'salmon'               => 'fa8072',
		'darksalmon'           => 'e9967a',
		'lightsalmon'          => 'ffa07a',
		'crimson'              => 'dc143c',
		'red'                  => 'ff0000',
		'firebrick'            => 'b22222',
		'darkred'              => '8b0000',

		// Pink
		'pink'                 => 'ffc0cb',
		'lightpink'            => 'ffb6c1',
		'hotpink'              => 'ff69b4',
		'deeppink'             => 'ff1493',
		'mediumvioletred'      => 'c71585',
		'palevioletred'        => 'db7093',

		// Orange
		'coral'                => 'ff7f50',
		'tomato'               => 'ff6347',
		'orangered'            => 'ff4500',
		'darkorange'           => 'ff8c00',
		'orange'               => 'ffa500',

		// Yellow
		'gold'                 => 'ffd700',
		'yellow'               => 'ffff00',
		'lightyellow'          => 'ffffe0',
		'lemonchiffon'         => 'fffacd',
		'lightgoldenrodyellow' => 'fafad2',
		'papayawhip'           => 'ffefd5',
		'moccasin'             => 'ffe4b5',
		'peachpuff'            => 'ffdab9',
		'palegoldenrod'        => 'eee8aa',
		'khaki'                => 'f0e68c',
		'darkkhaki'            => 'bdb76b',

		// Violet
		'lavender'             => 'e6e6fa',
		'thistle'              => 'd8bfd8',
		'plum'                 => 'dda0dd',
		'violet'               => 'ee82ee',
		'orchid'               => 'da70d6',
		'fuchsia'              => 'ff00ff',
		'magenta'              => 'ff00ff',
		'mediumorchid'         => 'ba55d3',
		'mediumpurple'         => '9370db',
		'blueviolet'           => '8a2be2',
		'darkviolet'           => '9400d3',
		'darkorchid'           => '9932cc',
		'darkmagenta'          => '8b008b',
		'purple'               => '800080',
		'indigo'               => '4b0082',
		'slateblue'            => '6a5acd',
		'darkslateblue'        => '483d8b',

		// Green
		'greenyellow'          => 'adff2f',
		'chartreuse'           => '7fff00',
		'lawngreen'            => '7cfc00',
		'lime'                 => '00ff00',
		'limegreen'            => '32cd32',
		'palegreen'            => '98fb98',
		'lightgreen'           => '90ee90',
		'mediumspringgreen'    => '00fa9a',
		'springgreen'          => '00ff7f',
		'mediumseagreen'       => '3cb371',
		'seagreen'             => '2e8b57',
		'forestgreen'          => '228b22',
		'green'                => '008000',
		'darkgreen'            => '006400',
		'yellowgreen'          => '9acd32',
		'olivedrab'            => '6b8e23',
		'olive'                => '808000',
		'darkolivegreen'       => '556b2f',
		'mediumaquamarine'     => '66cdaa',
		'darkseagreen'         => '8fbc8f',
		'lightseagreen'        => '20b2aa',
		'darkcyan'             => '008b8b',
		'teal'                 => '008080',

		// Blue
		'aqua'                 => '00ffff',
		'cyan'                 => '00ffff',
		'lightcyan'            => 'e0ffff',
		'paleturquoise'        => 'afeeee',
		'aquamarine'           => '7fffd4',
		'turquoise'            => '40e0d0',
		'mediumturquoise'      => '48d1cc',
		'darkturquoise'        => '00ced1',
		'cadetblue'            => '5f9ea0',
		'steelblue'            => '4682b4',
		'lightsteelblue'       => 'b0c4de',
		'powderblue'           => 'b0e0e6',
		'lightblue'            => 'add8e6',
		'skyblue'              => '87ceeb',
		'lightskyblue'         => '87cefa',
		'deepskyblue'          => '00bfff',
		'dodgerblue'           => '1e90ff',
		'cornflowerblue'       => '6495ed',
		'mediumslateblue'      => '7b68ee',
		'royalblue'            => '4169e1',
		'blue'                 => '0000ff',
		'mediumblue'           => '0000cd',
		'darkblue'             => '00008b',
		'navy'                 => '000080',
		'midnightblue'         => '191970',

		// Brown
		'cornsilk'             => 'fff8dc',
		'blanchedalmond'       => 'ffebcd',
		'bisque'               => 'ffe4c4',
		'navajowhite'          => 'ffdead',
		'wheat'                => 'f5deb3',
		'burlywood'            => 'deb887',
		'tan'                  => 'd2b48c',
		'rosybrown'            => 'bc8f8f',
		'sandybrown'           => 'f4a460',
		'goldenrod'            => 'daa520',
		'darkgoldenrod'        => 'b8860b',
		'peru'                 => 'cd853f',
		'chocolate'            => 'd2691e',
		'saddlebrown'          => '8b4513',
		'sienna'               => 'a0522d',
		'brown'                => 'a52a2a',
		'maroon'               => '800000',

		// White
		'white'                => 'ffffff',
		'snow'                 => 'fffafa',
		'honeydew'             => 'f0fff0',
		'mintcream'            => 'f5fffa',
		'azure'                => 'f0ffff',
		'aliceblue'            => 'f0f8ff',
		'ghostwhite'           => 'f8f8ff',
		'whitesmoke'           => 'f5f5f5',
		'seashell'             => 'fff5ee',
		'beige'                => 'f5f5dc',
		'oldlace'              => 'fdf5e6',
		'floralwhite'          => 'fffaf0',
		'ivory'                => 'fffff0',
		'antiquewhite'         => 'faebd7',
		'linen'                => 'faf0e6',
		'lavenderblush'        => 'fff0f5',
		'mistyrose'            => 'ffe4e1',

		// Gray
		'gainsboro'            => 'dcdcdc',
		'lightgray'            => 'd3d3d3',
		'silver'               => 'c0c0c0',
		'darkgray'             => 'a9a9a9',
		'gray'                 => '808080',
		'dimgray'              => '696969',
		'lightslategray'       => '778899',
		'slategray'            => '708090',
		'darkslategray'        => '2f4f4f',
		'black'                => '000000',
	];


	/**
	 * @param string|array|null $values
	 *
	 * @return void
	 */
	public function __construct($value = NULL) {
		$this->set($value);
	}


	/**
	 * @param string|array $value
	 *
	 * @return self
	 */
	public static function create($value) {
		return new self($value);
	}


	/**
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|\stdClass
	 */
	public function convertToRgb(bool $withAlpha = false, bool $toString = false) {
		$hex = $this->names[ $this->name ];
		$rgb = $this->parseHex($hex);

		if (!$withAlpha) {
			unset($rgb[ 'alpha' ]);
		}

		if ($toString) {
			return implode(',', $rgb);
		}

		return (object) $rgb;
	}


	/**
	 * @param string|array $rgb
	 *
	 * @return void
	 */
	public function convertFromRgb($rgb) {
		$hex = $this->RgbToHex($rgb, false);

		$name = array_search(mb_strtolower($hex), $this->names);

		if ($name !== false) {
			$this->set($name);
		} else {
			$tmp_name = [];
			$rgb = explode(',', $rgb);

			if (count($rgb) == 4) {
				$this->alpha = floatval($rgb[ 3 ]);
				unset($rgb[ 3 ]);
			}

			foreach ($this->names as $name => $code) {
				$channels = $this->parseHex($code);
				unset($channels[ 'alpha' ]);

				$tmp_name[ $name ] =
					abs($rgb[ 0 ] - $channels[ 'red' ]) +
					abs($rgb[ 1 ] - $channels[ 'green' ]) +
					abs($rgb[ 2 ] - $channels[ 'blue' ]);
			}

			$this->name = array_search(min($tmp_name), $tmp_name) ?: 'black';
		}

	}


	/**
	 * @param string               $channel
	 * @param string|integer|float $value
	 *
	 * @return void
	 */
	public function setChannel(string $channel, $value) {
		if (!in_array($channel, $this->channels)) {
			throw NameException::channelIsNotExist($channel);
		}

		$this->set($value);
	}


	/**
	 * @param string $channel
	 *
	 * @return \stdClass|string
	 * @throws NameException
	 */
	public function getChannel(string $channel) {
		if (in_array($channel, $this->channels)) {
			return $this->get(false, true);
		}

		throw NameException::channelIsNotExist($channel);
	}


	/**
	 * @param string|array $value
	 *
	 * @return void
	 */
	public function set($value) {
		if (key_exists($value, $this->names)) {
			$this->name = $value;
		}
	}


	/**
	 * @param bool $withAlpha
	 * @param bool $toString
	 *
	 * @return string|\stdClass
	 */
	public function get(bool $withAlpha = false, bool $toString = false) {
		if ($toString) {
			return $this->name;
		}

		return (object) [
			'name' => $this->name
		];
	}
}