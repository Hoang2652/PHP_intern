<?php
    $input = '2 3 4 5 1';
    $arr = explode(' ', $input);
    $count = count($arr);
    // method 1
    // sort array
    for($i = 0; $i < $count - 1; $i++) {
        for($j = $i + 1; $j < $count; $j++) {
            if($arr[$i] > $arr[$j]){
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp; 
            }
        }
    }

    // minimum sum
    $minimum = 0;
    for($i = 0; $i < $count - 1; $i++) {
        $minimum += $arr[$i];
    }

    // maximum sum
    $maximum = 0;
    for($i = 1; $i < $count; $i++) {
        $maximum += $arr[$i];
    }
    
    echo $minimum . " " . $maximum;

    // method 2
    // find min max
    $min = $arr[0];
    $max = $arr[0];
    for($i = 1; $i < $count; $i++) {
        if ( $arr[$i] < $min ) $min = $arr[$i];
        if ( $arr[$i] > $max ) $max = $arr[$i];
    }

    // sum
    $sum = 0;
    for($i = 0; $i < $count; $i++) {
        $sum +=  $arr[$i];
    }
    $minimum1 = $sum - $max;
    $maximum1 = $sum - $min;
    
    echo "<br>";
    echo $minimum1 . " " . $maximum1;
?>