<?php
namespace Granam\StrictObject\Tests;

class ObjectTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\UnknownMethodCalled
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
	 */
	public function callingUndefinedMethodThrowsException()
	{
		$object = $this->createObjectInstance();
		$object->foo();
	}

	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\UnknownStaticMethodCalled
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.callstatic
	 */
	public function callingOfUndefinedStaticMethodThrowsException()
	{
		$object = $this->createObjectInstance();
		$object::foo();
	}

	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\UnknownMethodCalled
	 *
	 * @link http://php.net/manual/en/language.oop5.magic.php#object.invoke
	 */
	public function callingOfObjectItselfAsAMethodThrowsException()
	{
		$object = $this->createObjectInstance();
		$object();
	}

	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\UnknownPropertyRead
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
	 */
	public function readingOfAnUndefinedPropertyThrowsException()
	{
		$object = $this->createObjectInstance();
		$object->foo;
	}

	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\ReadingAccess
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
	 */
	public function readingOfAnUndefinedPropertyThrowsReadingAccessException()
	{
		$object = $this->createObjectInstance();
		$object->foo;
	}

	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\UnknownPropertyWrite
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
	 */
	public function writeToUndefinedPropertyThrowsException()
	{
		$object = $this->createObjectInstance();
		$object->foo = 'bar';
	}

	/**
	 * @test
	 * @expectedException \Granam\StrictObject\Exceptions\WritingAccess
	 *
	 * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
	 */
	public function writeToUndefinedPropertyThrowsWrittingAccessException()
	{
		$object = $this->createObjectInstance();
		$object->foo = 'bar';
	}

	/**
	 * @return \Granam\StrictObject\StrictObject
	 */
	private function createObjectInstance()
	{
		// returns concrete object as a tested abstract one
		return new AnObject();
	}
}
