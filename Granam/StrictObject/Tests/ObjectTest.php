<?php
namespace Granam\StrictObject\Tests;

class ObjectTest extends \PHPUnit_Framework_TestCase
{

	use StrictObjectTestTrait;

	/**
	 * @return \Granam\StrictObject\StrictObject
	 */
	protected function createObjectInstance()
	{
		// returns concrete object as a tested abstract one
		return new AnObject();
	}
}
