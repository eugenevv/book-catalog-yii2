<?php
/** @var array $authors */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<h1>Top 10 most published authors</h1>

<p>
    <table>
    <tr>
        <th>Author</th>
        <th>Books count</th>
    </tr>

    <?php foreach ($authors as $author): ?>

    <tr>
        <td><?= $author['full_name']?></td>
        <td><?= $author['books_count']?></td>
    </tr>

    <?php endforeach; ?>

    </table>
</p>