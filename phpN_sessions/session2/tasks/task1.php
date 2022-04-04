<?php
declare(strict_types = 1);

function next_char(string $char){
    $numOfChar = ord($char);

    switch($char){
        case 'z':
            $numOfChar = 96;
            break;
        case 'Z':
            $numOfChar = 64;
            break;
    }
    
    echo chr(++$numOfChar).'<br>';
}

next_char("a");
next_char("f");
next_char("z");
next_char("A");
next_char("Z");

?>
