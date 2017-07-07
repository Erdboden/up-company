<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPhotoFieldsToCompaniesTable extends Migration
{

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->string('photo_file_name')->nullable();
            $table->integer('photo_file_size')->nullable()->after('photo_file_name');
            $table->string('photo_content_type')->nullable()->after('photo_file_size');
            $table->timestamp('photo_updated_at')->nullable()->after('photo_content_type');

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {

            if (Schema::hasColumn('photo_file_name', 'photo_file_size', 'photo_content_type', 'photo_updated_at')) {
                $table->dropColumn('photo_file_name');
                $table->dropColumn('photo_file_size');
                $table->dropColumn('photo_content_type');
                $table->dropColumn('photo_updated_at');
            }

        });
    }

}