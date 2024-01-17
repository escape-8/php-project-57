<?php

return [
    'delete_confirm' => 'Are you sure?',
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
    ],
    'task' => [
        'index' => [
            'list' => 'Tasks',
            'id' => 'ID',
            'status' => 'Status',
            'name' => 'Name',
            'author' => 'Author',
            'executor' => 'Executor',
            'created_at' => 'Created At',
            'actions' => 'Actions',
            'create_task' => 'Create task',
            'apply' => 'Apply',
            'buttons' => [
                'edit' => 'Edit',
                'delete' => 'Delete'
            ]
        ],
        'form' => [
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'executor' => 'Executor',
            'labels' => 'Labels'
        ],
        'create' => [
            'list' => 'Create task',
            'submit' => 'Create'
        ],
        'edit' => [
            'list' => 'Edit task',
            'submit' => 'Update'
        ],
        'show' => [
            'list' => 'View task: ',
            'name' => 'Name: ',
            'status' => 'Status: ',
            'description' => 'Description: ',
            'labels' => 'Labels: '
        ]
    ]
];
