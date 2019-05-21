<?php

declare(strict_types=1);

namespace BEAR\CamelCaseKeyModule;

final class CamelCaseKey
{
    public function __invoke($array) : array
    {
        $keys = (array) array_map(function ($i) use (&$array) {
            if (is_array($array[$i])) {
                $array[$i] = $this->__invoke($array[$i]);
            }
            $parts = explode('_', $i);

            return array_shift($parts) . implode('', array_map('ucfirst', $parts));
        }, array_keys((array) $array));

        return (array) array_combine($keys, (array) $array);
    }
}
