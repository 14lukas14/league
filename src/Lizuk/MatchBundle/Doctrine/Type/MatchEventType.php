<?php

namespace Lizuk\MatchBundle\Doctrine\Type;

use Lizuk\MainBundle\Doctrine\Type\EnumType;

/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-11-30
 * Time: 22:44
 */
class MatchEventType extends EnumType
{
    const GOAL = 'goal';
    const YELLOW_CARD = 'yellow_card';
    const RED_CARD = 'red_card';
    const PENALTY = 'penalty';
    const BREAK_MATCH = 'break_match';
    const START_MATCH = 'start_match';
    const END_MATCH = 'end_match';
    const START_HALF = 'start_half';

    protected $name = 'match_event_type';

    protected static $choices = array(
        self::GOAL => 'Bramka',
        self::YELLOW_CARD => 'Żółta kartka',
        self::RED_CARD => 'Czerwona kartka',
        self::PENALTY => 'Rzut karny',
        self::BREAK_MATCH => 'Przerwanie meczu',
        self::START_MATCH => 'Rozpoczęcie meczu',
        self::END_MATCH => 'Zakończenie meczu',
        self::START_HALF => 'Rozpoczęcie drugiej połowy'
    );
}