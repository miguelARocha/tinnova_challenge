<?php

namespace App\Sorters;

class BubbleSort {
    public static function sort(array $arr): array {
        $steps = []; // Armazena cada estado do array
        $n = count($arr);
        $swapped = true; // Verifica se houve troca

        for ($i = 0; $i < $n - 1 && $swapped; $i++) {
            $swapped = false;
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // Registra o estado atual com destaque
                $steps[] = [
                    'array' => $arr,
                    'comparing' => [$j, $j+1]
                ];

                if ($arr[$j] > $arr[$j + 1]) {
                    // Swap
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                    $swapped = true;

                    // Registra após swap
                    $steps[] = [
                        'array' => $arr,
                        'swapped' => [$j, $j+1]
                    ];
                }
            }
        }
        return $steps; // Retorna todos os passos
    }
}