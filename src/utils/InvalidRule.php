<?php

declare(strict_types=1);

class InvalidRule {
    
    private string $regex;
    private string $msgError;

    public function __construct(string $regex, string $msgError)
    {
        $this->regex = $regex;
        $this->msgError = $msgError;
    }

    public function getRegex(): string 
    {
        return $this->regex;
    }

    public function getMsgError(): string 
    {
        return $this->msgError;
    }

    public function isSuccesful(string $value): bool
    {
        return (preg_match($this->regex, $value) === 1);
    }
}