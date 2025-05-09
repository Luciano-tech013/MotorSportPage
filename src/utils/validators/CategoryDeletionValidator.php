<?php

declare(strict_types=1);

require_once __DIR__ . '/../../app/controllers/exceptions/CategoryDeletionException.php';  

class CategoryDeletionValidator {
    private CarModel $carModel;

    public function __construct(CarModel $carModel) {
        $this->carModel = $carModel;
    }

    public function isDeletable(string $id): void {
        $cars = $this->carModel->getAllByCategoryIdWithNameAndBrand($id);
        if(!empty($cars))
            throw new CategoryDeletionException("No se puede eliminar la categoria porque tiene autos asociados.", $cars);
    }
}