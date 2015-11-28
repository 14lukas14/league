<?php

namespace Lizuk\MainBundle\Doctrine\Type;

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-11-30
 * Time: 22:44
 */
class ColorType extends EnumType
{
    const RED = 'red';
    const YELLOW = 'yellow';
    const BLUE = 'blue';

    protected $name = 'color_type';

    protected static $choices = array(
        self::RED => 'czerwony',
        self::YELLOW => 'żółty',
        self::BLUE => 'niebieski'
    );
}