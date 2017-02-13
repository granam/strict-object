<?php
namespace Granam\Strict\Object;

trait StrictObjectTrait
{

    /**
     * @param string $name
     * @throws Exceptions\UnknownPropertyRead
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function __get($name)
    {
        $reason = 'Does not exist';
        if (property_exists($this, $name)) {
            $reason = 'Has restricted access';
            if ((new \ReflectionProperty($this, $name))->isProtected()) {
                $reason .= ' (is protected)';
            } else {
                $reason .= ' (is private)';
            }
        }
        throw new Exceptions\UnknownPropertyRead(
            \sprintf('Reading of property [%s->%s] fails. %s.', \get_class($this), $name, $reason)
        );
    }

    /** @noinspection MagicMethodsValidityInspection */
    /**
     * @param string $name
     * @param $value
     * @throws Exceptions\UnknownPropertyWrite
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
     */
    public function __set($name, $value)
    {
        $reason = 'Does not exist';
        if (property_exists($this, $name)) {
            $reason = 'Has restricted access';
            if ((new \ReflectionProperty($this, $name))->isProtected()) {
                $reason .= ' (is protected)';
            } else {
                $reason .= ' (is private)';
            }
        }
        throw new Exceptions\UnknownPropertyWrite(
            \sprintf('Writing to property [%s->%s] fails. %s.', \get_class($this), $name, $reason)
        );
    }

    /**
     * @param string $name
     * @throws Exceptions\UnknownPropertyWrite
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.unset
     */
    public function __unset($name)
    {
        $reason = 'Does not exist';
        if (property_exists($this, $name)) {
            $reason = 'has restricted access';
            if ((new \ReflectionProperty($this, $name))->isProtected()) {
                $reason .= ' (is protected)';
            } else {
                $reason .= ' (is private)';
            }
        }
        throw new Exceptions\UnknownPropertyWrite(
            \sprintf('Unset of property [%s->%s] fails. %s.', \get_class($this), $name, $reason)
        );
    }

    /**
     * @param $name
     * @param array $arguments
     * @throws Exceptions\UnknownMethodCalled
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function __call($name, array $arguments)
    {
        $reason = 'does not exist';
        if (method_exists($this, $name)) {
            $reason = 'has restricted access';
            if ((new \ReflectionMethod($this, $name))->isProtected()) {
                $reason .= ' (is protected)';
            } else {
                $reason .= ' (is private)';
            }
        }
        throw new Exceptions\UnknownMethodCalled(\sprintf('Method [%s->%s()] %s.', \get_class($this), $name, $reason));
    }

    /**
     * @param string $name
     * @param array $arguments
     * @throws Exceptions\UnknownStaticMethodCalled
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.callstatic
     */
    public static function __callStatic($name, array $arguments)
    {
        $reason = 'does not exist';
        if (method_exists(static::class, $name)) {
            $reason = 'has restricted access';
            if ((new \ReflectionMethod(static::class, $name))->isProtected()) {
                $reason .= ' (is protected)';
            } else {
                $reason .= ' (is private)';
            }
        }
        throw new Exceptions\UnknownStaticMethodCalled(
            \sprintf('Static method [%s::%s()] %s.', \get_called_class(), $name, $reason)
        );
    }

    /**
     * @throws Exceptions\UnknownMethodCalled
     * @link http://php.net/manual/en/language.oop5.magic.php#object.invoke
     */
    public function __invoke()
    {
        throw new Exceptions\UnknownMethodCalled(
            \sprintf(
                'Calling object of class [%s] as a function fails. It does not implement the __invoke() method.',
                \get_called_class()
            )
        );
    }
}