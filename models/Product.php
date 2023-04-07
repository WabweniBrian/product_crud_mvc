<?php

namespace app\models;

use app\Database;
use app\helpers\UtilHelper;

class Product
{

    public ?int $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?float $price = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;

    public function processData($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->description = $data['description'] ?? null;
        $this->price = (float)$data['price'];
        $this->imageFile = $data['imageFile'] ?? null;
        $this->imagePath = $data['image'] ?? null;
    }

    public function validate()
    {
        $errors = [];
        if (!$this->title) {
            array_push($errors, 'Product title is required');
        }
        if (!$this->price) {
            array_push($errors, 'Product price is required');
        }

        if (!is_dir(__DIR__ . '/../public/images')) {
            mkdir(__DIR__ . '/../public/images');
        }

        if (empty($errors)) {

            if ($this->imageFile && $this->imageFile['tmp_name']) {

                if ($this->imagePath) {
                    unlink($this->imagePath);
                    rmdir(dirname($this->imagePath));
                }

                $this->imagePath = 'images/' . UtilHelper::randomString(10) . '/' . $this->imageFile['name'];
                mkdir(dirname($this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../public/' . $this->imagePath);
            }
        }
        return $errors;
    }

    public function save()
    {
        $db = Database::$db;
        if ($this->id) {
            $db->update($this);
        } else {
            $db->create($this);
        }
    }
}