# GB/T 4880

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![PHP Version](https://img.shields.io/packagist/php-v/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![License](https://img.shields.io/packagist/l/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![Build Status](https://img.shields.io/travis/tourze/gb-t-4880/master.svg?style=flat-square)](https://travis-ci.org/tourze/gb-t-4880)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-4880.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4880)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/tourze/gb-t-4880.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4880)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)

GB/T 4880 is a PHP package implementing the GB/T 4880.1-2005 language code standard. It provides a comprehensive enum class containing all two-letter language codes defined by the standard, along with their corresponding Chinese labels.

This package is designed for applications that need to work with language codes according to Chinese national standards, offering both the ISO 639-1 compatible codes and localized Chinese names.

## Features

- **Standards Compliant**: Implements the GB/T 4880.1-2005 standard
- **Comprehensive**: Provides 180+ two-letter language codes
- **Localized**: Includes corresponding Chinese labels for all languages
- **Modern PHP**: Utilizes PHP 8.1+ enum features with strict typing
- **Framework Ready**: Implements `Labelable`, `Itemable`, and `Selectable` interfaces for easy integration
- **Select Options**: Built-in support for generating select/dropdown options
- **Type Safety**: Full type safety with enum-based implementation

## Requirements

- PHP 8.1 or higher
- [tourze/enum-extra](https://packagist.org/packages/tourze/enum-extra)

## Installation

```bash
composer require tourze/gb-t-4880
```

## Quick Start

### Basic Usage

```php
use Tourze\GBT4880\Alpha2Code;

// Get language code
$code = Alpha2Code::Chinese->value; // 'zh'

// Get Chinese label
$name = Alpha2Code::Chinese->getLabel(); // '汉语'

// Check if languages are the same
$isSame = Alpha2Code::Chinese === Alpha2Code::from('zh'); // true
```

### Advanced Usage

```php
// Create from string code
$language = Alpha2Code::from('en');
echo $language->getLabel(); // '英语'

// Safe creation (returns null for invalid codes)
$language = Alpha2Code::tryFrom('invalid');
if ($language === null) {
    echo "Invalid language code";
}

// Generate options for select elements
$options = Alpha2Code::genOptions();
// Returns: [['value' => 'zh', 'label' => '汉语'], ...]

// Convert to array
$data = Alpha2Code::French->toArray();
// Returns: ['value' => 'fr', 'label' => '法语']

// Convert to select item
$item = Alpha2Code::German->toSelectItem();
// Returns: ['value' => 'de', 'label' => '德语']
```

### Working with All Languages

```php
// Get all language codes
foreach (Alpha2Code::cases() as $language) {
    echo $language->value . ' => ' . $language->getLabel() . PHP_EOL;
}

// Filter languages (example: find all languages containing '语')
$languages = array_filter(Alpha2Code::cases(), function($lang) {
    return str_contains($lang->getLabel(), '语');
});
```

## API Reference

### Core Methods

- `Alpha2Code::from(string $value): Alpha2Code` - Create enum instance from language code
- `Alpha2Code::tryFrom(string $value): ?Alpha2Code` - Safe creation, returns null for invalid codes
- `getLabel(): string` - Get the Chinese label for the language
- `cases(): array` - Get all available language codes

### Interface Methods

- `toArray(): array` - Convert to associative array with 'value' and 'label' keys
- `toSelectItem(): array` - Alias for toArray(), useful for form select options
- `genOptions(): array` - Generate array of all languages as select options

### Special Cases

- Most language codes follow the ISO 639-1 standard (2 letters)
- Exception: Montenegrin uses 'cnr' (3 letters) as defined by GB/T 4880.1-2005
- All 180+ languages defined by the standard are included

## Integration

This package is designed to work seamlessly with the `tourze/enum-extra` ecosystem:

```php
// Works with form builders
$selectOptions = Alpha2Code::genOptions();

// Works with validation
$isValid = Alpha2Code::tryFrom($userInput) !== null;

// Works with serialization
$jsonData = json_encode(Alpha2Code::Chinese->toArray());
```

## Testing

```bash
# Run tests
composer test

# Run with coverage
composer test -- --coverage-text

# Run PHPStan analysis
composer phpstan
```

## Contributing

- Issues and PRs are welcome
- Please follow PSR-12 coding standards
- Ensure all tests pass before submitting
- Add tests for new features
- Update documentation when needed

## Standards Reference

- [GB/T 4880.1-2005 Standard][gb-t-4880-standard]
  Information and documentation -- Bibliographic data element directory -- Part 1: 2-letter codes
- [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639-1) - Codes for the representation of names of languages

## License

MIT

## Author

tourze

[gb-t-4880-standard]: https://github.com/Haixing-Hu/typesetting-standard/blob/master/%E8%AF%AD%E7%A7%8D%E5%8F%8A%E6%9C%89%E5%85%B3%E4%BB%A3%E7%A0%81/%E3%80%90GB%3AT%204880.1-2005%E3%80%91%E4%BF%A1%E6%81%AF%E4%B8%8E%E6%96%87%E7%8C%AE%20%E4%B9%A6%E7%9B%AE%E6%95%B0%E6%8D%AE%E5%85%83%E7%9B%AE%E5%BD%95%20%E7%AC%AC1%E9%83%A8%E5%88%86%EF%BC%9A2%E5%AD%97%E6%AF%8D%E4%BB%A3%E7%A0%81.pdf
