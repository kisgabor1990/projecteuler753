<?php
$max = 200;
$primes = primes($max);
$solutionsSum = 0;
echo '<pre>';

foreach ($primes as $p) {
    $solutions = 0;
    for ($a = 1; $a < $p; $a++) {
        $a3 = $a ** 3;
        for ($b = 1; $b < $p; $b++) {
            $b3 = $b ** 3;
            for ($c = 1; $c < $p; $c++) {
                $c3 = $c ** 3;
                if (($a3 + $b3) % $p == $c3 % $p) {
                    $solutions++;
                }
            }
        }
    }
    $solutionsSum += $solutions;
    echo "F(" . $p . ") == > " . $solutions . " db. \n";
}
echo "Összes megoldás " . $max . " -ig: " . $solutionsSum;

echo '</pre>';

function primes($max)
{
    $primes = [];
        $prime = array_fill(0, $max + 1, true);

        for ($p = 2; $p * $p <= $max; $p++) {
            if ($prime[$p] == true) {
                for ($i = $p * $p; $i <= $max; $i += $p)
                    $prime[$i] = false;
            }
        }

        for ($p = 2; $p <= $max; $p++) {
            if ($prime[$p]) {
                $primes[] = $p;
            }
        }
    return $primes;
}