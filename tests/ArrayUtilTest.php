<?php
declare(strict_types=1);
namespace innln\comm\tests;
use innln\comm\ArrayUtil;
use PHPUnit\Framework\TestCase;
/**
 * @covers \innln\comm\ArrayUnit
 *
 * 测试执行命令：.\vendor\bin\phpunit --bootstrap .\vendor\autoload.php .\tests\ArrayUtilTest
 */
class ArrayUtilTest extends TestCase
{
    /**
     * @dataProvider  provider
     */
    public function testIsAssoc($data): void {
        $this->assertTrue(ArrayUtil::isAssoc($data));
    }
    /**
     * return array
     */
    public function provider() {
        return [
            [["id"=>23]],
            [[389]],
            [["ia" => 3]]
        ];
    }
}