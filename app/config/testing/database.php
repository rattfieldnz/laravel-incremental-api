<?php

return array(

	'fetch' => PDO::FETCH_CLASS,

	'default' => 'sqlite',

	'connections' => array(

		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		)
	)

);
