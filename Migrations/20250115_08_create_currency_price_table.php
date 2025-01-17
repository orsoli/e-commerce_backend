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

        // Create the table
        $sql = "CREATE TABLE IF NOT EXISTS currency_price (
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
        
        // Drop the table
        $sql = "DROP TABLE IF EXISTS currency_price";
        $this->conn->exec($sql);
        echo "\033[32m \u{2714} DONE\033[0m       - Table currency_price dropped successfully.\n";
    }
}