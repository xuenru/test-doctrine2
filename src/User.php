<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var ArrayCollection
     */
    protected $reportedBugs;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var ArrayCollection
     */
    protected $assignedBugs;

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    public function addReportedBugs(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function addAssignedBugs(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}