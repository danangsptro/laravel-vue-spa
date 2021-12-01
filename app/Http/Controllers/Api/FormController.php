<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\from;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index ()
    {
        $form = from::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $form
            ]
        );
    }

    public function store (Request $request)
    {
        $form = new from();
        $form->name = $request->name;
        $form->umur = $request->umur;
        $form->alamat = $request->alamat;
        $form->pekerjaan = $request->pekerjaan;
        $form->save();
        return response()->json(
            [
                'status' => 'success',
                'data' => $form
            ]
        );
    }
}
