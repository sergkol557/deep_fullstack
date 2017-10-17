<?php


class NewsView
{

    public static function generatePage($data)
    {
        $response = '';

        foreach ($data as $key => $value) {
            $response .= '<div class=\'news\'>';
            $title = mb_strtoupper($data[$key]['title']);
            $response .= "<div class='news__title'>$title</div>";
            $text = $data[$key]['text'] ?? '';
            $href = '';
            if (!empty($text)) {
                $href = "<a href=\"/news/view/{$data[$key]['id']}\">подробнее</a>";
            }
            $response .= "<div class='news__text'>$text $href</div>";
            $author = $data[$key]['author'] ?? '';
            $response .= "<div class='news__author'>$author</div>";
            $response .= '</div>';
        }
        return $response;
    }

    public static function generateSinglePage($data)
    {
        $response = '';
        $response .= '<div class=\'news\'>';
        $title = mb_strtoupper($data['title']);
        $response .= "<div class='news__title'>$title</div>";
        $text = $data['text'] ?? '';
        $href = '';
        if (!empty($text) && !isset($data['view'])) {
            $href = "<a href=\"/news/view/{$data['id']}\">подробнее</a>";
        }
        $response .= "<div class='news__text'>$text $href</div>";
        $author = $data['author'] ?? '';
        $response .= "<div class='news__author'>$author</div>";
        if (isset($data['view'])) {
            $response .= "<div class='back'><a href=\"{$data['view']}\"> Назад </a></div>";
        }
        $response .= '</div>';
        return $response;
    }

}
