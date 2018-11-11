<?php

class Product{

	//database connection and table name
	private $conn;
	private $table_name ="products";

    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //read function

    // read products
	function read(){
	 
	    // select all query
	    $query = "SELECT c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created FROM " . $this->table_name . " p LEFT JOIN categories c
	  ON p.category_id = c.id ORDER BY p.created DESC";
	 
	    // prepare query statement
	    $stmt = mysqli_query($this->conn,$query);

	    return $stmt;
	}


	//create product

	function create(){

	     // sanitize
	    $this->name=htmlspecialchars(strip_tags($this->name));
	    $this->price=htmlspecialchars(strip_tags($this->price));
	    $this->description=htmlspecialchars(strip_tags($this->description));
	    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
	    $this->created=htmlspecialchars(strip_tags($this->created));
	 
	    // query to insert record
	    $query = "INSERT INTO
	                " . $this->table_name . "
	            SET
	                name=".$this->name.", price=".$this->price.", description=".$this->description.", category_id=".$this->category_id.", created=".$this->created."";
	 
	    // prepare query
	    //$stmt = mysqli_query($this->conn,$query);


	    // execute query
	    if($stmt = mysqli_query($this->conn,$query)){
	        return true;
	    }
	 
	    return false;
     
  
  }


  // used when filling up the update product form
function readOne(){
 
    // query to read single record
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id =".$this->id."
            LIMIT
                0,1";
 
    // prepare query statement
 
    $stmt = mysqli_query($this->conn,$query );
 
    // get retrieved row
    $row = mysqli_fetch_array($stmt);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->description = $row['description'];
    $this->category_id = $row['category_id'];
    $this->category_name = $row['category_name'];

   }



   // update the product
	function update(){

	    // sanitize
	    $this->name=htmlspecialchars(strip_tags($this->name));
	    $this->price=htmlspecialchars(strip_tags($this->price));
	    $this->description=htmlspecialchars(strip_tags($this->description));
	    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
	    $this->id=htmlspecialchars(strip_tags($this->id));
	 
	    // update query
	    $query = "UPDATE
	                " . $this->table_name . "
	            SET
	                name = :name,
	                price = :price,
	                description = :description,
	                category_id = :category_id
	            WHERE
	                id =".$this->id."";
	 
	    // prepare query statement
	    $stmt = mysqli_query($this->conn,$query);
	
	 
	    // execute the query
	    if($stmt){
	        return true;
	    }
	 
	    return false;
	}


	// delete the product
	function delete(){

	    // sanitize
	    $this->id=htmlspecialchars(strip_tags($this->id));
	 
	    // delete query
	    $query = "DELETE FROM " . $this->table_name . " WHERE id =".$this->id."";
	 
	    // prepare query
	    $stmt = mysqli_query($this->conn,$query);
	 

	    if($stmt){
	        return true;
	    }
	 
	    return false;
	     
	}


	function search($keywords){

	    $keywords=htmlspecialchars(strip_tags($keywords));
	   // $keywords = "%{$keywords}%";
	 
	    // select all query
	    $query = "SELECT
	                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
	            FROM
	                " . $this->table_name . " p
	                LEFT JOIN
	                    categories c
	                        ON p.category_id = c.id
	            WHERE
	                p.name LIKE '%{$keywords}%' OR p.description LIKE '%{$keywords}%' OR c.name LIKE '%{$keywords}%'
	            ORDER BY
	                p.created DESC";
	 
	    // prepare query statement
	    $stmt = mysqli_query($this->conn,$query);
	 
	    return $stmt;
	}

}