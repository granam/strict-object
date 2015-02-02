<?php
namespace Granam\Strict\Object;

/**
 * Object
 * @package Granam
 */
trait StrictObjectTrait
{

	/**
	 * @param $name
	 * @throws Exceptions\UnknownPropertyRead
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
	 */
	public function __get($name)
	{
		throw new Exceptions\UnknownPropertyRead(\sprintf('Reading of property [%s->%s] fails. Does not exists or has restricted access.', \get_class($this), $name));
	}

	/**
	 * @param $name
	 * @param $value
	 * @throws Exceptions\UnknownPropertyWrite
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
	 */
	public function __set($name, $value)
	{
		throw new Exceptions\UnknownPropertyWrite(\sprintf('Writing to property [%s->%s] fails. Does not exists or has restricted access.', \get_class($this), $name));
	}

	/**
	 * @param $name
	 * @param array $arguments
	 * @throws Exceptions\UnknownMethodCalled
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
	 */
	public function __call($name, array $arguments)
	{
		throw new Exceptions\UnknownMethodCalled(\sprintf('Executing method [%s->%s()] fails. Does not exists or has restricted access.', \get_class($this), $name));
	}

	/**
	 * @param $name
	 * @param array $arguments
	 * @throws Exceptions\UnknownStaticMethodCalled
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.callstatic
	 */
	public static function __callStatic($name, array $arguments)
	{
		throw new Exceptions\UnknownStaticMethodCalled(\sprintf('Executing static method [%s->%s()] fails. Does not exists or has restricted access.', \get_called_class(), $name));
	}

	/**
	 * @throws Exceptions\UnknownMethodCalled
	 *
	 * @link http://php.net/manual/en/language.oop5.magic.php#object.invoke
	 */
	public function __invoke()
	{
		throw new Exceptions\UnknownMethodCalled(\sprintf('Calling object of class [%s] as method fails. Does not implements __invoke() method.', \get_called_class()));
	}
}
