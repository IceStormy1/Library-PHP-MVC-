<?php

return [

    '' => [
        'controller' => 'Main',
        'action' => 'mainPage',
    ],
    'save' => [
        'controller' => 'Main',
        'action' => 'save'
    ],
    'edit' => [
        'controller' => 'Main',
        'action' => 'edit'
    ],
    'editsave'=>[
        'controller' => 'Main',
        'action' => 'saveEdit'
    ],
    'delete'=>[
        'controller' => 'Main',
        'action' => 'delete'
    ],
    'genres' =>[
        'controller'=> 'Genres',
        'action'=>'genresMain'
    ],
    'genres/save'=>[
        'controller'=>'Genres',
        'action'=>'genresSave'
    ],
    'genres/edit' => [
        'controller' => 'Genres',
        'action' => 'genresEdit'
    ],
    'genres/editsave'=>[
        'controller' => 'Genres',
        'action' => 'genresSaveEdit'
    ],
    'genres/delete'=>[
        'controller' => 'Genres',
        'action' => 'genresDelete'
    ],
    'authors' =>[
        'controller'=> 'Authors',
        'action'=>'authorsMain'
    ],
    'authors/save'=>[
        'controller'=>'Authors',
        'action'=>'authorsSave'
    ],
    'authors/edit' => [
        'controller' => 'Authors',
        'action' => 'authorsEdit'
    ],
    'authors/editsave'=>[
        'controller' => 'Authors',
        'action' => 'authorsSaveEdit'
    ],
    'authors/delete'=>[
        'controller' => 'Authors',
        'action' => 'authorsDelete'
    ],
    '/queries'=>[
        'controller'=>'Queries',
        'action'=>'queriesMain'
    ]
];