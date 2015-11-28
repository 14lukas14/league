<?php
/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-11-30
 * Time: 22:55
 */

namespace Lizuk\MainBundle\Doctrine\Type;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class EnumType extends AbstractEnumType
{
    protected static $icons  = array();
    protected static $labels = array();

    public static function getIconClass($value)
    {
        if (!isset(static::$icons[$value])) {
            $message = sprintf('Icon not found for value "%s" ENUM type "%s"', $value, get_called_class());

            throw new \InvalidArgumentException($message);
        }
        return static::$icons[$value];
    }

    public static function getLabelClass($value)
    {
        if (!isset(static::$labels[$value])) {
            $message = sprintf('Label not found for value "%s" ENUM type "%s"', $value, get_called_class());

            throw new \InvalidArgumentException($message);
        }
        return static::$labels[$value];
    }

    public static function getIcons()
    {
        return static::$icons;
    }
}