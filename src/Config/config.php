<?php

namespace App\Config;

class Config {
    public function __construct() {
        // Load environment variables
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
    }

    // Get environment variable
    public function get($key) {
        return $_ENV[$key] ?? null;
    }
}