<?php
namespace Granam\Tests\Strict\Object;

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
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.isset
     */
    public function askingIfIsSetUndefinedPropertyAlwaysReturnsFalse()
    {
        $objectWithPublicProperty = new AnObject();
        /** @noinspection UnSafeIsSetOverArrayInspection */
        self::assertTrue(isset($objectWithPublicProperty->whoAmI), 'Magic __isset should not affects existing public properties');
        /** @noinspection PhpUnitTestsInspection */
        self::assertFalse(empty($objectWithPublicProperty->whoAmI), 'Magic __isset should not affects existing public properties');
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        self::assertFalse(isset($object->foo));
        /** @noinspection PhpUnitTestsInspection */
        self::assertTrue(empty($object->foo));
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\WritingAccess
     *
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.unset
     */
    public function unsetOfUndefinedPropertyThrowsWritingAccessException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        unset($object->foo);
    }

    /** @return StrictObject */
    abstract protected function createObjectInstance();

}