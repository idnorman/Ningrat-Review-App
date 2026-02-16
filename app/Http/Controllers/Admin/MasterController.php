<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\CategoriModel;
use App\Models\TableModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterController extends Controller
{
    
    public function showMenu()
    {
        $data = MenuModel::join('mst_categories', 'mst_menus.id_kategori', '=', 'mst_categories.id_kategori')->select('mst_menus.*', 'mst_categories.nama_kategori')->get();
        return view('Admin.Pages.Master.Menu', ['data' => $data]);
    }

    public function showInsertMenuForm()
    {
        $categories = CategoriModel::all();
        // dd($categories);
        return view('Admin.Pages.Master.InsertMenu', ['categories' => $categories]);
    }

    public function saveMenu(Request $request)
    {
        try {
    
            // ================= VALIDATION =================
            $request->validate([
                'nama_menu'     => 'required|string|max:255',
                'harga'         => 'required|numeric|min:0',
                'jumlah'        => 'required|integer|min:0',
                'kategori_id'   => 'required',
                'deskripsi'     => 'nullable|string',
                'foto_utama'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'slider_foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);
    
            DB::beginTransaction();
    
            // ================= FOTO UTAMA =================
            $fotoUtamaPath = null;
    
            if ($request->hasFile('foto_utama')) {
                $file = $request->file('foto_utama');
                $newName = 'menu_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
    
                $fotoUtamaPath = $file->storeAs('Admin/images/Menu/Main', $newName, 'public');
            }
    
            // ================= INSERT MENU =================
            $menuId = DB::table('mst_menus')->insertGetId([
                'NAMA_MENU'       => $request->nama_menu,
                'HARGA_MENU'      => $request->harga,
                'DESKRIPSI_MENU'  => $request->deskripsi ?? '',
                'GAMBAR_MENU'     => $fotoUtamaPath,
                'SLIDER_MENU'     => '', // nanti kita update jika ada slider
                'ID_KATEGORI'     => $request->kategori_id,
                'JUMLAH_MENU'     => $request->jumlah,
                'JUMLAH_HARIAN'   => $request->jumlah,
                'STATUS_MENU'     => 'Ready',
                'KODE_MENU'       => '',
                'created_at'      => now(),
                'updated_at'      => now()
            ]);

            $kodeMenu = 'MN' . str_pad($menuId, 5, '0', STR_PAD_LEFT);

            // ================= UPDATE KODE_MENU =================
            DB::table('mst_menus')
                ->where('ID_MENU', $menuId)
                ->update([
                    'KODE_MENU' => $kodeMenu
                ]);
    
            // ================= SLIDER FOTO =================
            $firstSliderPath = null;
    
            if ($request->hasFile('slider_foto')) {
    
                foreach ($request->file('slider_foto') as $index => $file) {
    
                    $newName = 'slider_' . $menuId . '_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
    
                    $sliderPath = $file->storeAs('Admin/images/Menu/Slider', $newName, 'public');
    
                    // Simpan ke mst_menu_slider
                    DB::table('mst_menu_slider')->insert([
                        'ID_MENU'      => $menuId,
                        'FOTO_SLIDER'  => $sliderPath,
                        'created_at'   => now(),
                        'updated_at'   => now()
                    ]);
    
                    // Simpan slider pertama untuk update ke mst_menus
                    if ($index === 0) {
                        $firstSliderPath = $sliderPath;
                    }
                }
    
                // Update kolom SLIDER_MENU dengan slider pertama
                if ($firstSliderPath) {
                    DB::table('mst_menus')
                        ->where('ID_MENU', $menuId)
                        ->update([
                            'SLIDER_MENU' => $firstSliderPath
                        ]);
                }
            }
    
            DB::commit();
    
            return response()->json([
                'status'  => 'success',
                'message' => 'Menu berhasil disimpan'
            ]);
    
        } catch (\Exception $e) {
    
            DB::rollBack();
    
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteMenu($id)
    {
        try {

            $menu = DB::table('mst_menus')
                ->where('ID_MENU', $id)
                ->first();

            if (!$menu) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data menu tidak ditemukan'
                ], 404);
            }

            DB::table('mst_menus')
                ->where('ID_MENU', $id)
                ->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Menu berhasil dihapus'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function editMenu($id)
    {
        $menu = MenuModel::join('mst_categories', 'mst_menus.id_kategori', '=', 'mst_categories.id_kategori')
                ->select('mst_menus.*', 'mst_categories.nama_kategori')
                ->where('mst_menus.KODE_MENU', $id)
                ->firstOrFail();

        $categories = CategoriModel::all();
        // dd($menu);

        $sliders = DB::table('mst_menu_slider')
                    ->where('ID_MENU', $menu->ID_MENU)
                    ->get();

        return view('Admin.Pages.Master.EditMenu', compact('menu', 'categories', 'sliders'));
    }


    public function updateMenu(Request $request, $id)
    {
        try {
    
            // ================= VALIDATION =================
            $request->validate([
                'nama_menu'     => 'required|string|max:255',
                'harga'         => 'required|numeric|min:0',
                'jumlah'        => 'required|integer|min:0',
                'kategori_id'   => 'required',
                'deskripsi'     => 'nullable|string',
                'slider_foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);
    
            DB::beginTransaction();

            $data = [
                'NAMA_MENU'      => $request->nama_menu,
                'HARGA_MENU'     => $request->harga,
                'DESKRIPSI_MENU' => $request->deskripsi ?? '',
                'ID_KATEGORI'    => $request->kategori_id,
                'JUMLAH_MENU'    => $request->jumlah,
                'JUMLAH_HARIAN'  => $request->jumlah,
                'STATUS_MENU'    => 'Ready',
                'updated_at'     => now()
            ];
    
            if ($request->hasFile('foto_utama')) {
                $file = $request->file('foto_utama');
                $newName = 'menu_' . time() . '.' . $file->getClientOriginalExtension();
                $fotoUtamaPath = $file->storeAs(
                    'Admin/images/Menu/Main',
                    $newName,
                    'public'
                );
            
                $data['GAMBAR_MENU'] = $fotoUtamaPath;
            }
            DB::table('mst_menus')
                ->where('ID_MENU', $id)
                ->update($data);
    
            DB::commit();
    
            return response()->json([
                'status'  => 'success',
                'message' => 'Menu berhasil diUpdate'
            ]);
    
        } catch (\Exception $e) {
    
            DB::rollBack();
    
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function showTable(){
        $data = TableModel::all();
        return view('Admin.Pages.Master.Table',['table' => $data]);
    }

    public function InsertTable(Request $request){
        $check = TableModel::where('no_table', $request->no_table)->first();
        if($check){
            $message = 'Data Sudah Ada';
            return redirect()->route('adminTabel')->with('failed', $message);
        }
        $query = TableModel::create([
            'nama_table' => $request->nama_table,
            'no_table' => $request->no_table,
            'kapasitas_table' => $request->kapasitas_table
        ]);

        if($query){
            $message = 'Data Berhasil Ditambahkan';
            return redirect()->route('adminTabel')->with('success', $message);
        } else {
            $message = 'Data Gagal Ditambahkan';
            return redirect()->route('adminTabel')->with('failed', $message);
        }
    }

    // --Slider Foto
    public function manageSlider($id)
    {
        $menu = MenuModel::where('ID_MENU', $id)->firstOrFail();

        $sliders = DB::table('mst_menu_slider')
            ->where('ID_MENU', $id)
            ->get();

        return view('Admin.Pages.Master.EditSlider', compact('menu', 'sliders'));
    }
}
