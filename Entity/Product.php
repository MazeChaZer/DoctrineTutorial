<?php
/**
 * @Entity @Table(name="products")
 */
class Product {
	/**
	 * @Id @Column(type="integer") @GeneratedValue
	 * @var integer
	 */
	protected $id;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $name;
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
}
