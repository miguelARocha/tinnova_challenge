<?php

namespace Tests\Unit;

use App\Sorters\BubbleSort;
use Tests\TestCase;

class BubbleSortTest extends TestCase {
    public function test_sorts_correctly() {
        $input = [5, 3, 2, 4, 7, 1, 0, 6];
        $expected = [0, 1, 2, 3, 4, 5, 6, 7];
        
        $this->assertEquals($expected, BubbleSort::sort($input));
    }

    public function test_edge_cases() {
        $this->assertEquals([], BubbleSort::sort([])); // Vazio
        $this->assertEquals([1], BubbleSort::sort([1])); // Único elemento
        $this->assertEquals([1, 2, 3], BubbleSort::sort([3, 2, 1])); // Invertido
    }
}