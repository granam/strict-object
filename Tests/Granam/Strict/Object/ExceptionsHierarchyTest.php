<?php
namespace Granam\Strict\Object;

use Granam\Exceptions\Tests\Tools\AbstractTestOfExceptionsHierarchy;

class ExceptionsHierarchyTest extends AbstractTestOfExceptionsHierarchy
{
	protected function getTestedNamespace()
	{
		return __NAMESPACE__;
	}

	protected function getRootNamespace()
	{
		return __NAMESPACE__;
	}
}
