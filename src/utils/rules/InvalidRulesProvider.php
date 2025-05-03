<?php

declare(strict_types=1);

interface InvalidRulesProvider {
    public function invalidRules(string $nameRule): array;
}