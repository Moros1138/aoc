<?php

if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

$arr = [];

$x = 0;
$y = 0;

foreach($input as $line)
{
    list($cmd, $val) = explode(" ", trim($line));
    
    $val = (int)$val;
    
    if($cmd == "forward")
    {
        $x += $val;
    }
        

    if($cmd == "up")
        $y -= $val;
        
    
    if($cmd == "down")
        $y += $val;
        
}

echo ($x * $y) . "\n";