<?php

declare(strict_types=1);

class ExistenceValidator {
    public function validateExistence($model, string $id): void {
        if(empty($model->getById($id)))
            header("Location: " . BASE_URL);
    }
}