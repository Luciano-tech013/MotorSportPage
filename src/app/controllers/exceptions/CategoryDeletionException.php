<?php

declare(strict_types=1);

class CategoryDeletionException extends Exception {
    private array $cars;

    public function __construct(string $message, array $cars) {
        parent::__construct($message);
        $this->cars = $cars;
    }

    public function getData(): array {
        return $this->cars;
    }
}