

<?php

class Clothing {
    // Proprieté
    protected  int $id;
    protected  string $name;
    protected  string $category;
    protected  float $price;

    // Constructeur
    public function __construct(int $id, string $name, string $category, float $price) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }

    // Getters et Setters
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): static {
        $this->name = $name;
        return $this;
    }

    public function getCategory(): ?string {
        return $this->category;
    }

    public function setCategory(string $category): static {
        $this->category = $category;
        return $this;
    }

    public function getPrice(): ?float {
        return $this->price;
    }

    public function setPrice(float $price): static {
        $this->price = $price;
        return $this;
    }

    // Méthode pour creer ou ajouter un vêtement 
    public function addClothing(): bool
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO `clothing` (`id`, `name`, `category`, `price`) VALUES (?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id, $this->name, $this->category, $this->price]);
    }



    // Méthode pour lire un vetement à partir d'un ID 
    public function getClothingById()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT `clothing`.`id`, `clothing`.`name`, `clothing`.`category`, `clothing`.`price` FROM `clothing`  WHERE `clothing`.`id` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Clothing($row['id'], $row['name'], $row['category'], $row['price']);
        } else {
            return null;
        }
    }


    // Méthode pour mettre à jour un vetement 

    public function updateClothing()
    {
        $pdo = DataBase::getConnection();
        $sql = "UPDATE `clothing` 
        SET `name` = ?, `category` = ?, `price` = ?
        WHERE `clothing`.`id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->name, $this->category, $this->price, $this->id]);
    }

    // Méthode pour supprimer un vetement
   

    public function deleteClothing()
    {
        $pdo = DataBase::getConnection();
        $sql = 'DELETE FROM `clothing` WHERE `id` = ?';
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id]);
    }

}

 

?>

