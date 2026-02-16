<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            [
                'name' => 'AQUA Elektronik AQR-D190',
                'price' => 1710000,
                'loc' => 'Jakarta Pusat',
                'img' => 'https://via.placeholder.com/200'
            ],
            [
                'name' => 'Kulkas 2 Pintu POLYTRON',
                'price' => 588831,
                'loc' => 'Toko Kulkas',
                'img' => 'https://via.placeholder.com/200'
            ]
        ]);
    }

    public function getSignatureMakanan()
    {
        $data = MenuModel::join('mst_categories', 'mst_menus.id_kategori', '=', 'mst_categories.id_kategori')
                ->select('mst_menus.*', 'mst_categories.nama_kategori')
                ->where('mst_categories.nama_kategori', 'Makanan')
                ->get();
        
        return response()->json($data);
    }

    
}
