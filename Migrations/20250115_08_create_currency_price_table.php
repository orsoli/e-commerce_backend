<?php
class CreateCurrencyPriceTable {

     private $conn;

    
    /**
     * 
     * @param $conn
     */
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    /**
     * Run the migrations
     */
    public function up() {

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'currency_price'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m ! - currency_price table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE currency_price (
            id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
            price DECIMAL(8,2) UNSIGNED NOT NULL,
            currency_id BIGINT UNSIGNED NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (price) REFERENCES prices(amount),
            FOREIGN KEY (currency_id) REFERENCES currency(id)
        )";
        $this->conn->exec($sql);
         echo "\033[32m \u{2714} DONE\033[0m       - Table currency_price created successfully.\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {

        // Check if the table does not exist
        $sql = "SHOW TABLES LIKE 'currency_price'";
        $result = $this->conn->query($sql);
        // Check if result is empty
        if($result->rowCount() == 0) {
            echo "\033[33m ! - currency_price table does not exist\033[0m\n";
            return;
        }

        $sql = "DROP TABLE currency_price";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table currency_price dropped successfully.\n";
    }
}