<?php

declare(strict_types=1);

require_once __DIR__ . '../../InvalidRule.php';
require_once __DIR__ . '/InvalidRulesProvider.php';

class InvalidRulesCategoryProvider implements InvalidRulesProvider {
    private array $invalidRules;

    public function __construct() {
        $this->invalidRules = [
            "categoryName" => [
                new InvalidRule("/[^A-Za-z0-9 ]/", "El nombre no puede tener símbolos"),
                new InvalidRule("/^[0-9]+$/", "El nombre es inválido, no puede tener unicamente números"),
                new InvalidRule("/^.{0,1}$/", "Nombre muy corto. Debe tener un tamaño mayor o igual a 2"),
                new InvalidRule("/^.{51,}$/", "Se supero el limite de caracteres permitidos"),
                new InvalidRule("/^$/", "El nombre es requerido. Por favor, ingresa un nombre")
            ],
            "categoryDescription" => [
                new InvalidRule("/^[^A-Za-z\s]+$/", "La descripcion es inválida. Debe contener letras tambien"),
                new InvalidRule("/^.{0,3}$/", "La descripcion es muy breve"),
                new InvalidRule("/^.{5001,}$/", "Se supero el limite de caracteres permitidos"),
                new InvalidRule("/^$/", "La descripcion es requerida. Por favor, ingresa una descripcion")
            ],
            "type" => [
                new InvalidRule("/^$/", "El modelo es requerido. Por favor, ingresa un modelo")
            ]
        ];
    }

    public function invalidRules(string $nameRule): array {
        return $this->invalidRules[$nameRule];
    }
}