<?php

namespace Bonfim\Component\Database;

trait Operators
{
    private $operators = '';
    private $attributes = [];

    public function and(string $key, $value): self
    {
        return $this->operator('AND', $key, $value);
    }

    public function or(string $key, $value): self
    {
        return $this->operator('OR', $key, $value);
    }

    public function not(string $key, $value): self
    {
        return $this->operator('NOT', $key, $value);
    }

    private function operator(string $operator, string $key, $value): self
    {
        $this->attributes[$key] = $value;
        $this->operators .= "{$operator} `{$key}` = :{$key}";
        return $this;
    }
}