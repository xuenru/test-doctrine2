<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    private $id;
    /**
     * @Column(type="string")
     * @var string
     */
    private $description;
    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    private $created;
    /**
     * @Column(type="string")
     * @var string
     */
    private $status;

    /**
     * @ManyToMany(targetEntity="Product")
     * @var ArrayCollection
     */
    protected $products;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     * @var User
     */
    protected $engineer;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     * @var User
     */
    protected $reporter;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function setEngineer(User $engineer)
    {
        $engineer->addAssignedBugs($this);
        $this->engineer = $engineer;
    }

    /**
     * @return mixed
     */
    public function getEngineer()
    {
        return $this->engineer;
    }

    /**
     * @return mixed
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * @param mixed $reporter
     */
    public function setReporter(User $reporter)
    {
        $reporter->addReportedBugs($this);
        $this->reporter = $reporter;
    }

    public function assignToProduct(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
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
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function close()
    {
        $this->status = "CLOSE";
    }

}