<?php

namespace Tourze\GBT4880\Tests;

use PHPUnit\Framework\TestCase;
use Tourze\GBT4880\Alpha2Code;

/**
 * GB/T 4880.1-2005 语言代码标准测试
 */
class Alpha2CodeTest extends TestCase
{
    /**
     * 测试特定语言的枚举值是否符合ISO 639-1标准
     */
    public function testSpecificLanguageCodes()
    {
        $this->assertSame('zh', Alpha2Code::Chinese->value);
        $this->assertSame('en', Alpha2Code::English->value);
        $this->assertSame('fr', Alpha2Code::French->value);
        $this->assertSame('de', Alpha2Code::German->value);
        $this->assertSame('ja', Alpha2Code::Japanese->value);
        $this->assertSame('ru', Alpha2Code::Russian->value);
        $this->assertSame('es', Alpha2Code::Spanish->value);
        $this->assertSame('ar', Alpha2Code::Arabic->value);
        $this->assertSame('cnr', Alpha2Code::Montenegrin->value, "黑山语不正确");
    }

    /**
     * 测试大多数枚举值都是有效的两字母语言代码
     */
    public function testMostValuesAreTwoLetterCodes()
    {
        $exceptions = ['cnr']; // 已知例外的语言代码

        foreach (Alpha2Code::cases() as $case) {
            if (in_array($case->value, $exceptions)) {
                continue; // 跳过已知例外
            }
            $this->assertMatchesRegularExpression('/^[a-z]{2}$/', $case->value, "语言代码 {$case->name} 不是有效的两字母代码");
        }
    }

    /**
     * 测试枚举包含的语言代码数量
     */
    public function testEnumCasesCount()
    {
        // GB/T 4880.1-2005标准中包含的语言代码数量
        $cases = Alpha2Code::cases();
        $this->assertGreaterThan(170, count($cases), '枚举值数量少于预期');
        $this->assertLessThan(190, count($cases), '枚举值数量超出预期');
    }

    /**
     * 测试特定语言的getLabel方法返回值
     */
    public function testSpecificLabels()
    {
        $this->assertSame('汉语', Alpha2Code::Chinese->getLabel());
        $this->assertSame('英语', Alpha2Code::English->getLabel());
        $this->assertSame('法语', Alpha2Code::French->getLabel());
        $this->assertSame('德语', Alpha2Code::German->getLabel());
        $this->assertSame('日语', Alpha2Code::Japanese->getLabel());
        $this->assertSame('俄语', Alpha2Code::Russian->getLabel());
        $this->assertSame('西班牙语', Alpha2Code::Spanish->getLabel());
        $this->assertSame('阿拉伯语', Alpha2Code::Arabic->getLabel());
    }

    /**
     * 测试所有枚举值都有非空的中文标签
     */
    public function testAllLabelsAreNonEmpty()
    {
        foreach (Alpha2Code::cases() as $case) {
            try {
                $label = $case->getLabel();
                $this->assertNotEmpty($label, "枚举值 {$case->name} 返回空标签");
                $this->assertIsString($label, "枚举值 {$case->name} 的标签不是字符串");
            } catch (\UnhandledMatchError $e) {
                $this->fail("枚举值 {$case->name} 未在getLabel方法中处理");
            }
        }
    }

    /**
     * 测试Itemable接口基本功能
     */
    public function testItemableInterface()
    {
        // 验证Alpha2Code实现了Itemable接口
        $this->assertTrue(
            is_subclass_of(Alpha2Code::class, 'Tourze\EnumExtra\Itemable'),
            'Alpha2Code没有实现Itemable接口'
        );
    }

    /**
     * 测试Selectable接口基本功能
     */
    public function testSelectableInterface()
    {
        // 验证Alpha2Code实现了Selectable接口
        $this->assertTrue(
            is_subclass_of(Alpha2Code::class, 'Tourze\EnumExtra\Selectable'),
            'Alpha2Code没有实现Selectable接口'
        );
    }

    /**
     * 测试通过获取不同语言代码实例的方式使用枚举
     */
    public function testEnumInstanceUsage()
    {
        // 测试通过枚举值获取实例
        $chinese = Alpha2Code::from('zh');
        $this->assertInstanceOf(Alpha2Code::class, $chinese);
        $this->assertSame(Alpha2Code::Chinese, $chinese);

        // 测试枚举比较
        $this->assertTrue(Alpha2Code::Chinese === Alpha2Code::from('zh'));
        $this->assertFalse(Alpha2Code::Chinese === Alpha2Code::from('en'));

        // 测试tryFrom方法（在无效值的情况下返回null而不是抛出异常）
        $this->assertNull(Alpha2Code::tryFrom('invalid_code'));
    }

    /**
     * 测试非标准代码Montenegrin的特殊情况
     */
    public function testMontenegrinException()
    {
        $this->assertSame('cnr', Alpha2Code::Montenegrin->value);
        $this->assertSame('黑山语', Alpha2Code::Montenegrin->getLabel());
    }
}
