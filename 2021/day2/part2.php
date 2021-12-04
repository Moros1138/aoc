<?php

if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

$arr = [];
$a = 0;
$x = 0;
$y = 0;

foreach($input as $line)
{
    list($cmd, $val) = explode(" ", trim($line));
    
    $val = (int)$val;
    
    if($cmd == "forward")
    {
        $x += $val;
        $y += $a * $val;
    }
        

    if($cmd == "up")
        $a -= $val;
        
    
    if($cmd == "down")
        $a += $val;
        
}

echo ($x * $y) . "\n";