<?php

require_once ROOT . '/core/model.php';

class NewsModel implements Model
{

    public static function getData()
    {
        $result = file_get_contents(ROOT . '/data/news.json');
        $result = json_decode($result, true);
        return $result;
    }

    public static function getMainData()
    {
        $result = self::getData();
        $response = [];

        foreach ($result as $key => $value) {
            if ($result[$key]['type'] === 'main') {
                $response[$key] = $result[$key];
            }
        }
        return $response;
    }

    public static function getNonMainData()
    {
        $result = NewsModel::getData();

        foreach ($result as $key => $value) {
            if ($result[$key]['type'] === 'main') {
                unset($result[$key]);
            }
        }
        return $result;
    }

    public static function getIdData()
    {
        $data = NewsModel::getData();
        $id = basename($_SERVER['REQUEST_URI']);
        foreach ($data as $key => $value) {
            if ($value['id'] === $id) {
                $response = $data[$key];
                $response['view'] = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
                break;
            }
        }
        $response = $response ?? $response[]['title'] = 'news not found';
        return $response;
    }

}
