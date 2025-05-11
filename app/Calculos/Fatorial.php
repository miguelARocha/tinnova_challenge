<?php

namespace App\Calculos;

class Fatorial {
    public static function calculate(int $n): int|float {
        if ($n < 0) {
            throw new \InvalidArgumentException("Fatorial não definido para números negativos.");
        }

        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result = bcmul($result, (string)$i);
        }
        return $result;
    }
}