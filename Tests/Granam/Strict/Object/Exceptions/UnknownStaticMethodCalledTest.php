<?php
namespace Granam\Strict\Object\Exceptions;

class UnknownStaticMethodCalledTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @test
	 * @expectedException \Granam\Strict\Object\Exceptions\UnknownMethodCalled
	 */
	public function is_based_on_local_unknown_method_called_exception()
	{
		throw new UnknownStaticMethodCalled;
	}
}
