<?php

require_once ROOT . '/view/galleryview.php';
require_once ROOT . '/model/gallerymodel.php';

class ControllerGalleryPage
{
    public static function actionIndex()
    {

        $data = GalleryModel::getData();
        $data = GalleryView::generatePage($data);
        $header = GalleryModel::modifyHeader();

        require_once ROOT . '/template/maket.html';
        return true;
    }
}
