<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlersTable extends Migration {

    private $_table = NULL;
    private $fileds = NULL;

    public function __construct() {
        $this->_table = 'crawlers';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        /**
         * Existing table
         */
        if (!Schema::hasTable($this->_table)) {
            Schema::create($this->_table, function (Blueprint $table) {
                $table->increments('crawler_id');
                $table->string('crawler_name');
            });
        }

        /**
         * Existing fields
         */
        //crawler_id
        if (!Schema::hasColumn($this->_table, 'crawler_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->increments('crawler_id');
            });
        }
        //crawler_name
        if (!Schema::hasColumn($this->_table, 'crawler_name')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('crawler_name', 255);
            });
        }
        //category_id
        if (!Schema::hasColumn($this->_table, 'category_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('category_id');
            });
        }

        //crawler_image
        if (!Schema::hasColumn($this->_table, 'crawler_image')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->string('crawler_image', 255);
            });
        }
        //status_id
        if (!Schema::hasColumn($this->_table, 'status_id')) {
            Schema::table($this->_table, function (Blueprint $table) {
                $table->integer('status_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('crawlers');
    }

}
