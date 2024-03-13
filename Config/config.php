<?php


return [
    'name' => 'Note',
    'slug' => 'note',
    'prefix' => 'note',
    'ui' => 'bootstrap',
    'layout' => 'bootstrap',
    'theme' => 'default',
    'web' => [
        'theme' => '',
    ],
    'entities' => [
        \Modules\Note\Entities\NoteContent::class,
        \Modules\Note\Entities\NoteMeta::class,
    ],
    'navbar' => [],
    'admin' => [
        'sidebar' => [
            ["path" => "/note", "title" => 'Note', "icon" => "fas fa-layer-group", "slug" => "", "children" => [
                ["path" => "/contents", "title" => "Contents", "children" => [
                    ["path" => "/insert", "title" => "新增", "visible" => false,],
                    // ["path" => "/update/{id}", "title" => "编辑", "visible" => false,],
                    ["path" => "/0", "title" => "详情", "visible" => false,],
                ],],
                // ["path" => "/comments", "title" => "评论管理",],
                // ["path" => "/links", "title" => "外链管理",],
                ["path" => "/config", "title" => "Config",],
            ]],
        ]
    ],
];
