<?php

declare(strict_types=1);

/** 
 * Valida si el valor ingresado de todos los campos cumplen con alguna regla de invalidacion de valores
*/
class FormValidator {
    private array $errors;
    private InvalidRulesProvider $invalidRulesProvider;

    public function __construct(InvalidRulesProvider $invalidRulesProvider) {
        $this->errors = [];
        $this->invalidRulesProvider = $invalidRulesProvider;
    }

    public function setRulesValidator(InvalidRulesProvider $invalidRulesProvider): void {
        $this->invalidRulesProvider = $invalidRulesProvider;
    }

    public function validateFields(array $fields): array {
        $this->errors = [];

        foreach($fields as $name => $value) {
            $this->validateRules($name, $value);
        }

        return $this->errors;
    }

    private function validateRules(string $nameRule, string|int $value): void {
        $rules = $this->invalidRulesProvider->invalidRules($nameRule);

        if(empty($rules))
            return;

        $msg = $this->findInvalidValues($rules, $value);
        if(!empty($msg))
            $this->errors[$nameRule] = $msg;
    }

    private function findInvalidValues(array $rules, string|int $value): ?string {
        foreach($rules as $rule) {
            if($rule->isSuccesful($value)) {
                return $rule->getMsgError();
            }
        }

        return null;
    }
}
