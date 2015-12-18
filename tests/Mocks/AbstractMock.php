<?php
namespace Tests\Mocks;

abstract class AbstractMock
{
    protected function arrayToObject(&$array)
    {
        if (!$array) {
            return;
        }

        if (is_array($array)) {
            foreach ($array as $key => &$item) {
                if (is_array($item)) {
                    $this->arrayToObject($item);
                }
            }
        }
        $array = (object)$array;
    }
}
