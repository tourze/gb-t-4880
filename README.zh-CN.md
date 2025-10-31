# GB/T 4880

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![PHP Version](https://img.shields.io/packagist/php-v/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![License](https://img.shields.io/packagist/l/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)
[![Build Status](https://img.shields.io/travis/tourze/gb-t-4880/master.svg?style=flat-square)](https://travis-ci.org/tourze/gb-t-4880)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-4880.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4880)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/tourze/gb-t-4880.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4880)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-4880.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4880)

GB/T 4880 是一个实现 GB/T 4880.1-2005 语言代码标准的 PHP 包，提供了标准中全部双字母语言代码及其中文名称的完整枚举类。

该包专为需要使用中国国家标准语言代码的应用程序设计，提供与 ISO 639-1 兼容的代码以及本地化的中文名称。

## 特性

- **标准合规**：实现 GB/T 4880.1-2005 标准
- **功能完整**：提供 180+ 种双字母语言代码
- **本地化**：包含所有语言的对应中文名称
- **现代 PHP**：使用 PHP 8.1+ 枚举特性和严格类型
- **框架就绪**：实现 `Labelable`、`Itemable`、`Selectable` 接口便于集成
- **选择选项**：内置支持生成选择/下拉框选项
- **类型安全**：基于枚举实现的完整类型安全

## 环境要求

- PHP 8.1 或更高版本
- 依赖 [tourze/enum-extra](https://packagist.org/packages/tourze/enum-extra)

## 安装

```bash
composer require tourze/gb-t-4880
```

## 快速开始

### 基本用法

```php
use Tourze\GBT4880\Alpha2Code;

// 获取语言代码
$code = Alpha2Code::Chinese->value; // 'zh'

// 获取中文名称
$name = Alpha2Code::Chinese->getLabel(); // '汉语'

// 检查语言是否相同
$isSame = Alpha2Code::Chinese === Alpha2Code::from('zh'); // true
```

### 高级用法

```php
// 从字符串代码创建
$language = Alpha2Code::from('en');
echo $language->getLabel(); // '英语'

// 安全创建（无效代码返回 null）
$language = Alpha2Code::tryFrom('invalid');
if ($language === null) {
    echo "无效的语言代码";
}

// 生成选择元素的选项
$options = Alpha2Code::genOptions();
// 返回：[['value' => 'zh', 'label' => '汉语'], ...]

// 转换为数组
$data = Alpha2Code::French->toArray();
// 返回：['value' => 'fr', 'label' => '法语']

// 转换为选择项
$item = Alpha2Code::German->toSelectItem();
// 返回：['value' => 'de', 'label' => '德语']
```

### 处理所有语言

```php
// 获取所有语言代码
foreach (Alpha2Code::cases() as $language) {
    echo $language->value . ' => ' . $language->getLabel() . PHP_EOL;
}

// 过滤语言（示例：查找包含'语'的所有语言）
$languages = array_filter(Alpha2Code::cases(), function($lang) {
    return str_contains($lang->getLabel(), '语');
});
```

## API 参考

### 核心方法

- `Alpha2Code::from(string $value): Alpha2Code` - 从语言代码创建枚举实例
- `Alpha2Code::tryFrom(string $value): ?Alpha2Code` - 安全创建，无效代码返回 null
- `getLabel(): string` - 获取语言的中文名称
- `cases(): array` - 获取所有可用的语言代码

### 接口方法

- `toArray(): array` - 转换为包含 'value' 和 'label' 键的关联数组
- `toSelectItem(): array` - toArray() 的别名，适用于表单选择选项
- `genOptions(): array` - 生成所有语言的选择选项数组

### 特殊情况

- 大多数语言代码遵循 ISO 639-1 标准（2个字母）
- 例外：黑山语使用 'cnr'（3个字母），如 GB/T 4880.1-2005 标准所定义
- 包含标准定义的全部 180+ 种语言

## 集成

该包设计为与 `tourze/enum-extra` 生态系统无缝协作：

```php
// 与表单构建器配合使用
$selectOptions = Alpha2Code::genOptions();

// 与验证配合使用
$isValid = Alpha2Code::tryFrom($userInput) !== null;

// 与序列化配合使用
$jsonData = json_encode(Alpha2Code::Chinese->toArray());
```

## 测试

```bash
# 运行测试
composer test

# 运行覆盖率测试
composer test -- --coverage-text

# 运行 PHPStan 分析
composer phpstan
```

## 贡献指南

- 欢迎提交 Issue 与 PR
- 请遵循 PSR-12 代码规范
- 提交前请确保通过所有测试
- 为新功能添加测试
- 需要时更新文档

## 标准参考

- [GB/T 4880.1-2005 标准][gb-t-4880-standard]
  信息与文献 书目数据元目录 第1部分：2字母代码
- [ISO 639-1](https://en.wikipedia.org/wiki/ISO_639-1) - 语言名称表示代码

## 许可证

MIT

## 作者

tourze

[gb-t-4880-standard]: https://github.com/Haixing-Hu/typesetting-standard/blob/master/%E8%AF%AD%E7%A7%8D%E5%8F%8A%E6%9C%89%E5%85%B3%E4%BB%A3%E7%A0%81/%E3%80%90GB%3AT%204880.1-2005%E3%80%91%E4%BF%A1%E6%81%AF%E4%B8%8E%E6%96%87%E7%8C%AE%20%E4%B9%A6%E7%9B%AE%E6%95%B0%E6%8D%AE%E5%85%83%E7%9B%AE%E5%BD%95%20%E7%AC%AC1%E9%83%A8%E5%88%86%EF%BC%9A2%E5%AD%97%E6%AF%8D%E4%BB%A3%E7%A0%81.pdf
