<?php

namespace app\controllers;

use app\services\Author;
use yii\data\SqlDataProvider;
use yii\web\Controller;

class ReportController extends Controller
{
    public function actionTop10MostPublishedAuthors()
    {
        $authors = Author::top10MostPublishedAuthors()->createCommand()->queryAll();

        return $this->render('top10MostPublishedAuthors', [
            'authors' => $authors,
        ]);
    }

}
