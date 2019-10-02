<?php

namespace Icawebdesign\StringEntities\Tests;

use Icawebdesign\StringEntities\StringEntities;
use PHPUnit\Framework\TestCase;

class StringEntitiesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /** @test */
    public function converts_email_address(): void
    {
        $email = 'test@example.com';

        $str = StringEntities::email($email);

        $this->assertSame(
            '%74%65%73%74%40&#x65;&#x78;&#x61;&#x6d;&#x70;&#x6c;&#x65;&#x2e;&#x63;&#x6f;&#x6d;',
            $str
        );
    }

    /** @test */
    public function converts_to_htmlentities(): void
    {
        $string = 'This is a string';
        $str = StringEntities::htmlentities($string);

        $this->assertSame(
            '&#x54;&#x68;&#x69;&#x73;&#x20;&#x69;&#x73;&#x20;&#x61;&#x20;&#x73;&#x74;&#x72;&#x69;&#x6e;&#x67;',
            $str
        );
    }

    /** @test */
    public function converts_to_htmlhex(): void
    {
        $string = 'This is a string';
        $str = StringEntities::htmlhex($string);

        $this->assertSame(
            '%54%68%69%73%20%69%73%20%61%20%73%74%72%69%6e%67',
            $str
        );
    }
}
