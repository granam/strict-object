<?php
namespace Granam\Strict\Object\Exceptions;

class UnknownPropertyReadTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\ReadingAccess
     */
    public function is_based_on_local_reading_access_exception()
    {
        throw new UnknownPropertyRead;
    }

}
