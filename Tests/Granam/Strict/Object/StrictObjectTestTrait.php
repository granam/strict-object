<?php
namespace Tests\Granam\Strict\Object;

use Granam\Strict\Object\StrictObject;

trait StrictObjectTestTrait
{
    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\UnknownMethodCalled
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function callingUndefinedMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedMethodInspection */
        $object->foo();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\UnknownStaticMethodCalled
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.callstatic
     */
    public function callingOfUndefinedStaticMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedMethodInspection */
        $object::foo();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\UnknownMethodCalled
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
     * @expectedException \Granam\Strict\Object\Exceptions\UnknownPropertyRead
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function readingOfAnUndefinedPropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->foo;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\ReadingAccess
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function readingOfAnUndefinedPropertyThrowsReadingAccessException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->foo;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\UnknownPropertyWrite
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
     */
    public function writeToUndefinedPropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->foo = 'bar';
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\WritingAccess
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
     */
    public function writeToUndefinedPropertyThrowsWritingAccessException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->foo = 'bar';
    }

    /**
     * @test
     */
    public function knowsItsClassName()
    {
        /** @var \PHPUnit_Framework_TestCase|StrictObjectTestTrait $this */
        $this->assertSame('Granam\Strict\Object\StrictObject', StrictObject::getClass());
        $object = $this->createObjectInstance();
        $this->assertSame(get_class($object), $object::getClass());

    }

    /** @return StrictObject */
    abstract protected function createObjectInstance();

}
