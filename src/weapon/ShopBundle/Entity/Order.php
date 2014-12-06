<?php

namespace weapon\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity(repositoryClass="weapon\ShopBundle\Repository\OrderRepository")
 */
class Order
{
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_CLOSED = 'closed';
    const STATUS_CHANGED = 'changed';
    const STATUS_REJECTED = 'rejected';

    const CASH = 'cash';
    const CARD = 'card';
    const MONEY_TRANSFER = 'Money Transfer';
    const WEBMONEY = 'Webmoney';
    const PAYPAL = 'PayPal';
    const YANDEX_MONEY = 'Yandex Money';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \weapon\ShopBundle\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="\weapon\ShopBundle\Entity\Product", inversedBy="order")
     */
    private $product;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=500, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="method_of_payment", type="string", length=255)
     */
    private $methodOfPayment;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

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
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Order
     */

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get methodOfPayment
     *
     * @return string
     */
    public function getMethodOfPayment()
    {
        return $this->methodOfPayment;
    }

    /**
     * Set methodOfPayment
     *
     * @param string $methodOfPayment
     * @return Order
     */
    public function setMethodOfPayment($methodOfPayment)
    {
        $this->methodOfPayment = $methodOfPayment;
        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->getProduct()->getName();
    }

    /**
     * Get store
     *
     * @return \weapon\ShopBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set product
     *
     * @param \weapon\ShopBundle\Entity\Product $product
     * @return Order
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->getComment();
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Order
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

}