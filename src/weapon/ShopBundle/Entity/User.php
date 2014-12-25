<?php

namespace weapon\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContext;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class User
{
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="plainPassword", type="string", length=255)
//     * @Assert\NotBlank()
//     * @Assert\Length(max = 4096)
//     */
//    protected $plainPassword;
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;
    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;
    /**
     * @var string
     *
     * @ORM\Column(name="cardNumber", type="string", length=16)
     */
    private $cardNumber;

    /**
     * Get id
     *
     * @return integer
     */
    /**
     * @var string
     *
     * @ORM\Column(name="CVC_code", type="integer", length=3)
     */
    private $CVCCode;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get email
     *
     * @return integer
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param integer $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        if (in_array($country, ['UA'])) {
            throw new \Exception('Due to the situation in the country you have got a discount as the opt buyer! Слава Україні!');
        } elseif (in_array($country, ['RUS'])) {
            throw new \Exception('Due to the situation in the country multiply your price by two! Хто не скаче, той москаль!');
        }

        $this->country = $country;
        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     * @return User
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * Get CVCCode
     *
     * @return string
     */
    public function getCVCCode()
    {
        return $this->CVCCode;
    }

    /**
     * Set CVCCode
     *
     * @param integer $CVCCode
     * @return User
     */
    public function setCVCCode($CVCCode)
    {
        $this->CVCCode = $CVCCode;
        return $this;
    }

//    /**
//     * Get plainPassword
//     *
//     * @return string
//     */
//    public function getPlainPassword()
//    {
//        return $this->plainPassword;
//    }
//
//    /**
//     * Set plainPassword
//     *
//     * @param string $plainPassword
//     * @return User
//     */
//    public function setPlainPassword($plainPassword)
//    {
//        $this->plainPassword = $plainPassword;
//        return $this;
//    }
}