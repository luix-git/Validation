<?php

namespace Runn\tests\Sanitization\Sanitizers\Boolean;

use Runn\Sanitization\Sanitizers\PassThru;

class PassThruTest extends \PHPUnit_Framework_TestCase
{

    public function testPassThru()
    {
        $sanitizer = new PassThru();

        $result = $sanitizer(true);
        $this->assertSame(true, $result);

        $result = $sanitizer(false);
        $this->assertSame(false, $result);

        $result = $sanitizer('');
        $this->assertSame('', $result);

        $result = $sanitizer('0');
        $this->assertSame('0', $result);

        $result = $sanitizer('foo');
        $this->assertSame('foo', $result);

        $result = $sanitizer(0);
        $this->assertSame(0, $result);

        $result = $sanitizer(42);
        $this->assertSame(42, $result);

        $result = $sanitizer([]);
        $this->assertSame([], $result);

        $result = $sanitizer([1, 2, 3]);
        $this->assertSame([1, 2, 3], $result);

        $obj = new class {};
        $result = $sanitizer($obj);
        $this->assertEquals($obj, $result);
    }

}