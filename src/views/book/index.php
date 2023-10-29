<?php

use app\models\Author;
use app\models\Book;
use app\models\BookSearch;
use yii\grid\ActionColumn;
use yii\grid\DataColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success', 'style' => Yii::$app->user->isGuest ? 'display:none' : 'display:inline-block']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'year',
            'description:ntext',
            'isbn',
            [
                    'class' => DataColumn::class,
                    'attribute' => 'fullName',
                    'value' => function($data) {
                        if (count($data->authors)) {
                            /** @var Author $item */
                            return implode(',',array_map(function($item){
                                return $item->full_name;
                            }, $data->authors));
                        }
                        return '';
                    }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Book $book, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $book->id]);
                 },
                'visibleButtons' => [
                    'update' => !Yii::$app->user->isGuest,
                    'delete' => !Yii::$app->user->isGuest,
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
