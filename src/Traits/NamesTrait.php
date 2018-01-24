<?php

namespace Abyrate\Traits;

/**
 * Trait NamesTrait
 * @package Abyrate\Traits
 *
 * @property string name
 * @see names
 */
trait NamesTrait
{
	/** @var array array html names */
	protected $names = [
		// Red
		'IndianRed'            => 'cd5c5c',
		'LightCoral'           => 'f08080',
		'Salmon'               => 'fa8072',
		'DarkSalmon'           => 'e9967a',
		'LightSalmon'          => 'ffa07a',
		'Crimson'              => 'dc143c',
		'Red'                  => 'ff0000',
		'Firebrick'            => 'b22222',
		'DarkRed'              => '8b0000',

		// Pink
		'Pink'                 => 'ffc0cb',
		'LightPink'            => 'ffb6c1',
		'HotPink'              => 'ff69b4',
		'DeepPink'             => 'ff1493',
		'MediumVioletRed'      => 'c71585',
		'PaleVioletRed'        => 'db7093',

		// Orange
		'Coral'                => 'ff7f50',
		'Tomato'               => 'ff6347',
		'OrangeRed'            => 'ff4500',
		'DarkOrange'           => 'ff8c00',
		'Orange'               => 'ffa500',

		// Yellow
		'Gold'                 => 'ffd700',
		'Yellow'               => 'ffff00',
		'LightYellow'          => 'ffffe0',
		'LemonChiffon'         => 'fffacd',
		'LightGoldenRodYellow' => 'fafad2',
		'PapayaWhip'           => 'ffefd5',
		'Moccasin'             => 'ffe4b5',
		'PeachPuff'            => 'ffdab9',
		'PaleGoldenrod'        => 'eee8aa',
		'Khaki'                => 'f0e68c',
		'DarkKhaki'            => 'bdb76b',

		// Violet
		'Lavender'             => 'e6e6fa',
		'Thistle'              => 'd8bfd8',
		'Plum'                 => 'dda0dd',
		'Violet'               => 'ee82ee',
		'Orchid'               => 'da70d6',
		'Fuchsia'              => 'ff00ff',
		'Magenta'              => 'ff00ff',
		'MediumOrchid'         => 'ba55d3',
		'MediumPurple'         => '9370db',
		'BlueViolet'           => '8a2be2',
		'DarkViolet'           => '9400d3',
		'DarkOrchid'           => '9932cc',
		'DarkMagenta'          => '8b008b',
		'Purple'               => '800080',
		'Indigo'               => '4b0082',
		'SlateBlue'            => '6a5acd',
		'DarkSlateBlue'        => '483d8b',

		// Green
		'GreenYellow'          => 'adff2f',
		'Chartreuse'           => '7fff00',
		'LawnGreen'            => '7cfc00',
		'Lime'                 => '00ff00',
		'LimeGreen'            => '32cd32',
		'PaleGreen'            => '98fb98',
		'LightGreen'           => '90ee90',
		'MediumSpringGreen'    => '00fa9a',
		'SpringGreen'          => '00ff7f',
		'MediumSeaGreen'       => '3cb371',
		'SeaGreen'             => '2e8b57',
		'ForestGreen'          => '228b22',
		'Green'                => '008000',
		'DarkGreen'            => '006400',
		'YellowGreen'          => '9acd32',
		'OliveDrab'            => '6b8e23',
		'Olive'                => '808000',
		'DarkOliveGreen'       => '556b2f',
		'MediumAquamarine'     => '66cdaa',
		'DarkSeaGreen'         => '8fbc8f',
		'LightSeaGreen'        => '20b2aa',
		'DarkCyan'             => '008b8b',
		'Teal'                 => '008080',

		// Blue
		'Aqua'                 => '00ffff',
		'Cyan'                 => '00ffff',
		'LightCyan'            => 'e0ffff',
		'PaleTurquoise'        => 'afeeee',
		'Aquamarine'           => '7fffd4',
		'Turquoise'            => '40e0d0',
		'MediumTurquoise'      => '48d1cc',
		'DarkTurquoise'        => '00ced1',
		'CadetBlue'            => '5f9ea0',
		'SteelBlue'            => '4682b4',
		'LightSteelBlue'       => 'b0c4de',
		'PowderBlue'           => 'b0e0e6',
		'LightBlue'            => 'add8e6',
		'SkyBlue'              => '87ceeb',
		'LightSkyBlue'         => '87cefa',
		'DeepSkyBlue'          => '00bfff',
		'DodgerBlue'           => '1e90ff',
		'CornflowerBlue'       => '6495ed',
		'MediumSlateBlue'      => '7b68ee',
		'RoyalBlue'            => '4169e1',
		'Blue'                 => '0000ff',
		'MediumBlue'           => '0000cd',
		'DarkBlue'             => '00008b',
		'Navy'                 => '000080',
		'MidnightBlue'         => '191970',

		// Brown
		'CornSilk'             => 'fff8dc',
		'BlanchedAlmond'       => 'ffebcd',
		'Bisque'               => 'ffe4c4',
		'NavajoWhite'          => 'ffdead',
		'Wheat'                => 'f5deb3',
		'BurlyWood'            => 'deb887',
		'Tan'                  => 'd2b48c',
		'RosyBrown'            => 'bc8f8f',
		'SandyBrown'           => 'f4a460',
		'Goldenrod'            => 'daa520',
		'DarkGoldenrod'        => 'b8860b',
		'Peru'                 => 'cd853f',
		'Chocolate'            => 'd2691e',
		'SaddleBrown'          => '8b4513',
		'Sienna'               => 'a0522d',
		'Brown'                => 'a52a2a',
		'Maroon'               => '800000',

		// White
		'White'                => 'ffffff',
		'Snow'                 => 'fffafa',
		'Honeydew'             => 'f0fff0',
		'MintCream'            => 'f5fffa',
		'Azure'                => 'f0ffff',
		'AliceBlue'            => 'f0f8ff',
		'GhostWhite'           => 'f8f8ff',
		'WhiteSmoke'           => 'f5f5f5',
		'Seashell'             => 'fff5ee',
		'Beige'                => 'f5f5dc',
		'OldLace'              => 'fdf5e6',
		'FloralWhite'          => 'fffaf0',
		'Ivory'                => 'fffff0',
		'AntiqueWhite'         => 'faebd7',
		'Linen'                => 'faf0e6',
		'LavenderBlush'        => 'fff0f5',
		'MistyRose'            => 'ffe4e1',

		// Gray
		'Gainsboro'            => 'dcdcdc',
		'LightGray'            => 'd3d3d3',
		'Silver'               => 'c0c0c0',
		'DarkGray'             => 'a9a9a9',
		'Gray'                 => '808080',
		'DimGray'              => '696969',
		'LightSlateGray'       => '778899',
		'SlateGray'            => '708090',
		'DarkSlateGray'        => '2f4f4f',
		'Black'                => '000000',
	];

