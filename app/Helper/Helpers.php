<?php

namespace App\Helper;

use App\Models\IgnoreList;
use Spatie\PdfToText\Pdf;

class Helpers
{
    public static function keywordDestinyReport($file)
    {
        $str = Pdf::getText($file);
        // str_word_count($str,1) - returns an array containing all the words found inside the string
        $words = str_word_count(strtolower($str), 1);
        $numWords = count($words);
        // array_count_values() returns an array using the values of the input array as keys and their frequency in input as values.
        $word_count = (array_count_values($words));
        arsort($word_count);
        foreach ($word_count as $key => $val) {
            $data[] = array("word" => $key, "usage" => $val, "percent" => number_format(($val / $numWords) * 100) . "%");
        }
        return $data;
    }

    public static function isSubscribe($status, $id)
    {
        $btn = "";

        if ($status == 1) {
            $link = route('task-two-subscribe', ['id' => $id, "subscribe" => 0]);
            $btn = '<a class="btn-success btn is_subscribe " data-link="' . $link . '" >Cancel Subscribe</a>';
        } else {
            $link = route('task-two-subscribe', ['id' => $id, "subscribe" => 1]);
            $btn = '<a class="btn-danger btn is_subscribe" data-link="' . $link . '" >Be Subscribe</a>';
        }
        return $btn;
    }
}
