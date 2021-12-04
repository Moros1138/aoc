<?php

if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

for($i = 0; $i < count($input); $i++)
    $input[$i] = (int)trim($input[$i]);

$counter = 0;
for($i = 0; $i < count($input) - 3; $i += 1)
{
    $a = $input[$i+0] + $input[$i+1] + $input[$i+2];
    $b = $input[$i+1] + $input[$i+2] + $input[$i+3];
    
    if($a < $b)
        $counter++;
}

echo $counter . "\n";