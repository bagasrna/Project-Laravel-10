<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Libraries\ResponseBase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    function getFileToCloud() {
        $images = Image::all();
        return ResponseBase::success("Berhasil menerima data images", $images);
    }

    public function uploadFileToCloud(Request $request) {
        $rules = [
            'file' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return ResponseBase::error($validator->errors(), 422);

        try {
            DB::beginTransaction();

            $file = $request->file('file');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $storeFile = $file->storeAs("test", $file_name, "gcs");
            $disk = Storage::disk('gcs');
            $fetchFile = $disk->url($storeFile);

            $image = new Image();
            $image->img = $storeFile;
            $image->save();

            $image->img = $fetchFile;

            DB::commit();
        } catch(\UnableToWriteFile|UnableToSetVisibility $e) {
            DB::rollback();
            Log::error('Gagal menambahkan data file: ' . $e->getMessage());
            return ResponseBase::error('Gagal menambahkan data file! : ' . $e, 409);
        return false;
        }

        return ResponseBase::success("Berhasil menambahkan data image", $image);
    }
}
