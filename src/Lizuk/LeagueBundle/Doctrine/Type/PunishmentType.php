<?php

namespace Lizuk\LeagueBundle\Doctrine\Type;

use Lizuk\MainBundle\Doctrine\Type\EnumType;

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-11-30
 * Time: 22:44
 */
class PunishmentType extends EnumType
{
    const MATCH = 'match';
    const SEASON= 'season';

    protected $name = 'punishment_type';

    protected static $choices = array(
        self::MATCH => 'Liczba meczów',
        self::SEASON => 'Do końca sezonu'
    );
}