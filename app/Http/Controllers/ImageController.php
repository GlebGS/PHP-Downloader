<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function upload(Request $request)
    {

        $path = $request->file('file')->store('upload', 'public');

        $data = [
            'url' => '/storage/' . $path,
        ];

        File::addFile('files', $data);

        return view('addNote', [
            'id' => Auth::id(),
            'path' => $path,
            'role' => Auth::user()->role,
            'user' => Auth::user(),
        ]);
    }

    public function downloadFile(Request $request)
    {

        $url = File::findFile('files', $request->id);
        $path = '/public' . substr($url->url, 8);

        return Storage::download($path);
    }

    public function downloadUrl(Request $request)
    {

        $file = $request->url;
//        $headers = [
//            "Cache-Control: public",
//            "Content-Description: File Transfer",
//            "Content-Description: attachment; filename=$file",
//            "Content-Type: application/pdf",
//            "Content-Type: application/zip",
//            "Content-Type: application/png",
//            "Content-Transfer-Encoding: binary",
//        ];

        Storage::download($file);
    }

}
