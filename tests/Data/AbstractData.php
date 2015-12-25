<?php
namespace Tests\Data;

abstract class AbstractData
{
    public function getAsArray($dataname)
    {
        return $this->{$dataname};
    }
    public function getAsObject($dataname)
    {
        $data = $this->{$dataname};
        $this->arrayToObject($data);

        return (array)$data;
    }
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
