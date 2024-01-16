<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.edit');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            $setting = Setting::firstOrCreate(['key' => $key]);
            $setting->value = $value;
            $setting->save();
        }

        return redirect()->route('settings.index');
    }

    public function cropImage(Request $request)
    {
        $data = $request->validate([
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Dapatkan data hasil cropping
        $x = $data['x'];
        $y = $data['y'];
        $width = $data['width'];
        $height = $data['height'];

        // Dapatkan path file gambar
        $imagePath = $data['image']->path();

        // Lakukan cropping menggunakan library seperti Intervention Image
        $image = Image::make($imagePath);
        $croppedImage = $image->crop($width, $height, $x, $y);

        // Simpan gambar hasil cropping
        $croppedImagePath = 'path/to/save/cropped/image.jpg'; // Sesuaikan dengan direktori penyimpanan Anda
        $croppedImage->save($croppedImagePath);

        // Berikan respons sukses atau lakukan tindakan lain sesuai kebutuhan aplikasi Anda
        return response()->json(['message' => 'Cropping berhasil', 'path' => $croppedImagePath]);
    }
}