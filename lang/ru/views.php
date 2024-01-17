<?php

return [
    'delete_confirm' => 'Вы уверены?',
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
    ],
    'task' => [
        'index' => [
            'list' => 'Задачи',
            'id' => 'ID',
            'status' => 'Статус',
            'name' => 'Имя',
            'author' => 'Автор',
            'executor' => 'Исполнитель',
            'created_at' => 'Дата создания',
            'actions' => 'Действия',
            'create_task' => 'Создать задачу',
            'apply' => 'Применить',
            'buttons' => [
                'edit' => 'Изменить',
                'delete' => 'Удалить'
            ]
        ],
        'form' => [
            'name' => 'Имя',
            'description' => 'Описание',
            'status' => 'Статус',
            'executor' => 'Исполнитель',
            'labels' => 'Метки'
        ],
        'create' => [
            'list' => 'Создать задачу',
            'submit' => 'Создать'
        ],
        'edit' => [
            'list' => 'Изменение задачи',
            'submit' => 'Обновить'
        ],
        'show' => [
            'list' => 'Просмотр задачи: ',
            'name' => 'Имя: ',
            'status' => 'Статус: ',
            'description' => 'Описание: ',
            'labels' => 'Метки: '
        ]
    ]
];
