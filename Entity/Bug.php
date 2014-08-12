<?php
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int $id
     **/
    protected $id;
    /**
     * @Column(type="string")
     * @var string $description
     **/
    protected $description;
    /**
     * @Column(type="datetime")
     * @var DateTime $created
     **/
    protected $created;
    /**
     * @Column(type="string")
     * @var string $status
     **/
    protected $status;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     * @var User $engineer
     **/
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     * @var User $reporter
     **/
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product")
     * @var Product[] $products
     **/
    protected $products;

    public function close(){
        $this->status = 'CLOSED';
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param User $engineer
     */
    public function setEngineer($engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    /**
     * @param User $reporter
     */
    public function setReporter($reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer()
    {
        return $this->engineer;
    }

    public function getReporter()
    {
        return $this->reporter;
    }
    
    public function assignToProduct($product)
    {
        $this->products[] = $product;
    }
    
    public function getProducts()
    {
        return $this->products;
    }
}