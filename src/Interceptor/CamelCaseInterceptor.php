<?php

declare(strict_types=1);

namespace BEAR\CamelCaseKeyModule\Interceptor;

use BEAR\CamelCaseKeyModule\CamelCaseKey;
use BEAR\Resource\ResourceObject;
use Ray\Aop\MethodInterceptor;
use Ray\Aop\MethodInvocation;

final class CamelCaseInterceptor implements MethodInterceptor
{
    /**
     * @var CamelCaseKey
     */
    private $key;

    public function __construct(CamelCaseKey $key)
    {
        $this->key = $key;
    }

    /**
     * {@inheritdoc}
     */
    public function invoke(MethodInvocation $invocation)
    {
        /** @var ResourceObject $ro */
        $ro = $invocation->proceed();
        $ro->body = ($this->key)($ro->body);

        return $ro;
    }
}
