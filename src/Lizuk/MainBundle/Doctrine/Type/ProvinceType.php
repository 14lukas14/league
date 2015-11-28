<?php

namespace Lizuk\MainBundle\Doctrine\Type;

use Lizuk\MainBundle\Doctrine\Type\EnumType;

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-11-30
 * Time: 22:44
 */
class ProvinceType extends EnumType
{
    const DOLNOSLASKIE = 'dolnoslaskie';
    const WIELKOPOLSKIE = 'wielkopolskie';

    protected $name = 'province_type';

    protected static $choices = array(
        self::DOLNOSLASKIE => 'Dolnośląskie',
        self::WIELKOPOLSKIE => 'Wielkopolskie'
    );
}