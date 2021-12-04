<?php

// BEGIN PARSE INPUT
if(@$_SERVER['argv'][1] == "sample")
    $input = file("sample.txt");
else
    $input = file("real.txt");
