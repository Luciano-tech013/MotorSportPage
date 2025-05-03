<?php

declare(strict_types=1);

require_once __DIR__ . '../../InvalidRule.php';
require_once __DIR__ . '/InvalidRulesProvider.php';

class InvalidRulesCarProvider implements InvalidRulesProvider {
    private array $invalidRules;

    public function __construct() {
        $this->invalidRules = [
            "carName" => [
                new InvalidRule("/[^A-Za-z0-9 ]/", "El nombre no puede tener símbolos"),
                new InvalidRule("/^[0-9]+$/", "El nombre es inválido, no pude contener unicamente números"),
                new InvalidRule("/^.{0,1}$/", "Nombre muy corto. Debe tener un tamaño mayor o igual a 2"),
                new InvalidRule("/^.{31,}$/", "Se supero el limite de ingreso de caracteres"),
                new InvalidRule("/^$/", "El nombre es requerido. Por favor, ingresa un nombre")
            ],
            "carDescription" => [
                new InvalidRule("/^[^A-Za-z\s]+$/", "La descripcion es inválida"),
                new InvalidRule("/^.{0,3}$/", "La descripcion es muy breve"),
                new InvalidRule("/^.{2001,}$/", "Se supero el limite de ingreso de caracteres"),
                new InvalidRule("/^$/", "La descripcion es requerida. Por favor, ingresa una descripcion")
            ],
            "model" => [
                new InvalidRule("/\D/", "Año inválido. Por favor, ingrese un año válido"),
                new InvalidRule("/^.{0,3}$|^.{5,}$/", "El tamaño del año no es válido. Debe ingresar un año con tamaño igual a 4"),
                new InvalidRule("/^$/", "El modelo es requerido. Por favor, ingresa un modelo")
        ],
            "brand" => [
                new InvalidRule("/[^A-Za-z0-9 ]/", "La marca no puede contener símbolos"),
                new InvalidRule("/^[0-9]+$/", "El nombre de la marca no puede contener números"),
                new InvalidRule("/^$/", "La marca es requerida. Por favor, ingresa una marca"),
                new InvalidRule("/^.{0,1}$/", "El nombre de la marca es muy corto. Debe tener un tamaño mayor o igual a 2"),
                new InvalidRule("/^.{31,}$/", "Se superó el limite de ingreso de caracteres")
            ],
            "category" => [
                new InvalidRule("/^$/", "La categoria es requerida. Por favor, selecciona la categoria a la que pertenece")
            ],
        ];
    }

    public function invalidRules(string $nameRule): array {
        return $this->invalidRules[$nameRule];
    }
}