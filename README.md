# GB/T 4880

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![Build Status](https://img.shields.io/travis/tourze/gb-t-4880/master.svg?style=flat-square)](https://travis-ci.org/tourze/gb-t-4880)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-4880.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4880)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)

GB/T 4880 is a PHP package implementing the GB/T 4880.1-2005 language code standard. It provides an enum class containing all two-letter language codes defined by the standard, along with their Chinese labels.

## Features

- Implements the GB/T 4880.1-2005 standard
- Provides all two-letter language codes
- Includes corresponding Chinese labels
- Utilizes PHP 8.1+ enum features
- Implements `Labelable`, `Itemable`, and `Selectable` interfaces

## Requirements

- PHP 8.1 or higher
- [tourze/enum-extra](https://packagist.org/packages/tourze/enum-extra)

## Installation

```bash
composer require tourze/gb-t-4880
```

## Quick Start

```php
use Tourze\GBT4880\Alpha2Code;

// Get language code
$code = Alpha2Code::Chinese->value; // 'zh'

// Get Chinese label
$name = Alpha2Code::Chinese->getLabel(); // '汉语'
```

## Documentation

- All enum cases are defined by the GB/T 4880.1-2005 standard
- Use `getLabel()` to get the Chinese label
- Implements Labelable, Itemable, and Selectable interfaces for easy integration with the tourze/enum-extra ecosystem

## Contributing

- Issues and PRs are welcome
- Please follow PSR coding standards
- Ensure all tests pass before submitting

## License

MIT

## Author

tourze
