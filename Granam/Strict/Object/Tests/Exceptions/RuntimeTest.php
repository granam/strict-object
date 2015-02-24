<?php
namespace Granam\Strict\Object\Exceptions;

class RuntimeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\Runtime
     */
    public function can_mark_an_exception()
    {
        throw new TestRuntime;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\Exception
     */
    public function is_marked_by_local_interface()
    {
        throw new TestRuntime;
    }

    /**
     * @test
     * @expectedException \Granam\Exceptions\Runtime
     */
    public function is_marked_by_granam_runtime_interface()
    {
        throw new TestRuntime;
    }
}

/** inner */
class TestRuntime extends \Exception implements Runtime {

}
