<?php

return [
    'task_statuses' => [
        'index' => [
            'list' => 'Statuses',
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'actions' => 'Actions',
            'create_status' => 'Create Status',
            'buttons' => [
                'edit' => 'Edit',
                'delete' => 'Delete'
            ]
        ],
        'create' => [
            'list' => 'Create status',
            'submit' => 'Create'
        ],
        'edit' => [
            'list' => 'Edit status',
            'submit' => 'Update'
        ],
        'form' => [
            'name' => 'Name'
        ]
    ],
    'welcome' => [
        'greeting' => 'Hello from Hexlet!',
        'description' => 'This is a simple task manager in Laravel'
    ]
];
