<?php


class GalleryView
{
    public static function generatePage($images)
    {
        $data = '<div class=\'gallery\'>';
        $ip = $_SERVER['SERVER_NAME'];
        $port = $_SERVER['SERVER_PORT'];

        foreach ($images as $file) {
            $adress = "http://$ip:$port/" . IMG_DIRECTORY . "/$file";
            $title = htmlspecialchars(pathinfo($file, PATHINFO_FILENAME));
            $data .= '<div class="pic" style="background:url(' . $adress . ') no-repeat 50% 50%;">
                      <a href="' . $adress . '" title="' . $title . '" target="_blank">' . $title . '</a>
                      </div>';

        }
        $data .= '<div class=\'clear\'></div></div>';

        return $data;

    }
}
