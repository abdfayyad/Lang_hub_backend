<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function test() {
        $acadmies = Academy::all();
        foreach($acadmies as $academie) {
            $time1 = $academie->delete_time;
            $time2 = DB::table('academie_student')
            ->where('academy_id', $academie->id)
            ->where('created_at', '>', now()->subDays($time1))
            ->get();
        }


        // delyed time + created_at < now ==> delete request
    }
}
