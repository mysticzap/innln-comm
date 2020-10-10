<?php
declare(strict_type=1);
namespace innln\comm;

/**
 * 对象帮助类
 */
class ObjectUtil
{
    /**
     * 初始化对象属性
     * @param object $object the object to be configured
     * @param array $properties the property initial values given in terms of name-value pairs.
     * @return object the object
     */
    public static function configure(object $object, array $properties): object {
        foreach($properties as $name => $value) {
            $object->$name = $value;
        }
        return $object;
    }
    /**
     * 获得对象公共属性
     * This method is provided such that we can get the public member variables of an object.
     * It is different from "get_object_vars()" because the latter will return private
     * and protected variables if it is called within the object itself.
     * @param object $object the object to be handled
     * @return array the public member variables of the object
     */
    public static function getObjectVars(object $object){
        return \get_object_vars();
    }
}