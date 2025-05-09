<?php

declare(strict_types=1);

class FlashErrorsHelper {
    public static function addError(string $type, string|array $msg): void {
        $_SESSION["ERRORS"][$type] = $msg;
    }

    public static function clearErrors(): void {
        if(isset($_SESSION['ERRORS']))
            unset($_SESSION["ERRORS"]);
    }

    public static function all(): array {
        $errors = $_SESSION['ERRORS'] ?? [];
        unset($_SESSION['ERRORS']);
        
        return $errors;
    }

    public static function mapFieldErrors(array $errors): void {
        foreach ($errors as $nameError => $error) {
            $_SESSION["ERRORS"][$nameError] = $error;
        }
    }
}