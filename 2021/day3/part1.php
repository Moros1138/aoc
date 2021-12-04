<?php

if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

for($i = 0; $i < count($input); $i++)
    $input[$i] = trim($input[$i]);


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

function power_consumption()
{
    global $input;

    $bits = strlen($input[0]);
    $e = "";
    $g = "";

    for($i = 0; $i < $bits; $i++)
    {
        $e .= most_common($input, $i);
        $g .= least_common($input, $i);
    }
    
    $e = bindec($e);
    $g = bindec($g);
    return $e * $g;
}

echo power_consumption() . "\n";