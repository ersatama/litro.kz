<?php

namespace App\Domain\Helpers;

use App\Domain\Contracts\Contract;

class Image
{
    public function save($file): array
    {
        $name   =   md5(date('mdYHis').uniqid());
        $img    =   imagecreatefromstring(file_get_contents($file));
        $data   =   [
            Contract::JPG   =>  $this->store($name,$file,$img,Contract::JPG),
            Contract::PNG   =>  $this->store($name,$file,$img,Contract::PNG),
            Contract::WEBP  =>  $this->store($name,$file,$img,Contract::WEBP)
        ];
        imageDestroy($img);
        return $data;
    }

    public function store($name,$file,$img,$extension): string
    {
        $name   =   $name.'.'.$extension;
        $dir    =   storage_path(config('image.path'));
        $path   =   $dir.$name;
        if ($extension === $file->getClientOriginalExtension()) {
            $file->move($dir,$name);
        } else if ($extension === Contract::JPG) {
            imagejpeg($img, $path, 100);
        } else if ($extension === Contract::PNG) {
            imagepng($img, $path);
        } else if ($extension === Contract::WEBP) {
            imagewebp($img, $path, 100);
        }
        return $name;
    }
}
