<?php

namespace App\Http\Controllers;

use App\Helpers\ImageUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function store(ImageUploadHelper $uploader, Request $request)
    {
        return $uploader->save($request->file, $request->folder, Auth::id());
    }
}
