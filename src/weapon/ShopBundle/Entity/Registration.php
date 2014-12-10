<?php
namespace weapon\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use weapon\ShopBundle\Entity\User;

class Registration
{
    /**
     * @Assert\Type(type="weapon\ShopBundle\Entity\User")
     * @Assert\Valid()
     */
    protected $user;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean)$termsAccepted;
    }
}