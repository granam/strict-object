<?php
namespace Granam\Strict\Object\Exceptions;

class AccessTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\Access
     */
    public function can_be_thrown()
    {
        throw new Access;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\Runtime
     */
    public function is_based_on_local_runtime_exception()
    {
        throw new Access;
    }

    /**
     * @test
     * @expectedException \OutOfBoundsException
     */
    public function is_based_on_standard_out_of_bounds_exception()
    {
        throw new Access;
    }
}
