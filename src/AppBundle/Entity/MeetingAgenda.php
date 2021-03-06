<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 26/04/2016
 * Time: 22:27
 *
 * This file contains the MeetingAgenda entity
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Each meeting has a MeetingAgenda.
 * It is defined by the related meeting
 * ad set of items.
 *
 * @ORM\Table(name="meetingagenda")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MeetingAgendaRepository")
 */
class MeetingAgenda
{
    /**
     * Id for the MeetingAgenda
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Meeting related to the MeetingAgenda
     *
     * @var Meeting
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Meeting")
     * @ORM\JoinColumn(nullable=false)
     */
    private $meeting;

    /**
     * Array containing all the item of the MeetingAgenda
     *
     * @var ArrayCollection
     *
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\Item",mappedBy="agenda",cascade={"persist","remove"})
     */
    private $items;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * Set meeting
     *
     * @param \AppBundle\Entity\Meeting $meeting
     *
     * @return MeetingAgenda
     */
    public function setMeeting(Meeting $meeting)
    {
        $this->meeting = $meeting;

        return $this;
    }

    /**
     * Get meeting
     *
     * @return \AppBundle\Entity\Meeting
     */
    public function getMeeting()
    {
        return $this->meeting;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\Item $item
     *
     * @return MeetingAgenda
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Item $item
     */
    public function removeItem(Item $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
