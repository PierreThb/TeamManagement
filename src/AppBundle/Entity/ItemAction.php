<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 29/04/2016
 * Time: 19:19
 *
 * This file contains the entity ItemAction
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;
use AppBundle\Entity\MinuteItem;

/**
 * ItemAction is the entity for each
 * action which can be performed on an
 * item and is defined by the related item,
 * the state of the action, a description,
 * an implementer and a deadline.
 *
 * @ORM\Table(name="item_action")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemActionRepository")
 */
class ItemAction
{
    /**
     * if of the ItemAction
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Item related to the ItemAction
     *
     * @var MinuteItem
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MinuteItem",inversedBy="action")
     * @ORM\JoinColumn(name="item_id",referencedColumnName="id")
     */
    private $item;

    /**
     * possible values are:
     * - "in_progress"
     * - "late"
     * - "work_under_review"
     * - "complete"
     * - "no_longer_required"
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $state;

    /**
     * Description of the ItemAction
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * Implementer of the ItemAction
     *
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="implementer_id",referencedColumnName="id")
     */
    private $implementer;

    /**
     * Deadline to accomplish the ItemAction
     *
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $deadline;

    /**
     * ItemAction constructor.
     */
    public function __construct()
    {
        $this->state = "in_progress";
        $this->description= "";
    }

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
     * Set state
     *
     * @param string $state
     *
     * @return ItemAction
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ItemAction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return ItemAction
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set item
     *
     * @param \AppBundle\Entity\MinuteItem $item
     *
     * @return ItemAction
     */
    public function setItem(\AppBundle\Entity\MinuteItem $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \AppBundle\Entity\MinuteItem
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set implementer
     *
     * @param \AppBundle\Entity\User $implementer
     *
     * @return ItemAction
     */
    public function setImplementer(\AppBundle\Entity\User $implementer = null)
    {
        $this->implementer = $implementer;

        return $this;
    }

    /**
     * Get implementer
     *
     * @return \AppBundle\Entity\User
     */
    public function getImplementer()
    {
        return $this->implementer;
    }
}
