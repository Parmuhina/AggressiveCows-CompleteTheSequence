<?php
$t = 4;
$sc = [[6, 3], [8, 2], [10, 2], [1, 10]];
$values = [
    [1, 2, 3, 4, 5, 6],
    [1, 2, 4, 7, 11, 16, 22, 29],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 2],
    [3]
];
global $diference;
for ($i = 0; $i < $t; $i++) {
    $s = $sc[$i][0];
    $c = $sc[$i][1];
    $sequence = $values[$i];
    $diference = [$sequence];
    $answer = "";
    if(count($sequence)===1){
        for ($k = 1; $k <= $c; $k++) {
            if ($k != $c) {
                $answer.=$sequence[0] . " ";
            } else {
                $answer.=$sequence[0];
            }
        }
    }else {
        $array = difference($sequence, $diference);

        $length = count($array) - 2;

        for ($k = 1; $k <= $c; $k++) {
            $pathElement = 0;
            $pathArray = [];
            $add = $array[count($array) - 1][count($array[count($array) - 1]) - 1];


            for ($j = $length; $j >= 0; $j--) {
                $pathArray[] = $array[$j];

                $pathElement = $pathArray[count($pathArray) - 1][count($pathArray[count($pathArray) - 1]) - 1] + $add;

                $add = $pathElement;

                $array[$j][] = $pathElement;

            }
            if ($k != $c) {
                $answer .= $pathElement . " ";
            } else {
                $answer .= $pathElement;
            }
        }
    }
    echo ($answer);

}
function difference(array $sequence, array $diference): array
{
    global $path;
    $path = [];

    for ($i = 0; $i < count($sequence) - 1; $i++) {
        $path[] = $sequence[$i + 1] - $sequence[$i];
    }

    if ($path[count($path) - 1] != 0) {
        $diference[] = $path;
        return difference($path, $diference);
    }
    return $diference;
}