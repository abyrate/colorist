# Colorist

[![Build Status](https://travis-ci.org/abyrate/colorist.svg?branch=master)](https://travis-ci.org/abyrate/colorist)
[![Latest Stable Version](https://poser.pugx.org/abyrate/colorist/v/stable)](https://packagist.org/packages/abyrate/colorist)
[![codecov](https://codecov.io/gh/abyrate/colorist/branch/master/graph/badge.svg)](https://codecov.io/gh/abyrate/colorist)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/abyrate/colorist/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/abyrate/colorist/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b8c8df8c-3df2-4fcf-9149-90f49ca47007/mini.png)](https://insight.sensiolabs.com/projects/b8c8df8c-3df2-4fcf-9149-90f49ca47007)
[![Total Downloads](https://poser.pugx.org/abyrate/colorist/downloads)](https://packagist.org/packages/abyrate/colorist)
[![License](https://poser.pugx.org/abyrate/colorist/license)](https://packagist.org/packages/abyrate/colorist)

This package allows you to convert and manage color models.

## Supported color models
- RGB (RGBA)
- HEX (HEXA)
> Short hex is not supported (#000000 - support, #000 - not support)

## In the plans
- HSL (HSLA)
- HSV (HSVA)
- CMYK
- Lab
- html colors names

## Requirements
- PHP >= 7.1

## Installation
Run command
```
$ composer require abyrate/colorist
```

Or add the following in your root composer.json file:
```json
{
	"require": {
		"abyrate/colorist": "~1.0"
	}
}
```
and run command:
```
$ composer update
```

## Usage

### Create

```php
// Create an object in the standard way
$color = new \Abyrate\Colorist('rgb(55,191,0)');

// Create using static method
$color = \Abyrate\Colorist::create('rgb(55,191,0)');
```

Supported syntax:
- 'rgb(0,0,0)' - rgb model
- 'rgba(0,0,0,0)' - rgb model with alpha channel
- '#000000' - hex model
- '#00000000' - hex model with alpha channel

Range of channels:
- r, g, b - 0-255 (in the hex 00-ff)
- alpha - 0-1 (float value. In the hex 00-ff)

### Get
```php
$color->rgb // get rgb string (e.g. rgb(15,156,10))
$color->rgba // get rgb string with alpha channel (e.g. rgb(15,156,10,0.3))
$color->r // get red channel
$color->g // get green channel
$color->b // get blue channel
$color->alpha // get alpha channel
$color->hex // get rgb in the hex format string (e.g. #15af45)
$color->hexa // get rgb with alpha channel in hex string (e.g. #15af4505)
```

### Set
```php
$color->rgb = 'rgb(45,0,15)' // set rgb
$color->rgba = 'rgba(45,0,15,0.7)' // set rgb with alpha channel
$color->r = 15 // set red channel
$color->g = 57 // set green channel
$color->b = 155 // set blue channel
$color->alpha = 0.5 // set alpha channel
$color->hex = '#ff1501' // get rgb in the hex format string (e.g. #15af45)
$color->hexa = '#ff1501f0' // set rgb with alpha channel in the hex format string (e.g. #15af45)
```

[API documentation](https://abyrate.github.io/colorist/)