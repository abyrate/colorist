# Colorist

![PHP version](https://img.shields.io/packagist/php-v/abyrate/colorist.svg)
[![Latest Stable Version](https://img.shields.io/packagist/v/abyrate/colorist.svg)](https://packagist.org/packages/abyrate/colorist)
[![Build Status](https://img.shields.io/travis/abyrate/colorist/master.svg?branch=master)](https://travis-ci.org/abyrate/colorist)
[![codecov](https://img.shields.io/codecov/c/github/abyrate/colorist/master.svg)](https://codecov.io/gh/abyrate/colorist)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/abyrate/colorist.svg?b=master)](https://scrutinizer-ci.com/g/abyrate/colorist/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/abyrate/colorist.svg)](https://packagist.org/packages/abyrate/colorist)
[![License](https://img.shields.io/github/license/abyrate/colorist.svg)](https://packagist.org/packages/abyrate/colorist)

This package allows you to convert and manage color models.

## Supported color models
- RGB (RGBA)
- HEX (HEXA)
- html colors names

> Short hex code is supported (#001122, #012, #00112233, #0123)

## In the plans
- HSL (HSLA)
- HSV (HSVA)
- CMYK
- Lab

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
		"abyrate/colorist": "~2.0"
	}
}
```
and run command:
```
$ composer update
```

## Usage

> If you change the values of any model, the rest are automatically updated

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
- 'orange' - name model

Range of channels:
- r, g, b - 0-255 (in the hex 00-ff)
- alpha - 0-1 (float value. In the hex 00-ff)

### Get

#### Channels
```php
$colorist->getChannel('red');   // get red channel
$colorist->getChannel('green'); // get green channel
$colorist->getChannel('blue');  // get blue channel
$colorist->getChannel('alpha'); // get alpha channel
$colorist->getChannel('hex');   // get hex code (e.g. #15af45)
$colorist->getChannel('hexa');  // get hex code with alpha (e.g. #15af4505)
$colorist->getChannel('name');  // get color name (e.g. orange)
```

#### Models
```php
$colorist->get('rgb');  // get rgb string (e.g. rgb(15,156,10))
$colorist->get('rgba'); // get rgb string with alpha channel (e.g. rgb(15,156,10,0.3))
$colorist->get('hex');  // get rgb in the hex format string (e.g. #15af45)
$colorist->get('hexa'); // get rgb with alpha channel in hex string (e.g. #15af4505)
$colorist->get('name'); // get color name (e.g. orange)
```

### Set

#### Channels
```php
$colorist->setChannel('red', 15);           // set red channel
$colorist->setChannel('green', 20);         // set green channel
$colorist->setChannel('blue', 25);          // set blue channel
$colorist->setChannel('alpha', 0.3);        // set alpha channel
$colorist->setChannel('hex', '#004');       // set hex code
$colorist->setChannel('hexa', '#00112233'); // set hex code with alpha
$colorist->setChannel('name', 'orange');    // set color name
```

#### Models
```php
$colorist->set('rgb', 'rgb(0,15,36)');       // set rgb string
$colorist->set('rgba', 'rgb(0,15,36, 0.1)'); // set rgb string with alpha channel
$colorist->set('hex', '#123');               // set rgb in the hex format string
$colorist->set('hexa', '#1234');             // set rgb with alpha channel in hex string
$colorist->set('name', 'orange');            // set color name (e.g. orange)
```

[API documentation](https://abyrate.github.io/colorist/)