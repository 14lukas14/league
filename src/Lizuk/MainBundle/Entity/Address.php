<?php

namespace Lizuk\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="le_address")
 * @ORM\Entity
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(type="ProvinceType")
     */
    protected $province;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $street;

    /**
     * @var string
     * @ORM\Column(type="string", name="post_code_number")
     */
    protected $postCodeNumber;

    /**
     * @var string
     * @ORM\Column(type="string", name="post_code_city")
     */
    protected $postCodeCity;

    /**
     * @var integer
     *
     * @ORM\Column(type="smallint")
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $flat;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getPostCodeNumber()
    {
        return $this->postCodeNumber;
    }

    /**
     * @param string $postCodeNumber
     */
    public function setPostCodeNumber($postCodeNumber)
    {
        $this->postCodeNumber = $postCodeNumber;
    }

    /**
     * @return string
     */
    public function getPostCodeCity()
    {
        return $this->postCodeCity;
    }

    /**
     * @param string $postCodeCity
     */
    public function setPostCodeCity($postCodeCity)
    {
        $this->postCodeCity = $postCodeCity;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * @param string $flat
     */
    public function setFlat($flat)
    {
        $this->flat = $flat;
    }

}

