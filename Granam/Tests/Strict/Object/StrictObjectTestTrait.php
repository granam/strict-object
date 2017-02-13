<?php
namespace Granam\Tests\Strict\Object;

trait StrictObjectTestTrait
{
    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidMethodCall
     * @expectedExceptionMessageRegExp ~does not exist~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function callingUndefinedMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedMethodInspection */
        $object->notExistingMethod();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidMethodCall
     * @expectedExceptionMessageRegExp ~is protected~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function callingProtectedMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        $object->aProtectedMethod();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidMethodCall
     * @expectedExceptionMessageRegExp ~is private~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function callingPrivateMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        $object->aPrivateMethod();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidStaticMethodCall
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.callstatic
     */
    public function callingOfUndefinedStaticMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedMethodInspection */
        $object::notExistingMethod();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidMethodCall
     * @expectedExceptionMessageRegExp ~is protected~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function callingProtectedStaticMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        $object::aProtectedStaticMethod();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidMethodCall
     * @expectedExceptionMessageRegExp ~is private~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.call
     */
    public function callingPrivateStaticMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        $object::aPrivateStaticMethod();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidMethodCall
     * @link http://php.net/manual/en/language.oop5.magic.php#object.invoke
     */
    public function callingOfObjectItselfAsAMethodThrowsException()
    {
        $object = $this->createObjectInstance();
        $object();
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidPropertyRead
     * @expectedExceptionRegExp ~does not exists~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function readingOfAnUndefinedPropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->notExistingProperty;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidPropertyRead
     * @expectedExceptionRegExp ~is protected~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function readingOfAnProtectedPropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        $object->aProtectedProperty;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidPropertyRead
     * @expectedExceptionRegExp ~is private~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function readingOfAnPrivatePropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        $object->aPrivateProperty;
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidPropertyWrite
     * @expectedExceptionRegExp ~does not exists~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
     */
    public function writeToUndefinedPropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->notExistingProperty = 'bar';
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidPropertyWrite
     * @expectedExceptionRegExp ~is protected~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
     */
    public function writeToProtectedPropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->aProtectedProperty = 'bar';
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\InvalidPropertyWrite
     * @expectedExceptionRegExp ~is private~
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.set
     */
    public function writeToPrivatePropertyThrowsException()
    {
        $object = $this->createObjectInstance();
        /** @noinspection PhpUndefinedFieldInspection */
        $object->aPrivateProperty = 'bar';
    }

    /**
     * @test
     * @link http://php.net/manual/en/language.oop5.overloading.php#object.isset
     */
    public function askingIfIsSetUndefinedPropertyAlwaysReturnsFalse()
    {
        $objectWithPublicProperty = new AnObject();
        /** @noinspection UnSafeIsSetOverArrayInspection */
        self::assertTrue(
            isset($objectWithPublicProperty->aPublicProperty),
            'Magic __isset should not affects existing public properties'
        );
        /** @noinspection PhpUnitTestsInspection */
        self::assertFalse(
            empty($objectWithPublicProperty->aPublicProperty),
            'Magic __isset should not affects existing public properties'
        );

        $object = $this->createObjectInstance();
        self::assertFalse(isset($object->notExistingProperty));
        /** @noinspection PhpUnitTestsInspection */
        self::assertTrue(empty($object->notExistingProperty));
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\WritingAccess
     * @expectedExceptionRegExp ~does not exists~
     */
    public function unsetOfUndefinedPropertyThrowsWritingAccessException()
    {
        $object = $this->createObjectInstance();
        unset($object->notExistingProperty);
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\WritingAccess
     * @expectedExceptionRegExp ~is protected~
     */
    public function unsetOfProtectedPropertyThrowsWritingAccessException()
    {
        $object = $this->createObjectInstance();
        unset($object->aProtectedProperty);
    }

    /**
     * @test
     * @expectedException \Granam\Strict\Object\Exceptions\WritingAccess
     * @expectedExceptionRegExp ~is private~
     */
    public function unsetOfPrivatePropertyThrowsWritingAccessException()
    {
        $object = $this->createObjectInstance();
        unset($object->aPrivateProperty);
    }

    /** @return AnObject */
    abstract protected function createObjectInstance();

}