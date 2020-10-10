<?php
declare(strict_type=1);
namespace innln\oss\core;
/**
 * 无效调用异常
 */
class InvalidCallException extends \BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Call';
    }
}