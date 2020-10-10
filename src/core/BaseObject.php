<?php
declare(strict_type=1);
namespace innln\comm\core;
/**
 * 基础对象
 */
class BaseObject Implements Configurable
{
    /**
     * 获得类名
     */
    public static function className(){
        return get_called_class();
    }
    /**
     * 构造函数
     */
    public function __construct($config = []){
        /**
         * 对象属性初始化
         */
        if(!empty($config)){
            ObjectUtil::configure($this, $config);
        }
        $this->init();
    }

    protected function init(){
        
    }
    /**
     * 获得属性值
     */
    public function __get($name){
        $getter = 'get' . $name;
        if(\method_exists($this, $getter)){
            return $this->$getter();
        } elseif(method_exists($this, 'set' . $name)) {
            throw new InvalidCallException('Getting write-only property: ' . get_class($this) . '::' . $name);
        }
        throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $name);
    }
    /**
     * 设置属性值
     */
    public function __set($name, $value){
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        } elseif (method_exists($this, 'get' . $name)) {
            throw new InvalidCallException('Setting read-only property: ' . get_class($this) . '::' . $name);
        } else {
            throw new UnknownPropertyException('Setting unknown property: ' . get_class($this) . '::' . $name);
        }
    }
    /**
     * 是否存在属性值，且不等于null
     */
    public function __isset($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter() !== null;
        }

        return false;
    }
    /**
     * unset属性值
     */
    public function __unset($name)
    {
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            $this->$setter(null);
        } elseif (method_exists($this, 'get' . $name)) {
            throw new InvalidCallException('Unsetting read-only property: ' . get_class($this) . '::' . $name);
        }
    }
    /**
     * 调用对象方法
     */
    public function __call($name, $params)
    {
        throw new UnknownMethodException('Calling unknown method: ' . get_class($this) . "::$name()");
    }
    /**
     * 是否存在对象属性
     */
    public function hasProperty($name, $checkVars = true)
    {
        return $this->canGetProperty($name, $checkVars) || $this->canSetProperty($name, false);
    }
    /**
     * 能否获得对象属性
     */
    public function canGetProperty($name, $checkVars = true)
    {
        return method_exists($this, 'get' . $name) || $checkVars && property_exists($this, $name);
    }
    /**
     * 能否设置属性
     */
    public function canSetProperty($name, $checkVars = true)
    {
        return method_exists($this, 'set' . $name) || $checkVars && property_exists($this, $name);
    }
    /**
     * 对象方法是否存在
     */
    public function hasMethod($name)
    {
        return method_exists($this, $name);
    }

}