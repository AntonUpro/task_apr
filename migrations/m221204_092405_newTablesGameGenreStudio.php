<?php

use yii\db\Migration;

/**
 * Class m221204_092405_newTablesGameGenreStudio
 */
class m221204_092405_newTablesGameGenreStudio extends Migration
{

    const TABLE_GAME = 'game';
    const TABLE_GANRE = 'ganre';
    const TABLE_STUDIO = 'studio';
    const TABLE_GAME_GANRE = 'game_ganre';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создаем таблицу с названиями игр
        $this->createTable(self::TABLE_GAME, [
            'uuid' => $this->string()->unique()->notNull(),
            'uuid_studio' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('PK_table_game', self::TABLE_GAME, 'uuid');

        // Создаем таблицу с названиями жанров
        $this->createTable(self::TABLE_GANRE, [
            'uuid' => $this->string()->unique()->notNull(),
            'ganre' => $this->string()->notNull()->unique(),
        ]);

        $this->addPrimaryKey('PK_table_ganre', self::TABLE_GANRE, 'uuid');

        // Создаем таблицу с названиями студий
        $this->createTable(self::TABLE_STUDIO, [
            'uuid' => $this->string()->unique()->notNull(),
            'ganre' => $this->string()->notNull()->unique(),
        ]);

        $this->addPrimaryKey('PK_table_studio', self::TABLE_STUDIO, 'uuid');

        $this->addForeignKey('FK_game_studio', self::TABLE_GAME, 'uuid_studio', self::TABLE_STUDIO, 'uuid');

        // Создаем таблицу взаимосвязи игр и жанров
        $this->createTable(self::TABLE_GAME_GANRE, [
            'uuid_game' => $this->string()->notNull(),
            'uuid_ganre' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('FK_game_ganre-game', self::TABLE_GAME_GANRE, 'uuid_game', self::TABLE_GAME, 'uuid');
        $this->addForeignKey('FK_game_ganre-ganre', self::TABLE_GAME_GANRE, 'uuid_ganre', self::TABLE_GANRE, 'uuid');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_game_ganre-ganre', self::TABLE_GAME_GANRE);
        $this->dropForeignKey('FK_game_ganre-game', self::TABLE_GAME_GANRE);
        $this->dropTable(self::TABLE_GAME_GANRE);

        $this->dropForeignKey('FK_game_studio', self::TABLE_GAME);
        $this->dropPrimaryKey('PK_table_studio', self::TABLE_STUDIO);
        $this->dropTable(self::TABLE_STUDIO);

        $this->dropPrimaryKey('PK_table_ganre', self::TABLE_GANRE);
        $this->dropTable(self::TABLE_GANRE);

        $this->dropPrimaryKey('PK_table_game', self::TABLE_GAME);
        $this->dropTable(self::TABLE_GAME);
    }
}
