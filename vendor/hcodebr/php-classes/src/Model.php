<?php
/**
 * Created by PhpStorm.
 * User: Jeferson
 * Date: 06/03/2018
 * Time: 12:07
 */

namespace Hcode;


class Model
{
    private $values = [];

    public function __call($name, $args)
    {
        // TODO: Implement __call() method.
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method)
        {
            case "get":
                return $this->values[$fieldName];
                break;
            case "set":
                $this->values[$fieldName] = $args[0];
                break;
        }
    }

    public function setData($data = array())
    {
        foreach ($data as $key  => $value) {
            $this->{"set".$key}($value);
        }
    }

    public function getValues()
    {
        return $this->values;
    }
}