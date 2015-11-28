<?php

namespace Lizuk\MainBundle\Doctrine\Type;

use Lizuk\MainBundle\Doctrine\Type\EnumType;

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-11-30
 * Time: 23:57
 */
class GenderType extends EnumType
{
    const WOMAN = 'woman';
    const MAN = 'man';

    protected $name = 'gender_type';

    protected static $choices = array(
        self::MAN => 'Mężczyzna',
        self::WOMAN => 'Kobieta'
    );
}