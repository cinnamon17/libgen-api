<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DB::table('updated')
                ->skip(10)->take(10)
                ->get();
        
        $count = $data->count();

        $data = [

            'response' => 'success',
            'results' => $count,
            'data' => [$data]
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {

        $title = str_replace(" ", "%", $title);

        $data= DB::table('updated')
                ->where('title', 'like', "$title%")
                ->get();

        $count = $data->count();

        if($count == 0){

            $data ="No records found";
        }

        return response()->json([

            'response' => 'success',
            'results' => $count,
            'data' => [$data]
            
        ]);

    }

}
