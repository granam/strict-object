<?php
namespace Granam\Strict\Object\Exceptions;

class UnknownMethodCalledTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @test
	 * @expectedException \Granam\Strict\Object\Exceptions\Executing
	 */
	public function is_based_on_local_executing_exception()
	{
		throw new UnknownMethodCalled;
	}
}
