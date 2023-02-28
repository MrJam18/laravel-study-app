<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use App\Enums\ImageExtensions;
use Exception;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\FileDoesNotExistException;

class CKEditorController
{
    function upload(Request $request)
    {
        try {
            if(!$request->hasFile('upload')) throw new FileDoesNotExistException('файл не получен от клиента');
            $filenamewithextension = $request->file('upload')->hashName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            if(!ImageExtensions::exists($extension)) throw new Exception('файл не является изображением');
            $filenametostore = $filename.'_'.time().'.'.$extension;
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Изоюражение успешно загружено';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            header('Content-type: text/html; charset=utf-8');
            return $re;
        } catch (Exception $exception) {
            $msg = 'Ошибка: ' . $exception->getMessage();
            return "<script>window.alert('$msg')</script>";
        }
    }
}
