<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Traits\ImageStore;

class UploadFileController extends Controller
{
    use ImageStore;

    public function upload_image(Request $request)
    {

        $request->validate([
            'files.*' => [
                'required',
                'image',
                'mimes:jpeg,jpg,bmp,png,svg,gif'
            ],
        ], [], [
            'files.*' => 'File'
        ]);
        if (!file_exists('public/uploads/editor-image')) {
            mkdir('public/uploads/editor-image', 0777, true);
        }
        $files = $request->files;
        $image_url = [];
        foreach ($files as $file) {
            foreach ($file as $k => $f) {
                $fileName = $f->getClientOriginalName() . time() . "." . $f->getClientOriginalExtension();
                $f->move('public/uploads/editor-image/', $fileName);
                $image_url[$k] = asset('public/uploads/editor-image/' . $fileName);
            }
        }

        return response()->json($image_url);
    }

    public function ckeditor_img(Request $request){
        $image = '';
        $url = '';
        $fileName = '';
        if($request->hasFile('upload')){
            $image = $this->saveImage($request->upload);
            $url = asset($image);
            $fileName = basename($image);
        }
        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }
}
