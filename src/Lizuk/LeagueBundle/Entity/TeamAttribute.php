<?php
/**
 * Created by PhpStorm.
 * User: 14Lukas14
 * Date: 2015-12-02
 * Time: 18:24
 */

namespace Lizuk\LeagueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lizuk\MainBundle\Entity\Attribute;

/**
 * Class UserAttribute
 *
 * @ORM\Entity
 * @ORM\Table(name="le_team_attribute")
 */
class TeamAttribute extends Attribute
{
    /**
     * @var Team
     *
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="attributes", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false, name="team_id", referencedColumnName="id")
     */
    protected $team;

    public function __construct(Team $team, $name, $value)
    {
        $this->team = $team;

        parent::__construct($name, $value);
    }
}