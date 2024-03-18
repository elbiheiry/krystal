<?php 

use Intervention\Image\Facades\Image;

if (!function_exists('image_manipulate')) {
    function image_manipulate($image, $path, $width = null, $height = null)
    {

        $image->store($path ,'public');
        $name = $image->hashName();

        if ($width && $height) {
            Image::make(storage_path('app/public/' . $path . '/' . $name))
                ->resize($width, $height)
                ->save(storage_path('app/public/' . $path . '/' . $name));
        }elseif ($width && $height == null) {
            
            Image::make(storage_path('app/public/' . $path . '/' . $name))
                ->resize($width, null , function ($constraint)
                {
                    $constraint->aspectRatio();
                })
                ->save(storage_path('app/public/' . $path . '/' . $name));

        }elseif ($width == null && $height) {
            
            Image::make(storage_path('app/public/' . $path . '/' . $name))
                ->resize(null, $height , function ($constraint)
                {
                    $constraint->aspectRatio();
                })
                ->save(storage_path('app/public/' . $path . '/' . $name));

        }
        
        return $name;
    }
}

if (!function_exists('image_delete')) {
    function image_delete($image, $path)
    {
        @unlink(storage_path('app/public/'.$path.'/'.$image));
    }
}

if (!function_exists('get_image')) {
    function get_image($image, $path)
    {
        $image = url(('storage/'.$path.'/'.$image));

        return $image;
    }
}

if (!function_exists('failed_validation')) {
    function failed_validation($error)
    {
        return response()->json($error , 400);;
    }
}

if (!function_exists('add_response')) {
    function add_response()
    {
        return response()->json('Data has been added successfully' , 200);;
    }
}

if (!function_exists('update_response')) {
    function update_response()
    {
        return response()->json('Data has been updated successfully' , 200);;
    }
}

if (!function_exists('error_response')) {
    function error_response()
    {
        return response()->json(
            app()->getLocale() == 'en' ? 'Error , please try again later' : 'حدث خطأ برجاء إعاده المحاوله مره أخري'
            , 400);;
    }
}
if (!function_exists('aurl')) {
    function aurl($path)
    {
        return asset('admin-assets/'.$path);
    }
}

if (!function_exists('surl')) {
    function surl($path)
    {
        return asset('site-assets/'.$path);
    }
}