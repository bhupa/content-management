<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->boolean('is_active')->nullable()->default(0);
            $table->unsignedInteger('display_order')->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->nullableTimestamps();


            $table->foreign('updated_by')->references('id')->on('admins');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('deleted_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
