<?php
declare(strict_types=1);
namespace innln\comm;

/**
 * 数据帮助类
 * 
 */
class ArrayUtil
{
    /**
     * 是否关联数组
     */
    public static function isAssoc(array $array): bool
    {
        $keys = array_keys($array);

        return array_keys($keys) !== $keys;
    }
    /**
     * 递归并排序
     * 
     */
    public static function sortRecursive(array $array): array
    {
        foreach ($array as &$value) {
            if (is_array($value)) {
                $value = static::sortRecursive($value);
            }
        }

        if (static::isAssoc($array)) {
            ksort($array);
        } else {
            sort($array);
        }

        return $array;
    }
}