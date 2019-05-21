<?php

declare(strict_types=1);

namespace BEAR\CamelCaseKeyModule\Module;

use BEAR\CamelCaseKeyModule\FakeSnake;
use PHPUnit\Framework\TestCase;
use Ray\Di\Injector;

class CamelCaseKeyModuleTest extends TestCase
{
    public function testCamelCaseKey()
    {
        $ro = $this->getRo(FakeSnake::class);
        $ro->onGet();
        $view = (string) $ro;
        $expectedCamelKeyView = '{"name":{"firstName":"mucha","lastName":"alfons"},"specialRole":"advisor"}';
        $this->assertSame($expectedCamelKeyView, $view);
    }

    private function getRo(string $class) : FakeSnake
    {
        return (new Injector(new CamelCaseModule, __DIR__ . '/tmp'))->getInstance($class);
    }
}
