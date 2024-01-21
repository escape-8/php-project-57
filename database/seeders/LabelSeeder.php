<?php

namespace Database\Seeders;

use App\Models\Label;
use Database\Factories\LabelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labels = [['name' => 'ошибка', 'description' => 'Указывает на неожиданную проблему или непредвиденное поведение'],
            ['name' => 'документация', 'description' => 'Указывает на необходимость улучшения или дополнения документации' ],
            ['name' => 'дубликат', 'description' => 'Указывает на похожие проблемы, запросы на включение или обсуждения'],
            ['name' => 'доработка', 'description' => 'Указывает на новые запросы функций']
        ];
        Label::factory()->withLabels($labels);
    }
}
