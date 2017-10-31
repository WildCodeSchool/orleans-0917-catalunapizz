<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 30/10/17
 * Time: 13:24
 */

namespace Cataluna\Model;


class Upload
{
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Upload
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}