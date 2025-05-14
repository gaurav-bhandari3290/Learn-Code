<?php

function getNumberOfDivisors(int $number): int {
        $divisors = 0;

        for ($index = 1; $index * $index <= $number; $index++) {
            if ($number % $index === 0) {
                $divisors++;
                if ($index !== $number / $index) {
                    $divisors++;
                }
            }
        }

        return $divisors;
    }

    function getConsecutivePairsWithSameDivisors(int $limit): int {
        $count = 0;

        for ($number = 2; $number < $limit; $number++) {
            if (getNumberOfDivisors($number) === getNumberOfDivisors($number + 1)) {
                $count++;
            }
        }

        return $count;
    }

//this is used to prevent the code below from running during tests
if (php_sapi_name() === 'cli' && basename(__FILE__) === basename($_SERVER['argv'][0])){
    $testCases = intval(fgets(STDIN));

    for ($index = 0; $index < $testCases; $index++) {
        $limit = intval(fgets(STDIN));
        $result = getConsecutivePairsWithSameDivisors($limit);
        echo "{$result}\n";
    }
}