<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeeAnsSheetColumnInQuiz extends Migration
{
    public function up()
    {
        Schema::table('quize_setups', function ($table) {
            if (!Schema::hasColumn('quize_setups', 'show_ans_sheet')) {
                $table->tinyInteger('show_ans_sheet')->default(1);
            }
        });

        Schema::table('online_quizzes', function ($table) {
            if (!Schema::hasColumn('online_quizzes', 'show_ans_sheet')) {
                $table->tinyInteger('show_ans_sheet')->default(1);
            }
        });
    }
    public function down()
    {
        //
    }
}
