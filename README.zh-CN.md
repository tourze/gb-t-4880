# GB/T 4880

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![Build Status](https://img.shields.io/travis/tourze/gb-t-4880/master.svg?style=flat-square)](https://travis-ci.org/tourze/gb-t-4880)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-4880.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4880)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)

GB/T 4880 是一个实现 GB/T 4880.1-2005 语言代码标准的 PHP 包，提供了标准中全部双字母语言代码及其中文名称的枚举类。

## 特性

- 实现 GB/T 4880.1-2005 标准
- 提供所有双字母语言代码
- 包含对应中文名称
- 使用 PHP 8.1+ 枚举特性
- 实现 `Labelable`、`Itemable`、`Selectable` 接口

## 环境要求

- PHP 8.1 或更高版本
- 依赖 [tourze/enum-extra](https://packagist.org/packages/tourze/enum-extra)

## 安装

```bash
composer require tourze/gb-t-4880
```

## 快速开始

```php
use Tourze\GBT4880\Alpha2Code;

// 获取语言代码
$code = Alpha2Code::Chinese->value; // 'zh'

// 获取中文名称
$name = Alpha2Code::Chinese->getLabel(); // '汉语'
```

## 详细文档

- 所有枚举项均为 GB/T 4880.1-2005 标准定义的语言代码
- 通过 `getLabel()` 获取中文名称
- 实现了 Labelable、Itemable、Selectable 接口，便于与 tourze/enum-extra 生态集成

## 贡献指南

- 欢迎提交 Issue 与 PR
- 请遵循 PSR 代码规范
- 提交前请确保通过所有测试

## 协议

MIT

## 作者

tourze
