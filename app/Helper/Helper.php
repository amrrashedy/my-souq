<?php

// if(! function_exists('num_row')){
    function num_row($page,$limit)
    {
        if(is_null($page)){
            $page=1;
        }
        $num =($page * $limit ) - ($limit-1);
        return $num;
    }
// }

function test_test()
{
    echo "Hi";
}
