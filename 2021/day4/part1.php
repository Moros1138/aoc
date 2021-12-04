<?php

if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

for($i = 0; $i < count($input); $i++)
    $input[$i] = trim($input[$i]);


$bits = strlen($input[0]);

// gamma

function most_common($index)
{
    global $input;
    $c1 = 0;
    $c2 = 0;
    foreach($input as $i)
    {
        $c2++;
        if($i[$index] == "0")
            $c1++;
    }
    
    $c2 /= 2;
    
    if($c2 > $c1)
        return 0;
    
    return 1;
}

function least_common($index)
{
    $a = most_common($index);
    return ($a == 0) ? 1 : 0;
}

$epsilon = "";
$gamma = "";

for($i = 0; $i < $bits; $i++)
    $gamma .= least_common($i);


for($i = 0; $i < $bits; $i++)
    $epsilon .= most_common($i);

$gamma = bindec($gamma);
$epsilon = bindec($epsilon);

echo $gamma . "\n";
echo $epsilon . "\n";
echo ($gamma * $epsilon) . "\n";