<?php
$t = 1;
$stallsAmount =mt_rand(2, 100000);

for($i=1; $i<=$stallsAmount; $i++){
    $arrayOfStallsPlaces[] = mt_rand(1, 1000000000);
}
$cowsAmount = mt_rand(2, $stallsAmount);
$data = array();
for ($k = 1; $k <= $t; $k++) {
    echo (combinations(
            $arrayOfStallsPlaces,
            $data,
            0,
            $stallsAmount - 1,
            0,
            $cowsAmount,
            $pathMaxLength = [],
            $length = []
        )) . PHP_EOL;
}
function combinations(
    array $arrayOfStallsPlaces,
    array $data,
    int $start,
    int $end,
    int $index,
    int $cowsAmount,
    array $pathMaxLength,
    int $minOfMaxLength
): int
{
    if ($index === $cowsAmount) {

        for ($i = 1; $i <= $cowsAmount - 1; $i++) {

            $pathMaxLength[] = $data[$i] - $data[$i-1];

        }
        return min($pathMaxLength);
    }

    for ($i = $start;
         $i <= $end &&
         $end - $i + 1 >= $cowsAmount - $index; $i++) {

        $data[$index] = $arrayOfStallsPlaces[$i];
        $minOfMaxLength[] = combinations(
            $arrayOfStallsPlaces,
            $data,
            $i + 1,
            $end,
            $index + 1,
            $cowsAmount,
            $pathMaxLength,
            $minOfMaxLength
        );
    }
    return max($minOfMaxLength);
}

