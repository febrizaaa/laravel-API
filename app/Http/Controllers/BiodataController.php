<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{
    public function create(Request $request){
        $datainput = [
            'name' => $request->input('name'),
            'fullname' => $request->input('fullname')
        ];

        $insert = Biodata::insert($datainput);

        if ($insert) {
            return response()->json([
                'status' => true,
                'message' => 'berhasil terbuat'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'gagal terbuat'
            ]);
        }
    }

    public function update(Request $request){
        if (!$request->input('id')){
            return 'id required';
        }
        $biodata = Biodata::where('id', $request->input('id'))->first();
        if(!$biodata){
            return response()->json(['message' => 'biodata not found'], 404);
        }
        $data = $request->all();
        $biodata->fill($data);
        $biodata->save();

        return response()->json(['message' => 'user id' . $biodata->id . 'update'], 200);
    }

    public function get(Request $request){
    $id = $request->input('id');
        $biodata = Biodata::select('*');
        if ($id) {
            $biodata->where('id', $request->input('id'));
        }
        $getbio = $biodata->get();

    return $getbio;
    }
}
