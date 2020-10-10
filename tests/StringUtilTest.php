<?php
declare(strict_types=1);
namespace innln\comm\tests;
use innln\comm\StringUtil;
use PHPUnit\Framework\TestCase;
/**
 * @covers \innln\comm\ArrayUnit
 *
 * 测试执行命令：.\vendor\bin\phpunit --bootstrap .\vendor\autoload.php .\tests\StringUtilTest
 */
class StringUtilTest extends TestCase
{
    /**
     * @dataProvider  provider
     */
    public function testContains($data): void {
        if ($data['s']) {
            $this->assertTrue(StringUtil::contains($data['o'], $data['t']), '包含对应字符串');
        } else {
            $this->assertFalse(StringUtil::contains($data['o'], $data['t']), '不包含对应字符串');
        }
    }
    /**
     * return array
     */
    public function provider() {
        return [
            [['o' => "hello world", 't' => 'hello', 's' => true]],
            [['o' => "hello world", 't' => 'qidian', 's' => false]],
        ];
    }
}