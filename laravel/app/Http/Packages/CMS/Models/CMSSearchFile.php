<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/27/17
 * Time: 1:55 AM
 */

namespace App\Http\Packages\CMS\Models;

/**
 * Class CMSSearchFile
 * @package App\Http\Packages\CMS\Models
 */
class CMSSearchFile
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $path;

    /**
     * CMSSearchFile constructor.
     * @param $name
     * @param $path
     */
    public function __construct($name, $path)
    {
        $this->name = $name;
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
}
