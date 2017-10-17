<?php

require_once ROOT . '/core/model.php';

class GalleryModel implements Model
{

    public static function getData()
    {
        $allowed_types = ['jpg', 'jpeg', 'gif', 'png'];
        $files = scandir(IMG_DIRECTORY);
        $img = [];

        foreach ($files as $file) {
            if ($file == '.' || $file == '..') continue;
            $file_parts = explode('.', $file);
            $ext = strtolower($file_parts[1]);
            if (in_array($ext, $allowed_types)) {
                $img[] = $file;
            }
        }

        return $img;
    }

    public static function modifyHeader()
    {
        return file_get_contents(ROOT . '/template/galleryheader.html');
    }

}
