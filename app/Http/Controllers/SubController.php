<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monthlyearning;

class SubController extends Controller
{
    public function UpdateList()
    {
        $ids = ["0"=>"1", "1"=>"2", "2"=>"3"];

        foreach($ids as $id) {
            $UpdateNew = Monthlyearning::where('user_id', $id)->first();
            $UpdateNew->payment = "0.00";
            $UpdateNew->update();
        }
    }
}
