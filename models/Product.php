<?php
class Product
{
    private $conn;
    private $tableP = "products";
    private $tableO = "orders";

    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = 'SELECT * FROM ' . $this->tableP . '
            ORDER BY
            id DESC';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $query = 'SELECT * FROM ' . $this->tableP . '
        WHERE
            id = ?
        LIMIT 0,1';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->price = $row['price'];
    }

    public function create()
    {
        $query = 'INSERT INTO ' .
            $this->tableO . '
            SET
                product_id = :product_id,
                user_id = :user_id';

        $stmt = $this->conn->prepare($query);

        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        $stmt->bindParam('product_id', $this->product_id);
        $stmt->bindParam('user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s. \n", $stmt->error);
        return false;
    }
}
