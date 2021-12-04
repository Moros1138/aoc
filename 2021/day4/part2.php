<?php

// BEGIN PARSE INPUT
if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

for($i = 0; $i < count($input); $i++)
    $input[$i] = trim($input[$i]);

// BEGIN CODE

function count_them($arr, $bit)
{
    $c_zero = 0;
    $c_one  = 0;
    
    for($i = 0; $i < count($arr); $i++)
    {
        if($arr[$i][$bit] == "0")
            $c_zero++;

        if($arr[$i][$bit] == "1")
            $c_one++;
    }
    
    return [$c_zero, $c_one];
}

function most_common($arr, $bit)
{
    list($c_zero, $c_one) = count_them($arr, $bit);

    if($c_zero == $c_one)
        return -1;
    
    return $c_zero > $c_one ? 0 : 1;
}

function least_common($arr, $bit)
{
    list($c_zero, $c_one) = count_them($arr, $bit);

    if($c_zero == $c_one)
        return -1;
    
    return $c_zero > $c_one ? 1 : 0;
}

function o2_generator_rating()
{
    global $input;
    
    // get the number of binary digits
    $bits = strlen($input[0]);

    // start with the full ist of binary numbers
    $result = $input;
    for($j = 0; $j < $bits; $j++)
    {
        $temp = [];

        // To find oxygen generator rating, determine the
        // most common value (0 or 1) in the current bit
        // position, and keep only numbers with that bit
        // in that position.
        $a = most_common($result, $j);
        // If 0 and 1 are equally common, keep values with a 1 in the position being considered.
        $a = ($a == -1) ? 1 : $a;

        
        for($i = 0; $i < count($result); $i++)
        {
            if($result[$i][$j] == $a)
                $temp[] = $result[$i];
        }

        $result = $temp;
        
        if(count($result) == 1)
            break;
    }
    return bindec($result[0]);
}

function co2_scrubber_rating()
{
    global $input;
    
    // get the number of binary digits
    $bits = strlen($input[0]);

    // start with the full ist of binary numbers
    $result = $input;
    for($j = 0; $j < $bits; $j++)
    {
        $temp = [];

        $a = least_common($result, $j);
        $a = ($a == -1) ? 0 : $a;

        
        for($i = 0; $i < count($result); $i++)
        {
            if($result[$i][$j] == $a)
                $temp[] = $result[$i];
        }

        $result = $temp;
        
        if(count($result) == 1)
            break;
    }
    return bindec($result[0]);
}
$o2 = o2_generator_rating();
$co2 = co2_scrubber_rating();
$life_support_rating =  $o2 * $co2;

echo $life_support_rating . "\n";