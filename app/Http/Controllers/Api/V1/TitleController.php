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
        $data = [

            'response' => 'success',
            'message' => 'Please make a more specific request',
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

        $users = DB::table('updated')
                ->where('title', '=', "$title")
                ->get();

        $data = $users->toJson();

        return response()->json([

            'response' => 'success',
            [
                'data' => "$data"
            ]
        ]);


    }

}
