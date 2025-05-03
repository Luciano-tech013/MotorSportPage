<?php

declare(strict_types=1);

require_once __DIR__ . '../../InvalidRule.php';
require_once __DIR__ . '/InvalidRulesProvider.php';

class InvalidRulesUserProvider implements InvalidRulesProvider {
    private array $invalidRules;

    public function __construct() {
        $this->invalidRules = [
            "username" => [
                new InvalidRule("/[^A-Za-z0-9 ]/", "El nombre de usuario no puede tener símbolos"),
                new InvalidRule("/^[0-9]+$/", "El nombre de usuario es inválido, no puede tener únicamente numeros o símbolos"),
                new InvalidRule("/^.{0,2}$/", "El nombre de usuario es muy corto. Debe tener un tamaño mayor a 2"),
                new InvalidRule("/^.{31,}$/", "Se supero el limite de caracteres permitidos"),
                new InvalidRule("/^$/", "El nombre de usuario es requerido. Por favor, ingresa un nombre")
            ],
            "password" => [
                new InvalidRule("/^[^A-Za-z\s]+$/", "La contraseña debe tener letras tambien"),
                new InvalidRule("/^.{0,3}$/", "La extension de la constraseña es muy corta. Por favor, introduce una constraseña con mayor extension"),
                new InvalidRule("/^.{16,}$/", "Se supero el limite de caracteres permitidos para la contraseña"),
                new InvalidRule("/^$/", "La contraseña es requerida. No puede crear una contraseña vacía")
            ],
            "politicies" => [
                new InvalidRule("/^$/", "Debe aceptar las politicas y privacidad del sistema para poder crear una cuenta")
            ]
        ];
    }

    public function invalidRules(string $nameRule): array {
        return $this->invalidRules[$nameRule];
    }
}