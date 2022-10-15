<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        $data = DB::table('students')
            ->select(
                DB::raw('gender as gender'),
                DB::raw('count(*) as number')
            )
            ->groupBy('gender')
            ->get();

        $array[] = ['Gender', 'Number'];

        foreach ($data as $key => $value) {
            $array[++$key] = [$value->gender, $value->number];
        }


        return view('charts.charts')->with('gender', json_encode($array));
    }
}
