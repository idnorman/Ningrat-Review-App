<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{

    public function manageSlider(Request $request, $menuId)
    {
        $existingIds = $request->existing_ids ?? [];
        $files = $request->file('files') ?? [];

        $currentSliders = DB::table('mst_menu_slider')
            ->where('ID_MENU', $menuId)
            ->get();
        
        // dd($currentSliders);?

        /* =============================
        HAPUS YANG TIDAK ADA DI ARRAY
        ============================== */

        foreach ($currentSliders as $slider) {

            if (!in_array($slider->ID_SLIDER, $existingIds)) {

                if ($slider->FOTO_SLIDER && Storage::disk('public')->exists($slider->FOTO_SLIDER)) {
                    Storage::disk('public')->delete($slider->FOTO_SLIDER);
                }

                DB::table('mst_menu_slider')
                    ->where('ID_SLIDER', $slider->ID_SLIDER)
                    ->delete();
            }
        }

        /* =============================
        INSERT FILE BARU
        ============================== */

        if ($files) {

            foreach ($files as $index => $file) {

                $newName = 'slider_'.$menuId.'_'.time().'_'.$index.'.'.$file->getClientOriginalExtension();

                $path = $file->storeAs(
                    'Admin/images/Menu/Slider',
                    $newName,
                    'public'
                );
                // dd($path);

                DB::table('mst_menu_slider')->insert([
                    'ID_MENU' => $menuId,
                    'FOTO_SLIDER' => $path,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Slider berhasil diperbarui'
        ]);
    }


}
