<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\mst_param;
use App\Http\Controllers\Controller;

class ParamController extends Controller
{
    public function getParam(Request $request)
    {
        $data = mst_param::where('param_name', $request->nama_param);

        if ($data->exists()) {
            return response()->json([
                'status' => 'success',
                'data' => $data->first()
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Parameter not found'
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'param_low_value'  => 'required',
            'param_high_value' => 'required',
            'param_value'      => 'required',
            'param_desc'       => 'nullable|string'
        ]);

        $param = mst_param::find($id);

        if (!$param) {
            return response()->json([
                'status' => 'error',
                'message' => 'Parameter tidak ditemukan'
            ], 404);
        }

        $param->param_low_value  = $request->param_low_value;
        $param->param_high_value = $request->param_high_value;
        $param->param_value      = $request->param_value;
        $param->param_desc       = $request->param_desc;
        $param->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Parameter berhasil diupdate'
        ], 200);
    }
}
