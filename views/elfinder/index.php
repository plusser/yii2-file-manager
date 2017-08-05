<?php 

use alexantr\elfinder\ElFinder;

$this->title = 'Файловый менеджер';
$this->params['breadcrumbs'][] = $this->title;

echo ElFinder::widget([
    'connectorRoute' => ['connector'],
    'settings' => [
        'height' => 700,
    ],
    'buttonNoConflict' => true,
]);
