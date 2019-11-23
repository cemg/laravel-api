<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function upload(UploadRequest $request)
    {
        if ($request->file('uploadFile')->isValid()) {
            $file = $request->file('uploadFile');
            $path = $request->uploadFile->path();
            $extension = $request->uploadFile->extension();
            $fileNameWithExtension = $file->getClientOriginalName();
            $fileNameWithExtension = $request->userId . '-' . time() . '.' . $extension;
    
            $path = $request->uploadFile->storeAs('uploads/images', $fileNameWithExtension, 'public');
            
            return response()->json(['url' => asset("storage/$path")]);
        }
    }
}
