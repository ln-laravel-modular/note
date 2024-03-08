<?php

return [
    'name' => 'Note',
    'prefix' => 'note',
    'web' => [
        'theme' => '',
    ],
    'admin' => [
        'sidebar' => [
            ["path" => "/note", "title" => 'Note', "icon" => "fas fa-layer-group", "slug" => "", "children" => [
                ["path" => "/contents", "title" => "内容管理", "children" => [
                    ["path" => "/insert", "title" => "新增", "visible" => false,],
                    // ["path" => "/update/{id}", "title" => "编辑", "visible" => false,],
                    ["path" => "/{id}", "title" => "详情", "visible" => false,],
                ],],
                ["path" => "/comments", "title" => "评论管理",],
                ["path" => "/links", "title" => "外链管理",],
                ["path" => "/options", "title" => "应用配置",],
            ]],
        ]
    ],
];