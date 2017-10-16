<?php
	return [
		'main' => ['index' => 'index'],
		'gallery' => ['index' => 'index'],
		'news/\d+' => ['view' => 'view'],
		'news' => ['list' => 'list',
					'main' => 'main',
					'nonmain' => 'nonmain',
					'view' => 'view']
	];