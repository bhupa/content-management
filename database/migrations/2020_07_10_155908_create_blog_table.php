<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable()->default(null);
            $table->unsignedInteger('category_id')->nullable()->default(null);
            $table->string('view')->nullable()->default(null);
            $table->longText('description');
            $table->longText('short_description');
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->boolean('is_active')->nullable()->default(0);
            $table->nullableTimestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('updated_by')->references('id')->on('admins');
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
        Schema::dropIfExists('blog');
    }
}
