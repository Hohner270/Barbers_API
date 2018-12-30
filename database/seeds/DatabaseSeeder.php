<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::table('project_categories', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')
                ->on('projects')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')
                ->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('project_id')->references('id')
                ->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('follows', function (Blueprint $table) {
            $table->foreign('followed_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('follower_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('project_id')->references('id')
                ->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('repositories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('repository_id')->references('id')
                ->on('repositories')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
