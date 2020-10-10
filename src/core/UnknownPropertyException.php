<?php
declare(strict_type=1);
namespace innln\comm\core;

class UnknownPropertyException extends \Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unknown Property';
    }
}