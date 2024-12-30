<?php

function return_cars_turning_back_bridge(int $U, array $weight): int
{
    $num_of_cars_turning_back = 0;
    $cars_to_weight = [0, 0];

    foreach ($weight as $value) {
        $cars_to_weight[1] = $value;

        if (array_sum($cars_to_weight) > $U) {
            $cars_to_weight = remove_heaviest_or_last_when_equal($cars_to_weight);
            $num_of_cars_turning_back++;
        } else {
            array_shift($cars_to_weight);
        }
    }

    return $num_of_cars_turning_back;
}

function remove_heaviest_or_last_when_equal(array $cars): array
{
    if ($cars[0] <= $cars[1]) {
        array_pop($cars);
    } else {
        array_shift($cars);
    }

    return $cars;
}
