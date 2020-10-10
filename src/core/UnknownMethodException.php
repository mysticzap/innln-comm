<?php
declare(strict_type=1);
namespace innln\comm\core;
/**
 * 调用未知方法异常
 */
class UnknownMethodException extends \BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unknown Method';
    }
}