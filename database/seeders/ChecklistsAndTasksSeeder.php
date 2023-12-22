<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Database\Seeder;

class ChecklistsAndTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Checklist::create(['name' => 'Чеклист технического аудита сайта']);

        Task::create([
            'name' => 'Robots.txt',
            'description' => '<p>Robots.txt - это специальный файл, расположенный в корневом каталоге сайта. Веб-мастер указывает в нем, какие страницы
             и данные не следует индексировать. Файл содержит директивы, описывающие доступ к разделам сайта (так называемый стандарт исключений для
             роботов). Например, с его помощью можно создать отдельные настройки  доступа для поисковых роботов, предназначенных для мобильных устройств
             и обычных компьютеров.</p>
             <p>Справка <a href="https://ya.ru">Яндекса</a> и <a href="https://google.com">Гугла</a>.',
            'checklist_id' => '1'
        ]);


    }
}