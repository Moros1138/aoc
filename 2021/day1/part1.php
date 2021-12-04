<?php

if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");

for($i = 0; $i < count($input); $i++)
    $input[$i] = (int)trim($input[$i]);

$counter = 0;
for($i = 0; $i < count($input); $i++)
{
    if($i == 0)
        continue;
    
    if($input[$i - 1] < $input[$i])
        $counter += 1;
}

echo $counter . "\n";