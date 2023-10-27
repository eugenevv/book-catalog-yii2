<?php

use yii\db\Migration;

/**
 * Class m231026_071927_create_book_author_tables
 */
class m231026_071927_create_book_author_tables extends Migration
{
    private string $tableBook = 'book';
    private string $tableAuthor = 'author';
    private string $tableBookAuthor = 'book_author';
    private string $idxBookAuthorBookId = 'idx-book_author-book_id';
    private string $idxBookAuthorAuthorId = 'idx-book_author-author_id';
    private string $fkBookAuthorBookId = 'fk-book_author-book_id';
    private string $fkBookAuthorAuthorId = 'fk-book_author-author_id';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableBook, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'year' => $this->integer(4)->notNull(),
            'description' => $this->text(),
            'isbn' => $this->string(13)->unique(),
            'cover_image' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createTable($this->tableAuthor, [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createTable($this->tableBookAuthor, [
            'book_id' => $this->integer(),
            'author_id' => $this->integer(),
        ]);

        // Создание индексов
        $this->createIndex(
            $this->idxBookAuthorBookId,
            $this->tableBookAuthor,
            'book_id'
        );

        $this->createIndex(
            $this->idxBookAuthorAuthorId,
            $this->tableBookAuthor,
            'author_id'
        );

        // Добавление внешних ключей
        $this->addForeignKey(
            $this->fkBookAuthorBookId,
            $this->tableBookAuthor,
            'book_id',
            'book',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            $this->fkBookAuthorAuthorId,
            $this->tableBookAuthor,
            'author_id',
            $this->tableAuthor,
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey($this->fkBookAuthorBookId, $this->tableBookAuthor);
        $this->dropForeignKey($this->fkBookAuthorAuthorId, $this->tableBookAuthor);
        $this->dropIndex($this->idxBookAuthorBookId, $this->tableBookAuthor);
        $this->dropIndex($this->idxBookAuthorAuthorId, $this->tableBookAuthor);
        $this->dropTable($this->tableBookAuthor);

        $this->dropTable($this->tableAuthor);
        $this->dropTable($this->tableBook);
    }
}