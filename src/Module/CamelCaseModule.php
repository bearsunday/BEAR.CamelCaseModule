<?php

declare(strict_types=1);

namespace BEAR\CamelCaseKeyModule\Module;

use BEAR\CamelCaseKeyModule\Annotation\CamelCase;
use BEAR\CamelCaseKeyModule\CamelCaseKey;
use BEAR\CamelCaseKeyModule\Interceptor\CamelCaseInterceptor;
use Ray\Di\AbstractModule;

class CamelCaseModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind(CamelCaseKey::class);
        $this->bindPriorityInterceptor(
            $this->matcher->annotatedWith(CamelCase::class),
            $this->matcher->startsWith('on'),
            [CamelCaseInterceptor::class]
        );
        $this->bindPriorityInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(CamelCase::class),
            [CamelCaseInterceptor::class]
        );
    }
}
