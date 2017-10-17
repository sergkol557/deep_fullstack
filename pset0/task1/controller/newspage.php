<?php

require_once ROOT . '/model/newsmodel.php';
require_once ROOT . '/view/newsview.php';

class ControllerNewsPage
{
    public function actionList()
    {
        $data = NewsModel::getData();
        $data = NewsView::generatePage($data);

        require_once ROOT . '/template/maket.html';
        return true;

    }

    public function actionMain()
    {

        $data = NewsModel::getMainData();
        $data = NewsView::generatePage($data);

        require_once ROOT . '/template/maket.html';
        return true;

    }

    public function actionNonMain()
    {
        $data = NewsModel::getNonMainData();
        $data = NewsView::generatePage($data);

        require_once ROOT . '/template/maket.html';
        return true;

    }

    public function actionView()
    {
        $data = NewsModel::getIdData();
        $data = NewsView::generateSinglePage($data);
        require_once ROOT . '/template/maket.html';
        return true;

    }

}
