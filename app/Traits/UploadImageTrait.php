<?php

namespace App\Traits;
use Storage;

trait UploadImageTrait{


    public function imageUploadStorage($request, $field_name, $folder_name){

        if($request->has($field_name)){
            $file = $request->$field_name;
            $file_name_origin = $file->getClientOriginalName();
            $file_path = $request->file($field_name)->storeAs('public/'. $folder_name , $file_name_origin);

            $dataImageUpload = [
                'file_path_master' => Storage::url($file_path),
                'file_name_master' => $file_name_origin,
            ];
            return $dataImageUpload;
        }
        return null;
    }

    public function imageMultipleUploadStorage($files_images, $folder_name){
        
        $file_name_origin = $files_images->getClientOriginalName();
        $file_path = $files_images->storeAs('public/' . $folder_name , $file_name_origin );

        $dataImageUploadMultiple= [
            'file_path' => Storage::url($file_path),
            'file_name' => $file_name_origin
        ];

        return $dataImageUploadMultiple;

    } 


}