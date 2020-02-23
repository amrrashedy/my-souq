<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TestMiddleware;
use Illuminate\Http\Request;

class TestAgeController extends Controller
{
    function __construct()
    {
        //$this->middleware("check_age");
        //$this->middleware(TestMiddleware::class);
        $this->middleware("hello");
    }
    function index($age)
    {
        echo "Welcome from index";
    }
    function add($age)
    {
        echo "Welcome from add";
    }
}
