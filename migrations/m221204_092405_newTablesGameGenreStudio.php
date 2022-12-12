<?php

use yii\db\Migration;

/**
 * Class m221204_092405_newTablesGameGenreStudio
 */
class m221204_092405_newTablesGameGenreStudio extends Migration
{

    const TABLE_GAME = 'game';
    const TABLE_GENRE = 'genre';
    const TABLE_STUDIO = 'studio';
    const TABLE_GAME_GENRE = 'game_genre';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создаем таблицу с названиями игр
        $this->createTable(self::TABLE_GAME, [
            'id' => $this->primaryKey(),
            'id_studio' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        // Создаем таблицу с названиями жанров
        $this->createTable(self::TABLE_GENRE, [
            'id' => $this->primaryKey(),
            'genre' => $this->string()->notNull()->unique(),
        ]);

        // Создаем таблицу с названиями студий
        $this->createTable(self::TABLE_STUDIO, [
            'id' => $this->primaryKey(),
            'studio' => $this->string()->notNull()->unique(),
        ]);

        $this->addForeignKey(
            'FK_game_studio',
            self::TABLE_GAME,
            'id_studio',
            self::TABLE_STUDIO,
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Создаем таблицу взаимосвязи игр и жанров
        $this->createTable(self::TABLE_GAME_GENRE, [
            'id' => $this->primaryKey(),
            'id_game' => $this->integer()->notNull(),
            'id_genre' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_game_genre-game',
            self::TABLE_GAME_GENRE,
            'id_game',
            self::TABLE_GAME,
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_game_genre-genre',
            self::TABLE_GAME_GENRE,
            'id_genre',
            self::TABLE_GENRE,
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_game_genre-genre', self::TABLE_GAME_GENRE);
        $this->dropForeignKey('FK_game_genre-game', self::TABLE_GAME_GENRE);
        $this->dropTable(self::TABLE_GAME_GENRE);

        $this->dropForeignKey('FK_game_studio', self::TABLE_GAME);
        $this->dropTable(self::TABLE_STUDIO);

        $this->dropTable(self::TABLE_GENRE);

        $this->dropTable(self::TABLE_GAME);
    }
}
