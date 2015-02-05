<?php

namespace DavidBadura\Taskwarrior;

use JMS\Serializer\Annotation as JMS;

/**
 * @author David Badura <d.a.badura@gmail.com>
 */
class Task
{
    const STATUS_PENDING   = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_DELETED   = 'deleted';
    const STATUS_WAITING   = 'waiting';

    /**
     * @var string
     *
     * @JMS\Type(name="string")
     */
    private $uuid;

    /**
     * @var string
     *
     * @JMS\Type(name="string")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @JMS\Type(name="DateTime<'Ymd\THis\Z'>")
     */
    private $due;

    /**
     * @var float
     *
     * @JMS\Type(name="float")
     */
    private $urgency;

    /**
     * @var \DateTime
     *
     * @JMS\Type(name="DateTime<'Ymd\THis\Z'>")
     */
    private $entry;

    /**
     * @var string
     *
     * @JMS\Type(name="string")
     */
    private $status;

    /**
     *
     */
    public function __construct()
    {
        $this->urgency = 0;
        $this->entry   = new \DateTime('now', new \DateTimeZone('UTC'));
        $this->status  = self::STATUS_PENDING;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * @param \DateTime $due
     */
    public function setDue(\DateTime $due = null)
    {
        $this->due = $due;
    }

    /**
     * @return \DateTime
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @return float
     */
    public function getUrgency()
    {
        return $this->urgency;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isPending()
    {
        return $this->status == self::STATUS_PENDING;
    }

    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->status == self::STATUS_COMPLETED;
    }

    /**
     * @return bool
     */
    public function isWaiting()
    {
        return $this->status == self::STATUS_WAITING;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->status == self::STATUS_DELETED;
    }
}