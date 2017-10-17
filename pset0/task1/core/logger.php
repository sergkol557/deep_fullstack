<?php
function logError($text)
{
    date_default_timezone_set('Europe/Kiev');

    $current_time = date('d/m/Y  H:i:s');

    if (!file_exists(ROOT . '/logs/log.txt')) {
        file_put_contents(ROOT . '/logs/log.txt', '');
    }

    $current_text = file_get_contents(ROOT . '/logs/log.txt');
    $current_text .= "$current_time - $text \n";
    file_put_contents(ROOT . '/logs/log.txt', $current_text);
}
