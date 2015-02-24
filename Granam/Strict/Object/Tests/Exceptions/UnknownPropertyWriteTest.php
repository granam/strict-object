<?php
namespace Granam\Strict\Object\Exceptions;

class UnknownPropertyWriteTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\WritingAccess
     */
    public function is_based_on_local_writing_access_exception()
    {
        throw new UnknownPropertyWrite;
    }

}
