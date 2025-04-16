<?php

class ValidatorFields {
    private static Array $errors = [];

    public static function searchIncorrectFields(Array $fields): Array {
        foreach ($fields as $key => $field) {
            if (empty($field)) {
                self::$errors[$key] = true;
            }
        }

        $result = self::$errors;
        self::clear();
        return $result;
    }

    private static function clear(): Void {
        self::$errors = [];
    }
}