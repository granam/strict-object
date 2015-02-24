<?php
namespace Granam\Strict\Object\Exceptions;

class WritingAccessTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\Access
     */
    public function is_based_on_local_access_exception()
    {
        throw new WritingAccess;
    }

}
