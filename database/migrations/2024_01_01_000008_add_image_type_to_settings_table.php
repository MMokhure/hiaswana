<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        // Change the type column from ENUM to string to support 'image' and future types.
        // SQLite does not support MODIFY/ALTER COLUMN, so we use a raw approach.
        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'sqlite') {
            // SQLite: recreate the table with a string type column
            Schema::create('settings_temp', function (Blueprint $table) {
                $table->id();
                $table->string('group');
                $table->string('key')->unique();
                $table->string('label');
                $table->text('value')->nullable();
                $table->string('type')->default('text');
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });

            DB::statement('INSERT INTO settings_temp SELECT * FROM settings');
            Schema::drop('settings');
            Schema::rename('settings_temp', 'settings');
        } else {
            Schema::table('settings', function (Blueprint $table) {
                $table->string('type')->default('text')->change();
            });
        }
    }

    public function down(): void
    {
        // No-op: reverting would require re-creating the ENUM which is complex across drivers
    }
};
