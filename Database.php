<?php

namespace app;

use app\models\Product;
use PDO;
use PDOException;

class Database
{
    public PDO $pdo;
    public string $dsn = "mysql:host=localhost;port=3306;dbname=products_crud;charset=utf8";
    public static $db;

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dsn, "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Could not establish connection to database: " . $e->getMessage();
        }

        self::$db = $this;
    }

    public function all($search = '')
    {
        if ($search) {
            $statement =
                $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC'); // prepare sql statement
            $statement->bindValue(':title', "%$search%");
        } else {
            $statement =
                $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC'); // prepare sql statement
        }
        $statement->execute(); // execute sql statement
        $products = $statement->fetchAll(PDO::FETCH_ASSOC); // fetch all data from database
        return $products;
    }

    public function find($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function create(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        $statement->execute();
    }
    public function update(Product $product)
    {
        $statement = $this->pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);
        $statement->execute();
    }

    public function destory($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}