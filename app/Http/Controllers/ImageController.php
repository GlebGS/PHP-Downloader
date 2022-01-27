<?php

namespace App\Http\Controllers;

use App\Jobs\ProgressBar;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function upload(Request $request)
    {

        $path = $request->file('file')->store('upload', 'public');

        $data = [
            'url' => '/storage/upload/' . basename($path),
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
        $path = 'public/upload/' . substr($url->url, 15);

        return Storage::download($path);
    }

    public function downloadUrl(Request $request)
    {
        $file_url = $request->url;
        $file_name = basename($file_url);

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/zip");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");

        readfile($file_url);
    }

    public function editAvatar(Request $request){
        $id = $request->id;

        $path = $request->file('file')->store('upload', 'public');

        if ($path){
            User::edit('users', $id, ['img' => '/storage/' . $path]);
        }

        return back()
            ->with('success', 'Профиль был успешно изменён.');
    }

}