	/** @var string */
	private $name;


	/**
	 * @param string $hex
	 *
	 * @return array
	 */
	private function explodeHexName(string $hex):array {
		$string = str_replace('#', '', $hex);
		$hex_array = sscanf($string, '%2s%2s%2s');

		return [
			hexdec($hex_array[ 0 ]),
			hexdec($hex_array[ 1 ]),
			hexdec($hex_array[ 2 ]),
		];
	}


	/**
	 * @param string $search
	 *
	 * @return int|null|string
	 */
	protected function searchName(string $search) {
		$search = mb_strtolower($search);

		foreach ($this->names as $name => $code) {
			if (mb_strtolower($name) == $search) {
				return $code;
			} elseif (mb_strtolower($code) == $search) {
				return $name;
			}
		}

		return NULL;
	}


	/**
	 * @param string $search
	 *
	 * @return bool
	 */
	protected function issetName(string $search):bool {
		return !is_null($this->searchName($search));
	}


	/**
	 * @param string $color
	 */
	protected function parseName(string $color) {
		$this->setName($color);
	}


	/**
	 * @return string|null
	 */
	protected function getName() {
		return $this->name;
	}


	/**
	 * @param string $value
	 */
	protected function setName(string $value) {
		$this->name = $this->issetName($value) ? $value : NULL;
	}


	/**
	 * @return array
	 */
	protected function getRgbFromName():array {
		if (is_null($this->name)) {
			return [ 0, 0, 0 ];
		}

		return $this->explodeHexName($this->searchName($this->name));
	}


	/**
	 * @param $red
	 * @param $green
	 * @param $blue
	 */
	protected function convertRgbToName($red, $green, $blue) {
		$_red = ( $red < 16 ? '0' : NULL ) . dechex($red);
		$_green = ( $green < 16 ? '0' : NULL ) . dechex($green);
		$_blue = ( $blue < 16 ? '0' : NULL ) . dechex($blue);
		$hex = mb_strtolower($_red . $_green . $_blue);

		if ($this->issetName($hex)) {
			$this->name = $this->searchName($hex);
		} else {
			$tmp_name = [];

			foreach ($this->names as $name => $code) {
				$channels = $this->explodeHexName($code);
				$tmp_name[ $name ] = abs($red - $channels[ 0 ]) + abs($green - $channels[ 1 ]) + abs($blue - $channels[ 2 ]);
			}

			$this->name = array_search(min($tmp_name), $tmp_name) ?: NULL;
		}
	}
}