<?php

return [
    'task_statuses' => [
        'index' => [
            'list' => 'Статусы',
            'id' => 'ID',
            'name' => 'Имя',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
            'create_status' => 'Создать статус',
            'buttons' => [
                'edit' => 'Изменить',
                'delete' => 'Удалить'
            ]
        ],
        'create' => [
            'list' => 'Создать статус',
            'submit' => 'Создать'
        ],
        'edit' => [
            'list' => 'Изменение статуса',
            'submit' => 'Обновить'
        ],
        'form' => [
            'name' => 'Имя'
        ]
    ],
    'welcome' => [
        'greeting' => 'Привет от Хекслета!',
        'description' => 'Это простой менеджер задач на Laravel'
    ]
];
