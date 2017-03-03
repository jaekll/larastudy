<?php
namespace App\Services;

use App\Contracts\TestContract;

class TestService implements TestContract{

    public function callMe($controller)
    {
        // TODO: Implement callMe() method.
        dd('call me fr=o ' . $controller);
    }

}