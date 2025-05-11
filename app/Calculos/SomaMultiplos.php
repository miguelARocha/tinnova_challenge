<?php

namespace App\Calculos;

class SomaMultiplos {
    public static function SomaMultiplos(int $x): int {
        if ($x < 3) return 0;

        // Fórmula otimizada (sem loop)
        $sumDiv3 = self::SomaAritim(3, (int)(($x-1)/3));
        $sumDiv5 = self::SomaAritim(5, (int)(($x-1)/5));
        $sumDiv15 = self::SomaAritim(15, (int)(($x-1)/15));

        return $sumDiv3 + $sumDiv5 - $sumDiv15;
    }

    private static function SomaAritim(int $a, int $n): int {
        return $a * $n * ($n + 1) / 2;
    }
}