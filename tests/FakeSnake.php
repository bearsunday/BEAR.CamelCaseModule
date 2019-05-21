<?php

declare(strict_types=1);

namespace BEAR\CamelCaseKeyModule;

use BEAR\CamelCaseKeyModule\Annotation\CamelCase;
use BEAR\Resource\ResourceObject;

/**
 * @CamelCase
 */
class FakeSnake extends ResourceObject
{
    public function onGet()
    {
        $this->body = [
            'name' => [
                'first_name' => 'mucha',
                'last_name' => 'alfons'
            ],
            'special_role' => 'advisor'
        ];

        return $this;
    }
}
