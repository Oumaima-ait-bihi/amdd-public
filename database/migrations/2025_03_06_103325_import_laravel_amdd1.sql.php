<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        $sqlFilePath = base_path('laravel_amdd1.sql');
        if (!DB::table('migrations')->exists()) {
            if (File::exists($sqlFilePath)) {
                $sql = File::get($sqlFilePath);
                DB::unprepared($sql);
            } else {
                throw new \Exception("⚠ The file data.sql was not found in the project root!");
            }
        }
    }

    public function down()
    {
    }
};
