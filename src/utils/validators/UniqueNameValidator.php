<?php

declare(strict_types=1);

class UniqueNameValidator {
    public function isAUniqueName($model, string $name, ?int $userId): bool {
        return empty($model->getByUserIdAndName($name, $userId));
    }
}