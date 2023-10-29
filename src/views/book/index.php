<?php

use app\models\Book;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var \app\models\BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success', 'style' => \Yii::$app->user->isGuest ? 'display:none' : 'display:inline-block']) ?>
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Book $book, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $book->id]);
                 },
                'visibleButtons' => [
                    'update' => !\Yii::$app->user->isGuest,
                    'delete' => !\Yii::$app->user->isGuest,
                ],
            ],
        ],
    ]); ?>
<?php var_dump(\Yii::$app->user->isGuest, \Yii::$app->authManager->getPermissionsByUser(\Yii::$app->user->getId())) ?>
    <?php Pjax::end(); ?>

</div>
