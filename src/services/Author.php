<?php

namespace app\services;

use app\models\Book;
use app\models\BookQuery;

class Author
{
    /**
     * Сгруппировано по авторам, групиировка от большего к меншему.
     *
     * @return BookQuery
     */
    public static function top10MostPublishedAuthors()
    {
        return Book::find()
            ->select([
                '{{author}}.full_name',
                'COUNT(*) as books_count'
            ])
            ->joinWith('authors')
            ->groupBy('{{author}}.full_name')
            ->orderBy('{{books_count}} desc')
            ->limit(10)
            ;
    }
}