<?php

function printStuff() {
	echo "\tStuff!!!!!\n";
}

echo "Hello World!\n";

$name = 'Ashley';

echo "Hello, " . $name . "\n";

$colors = ['red', 'orange', 'yellow', 'green', 'blue', 'purple'];

for ($i=0; $i < 10;$i++) {
	echo "Hello! This is a #" . $i . "
\n";
}

foreach ($colors as $color) {
	echo $coloe . " is a nice color!\n";
}

// $counter = 25; {
// while ($counter >= 0) {
// 	echo $counter, " is the best number!"
// 	$counter -= 5;
// 	# code...
// }

$animal = 'lion';

switch ($animal) {
	case 'lion':
		echo "I like to roar!";
		break;
	case 'bear':
		echo "I like to growl!";
		break;
	case 'duck':
		echo "I like to qwack";
		break;
	default:
		echo "Ahh! I don't speak!";
} 





$ideas = [];

if (ideas) {
	if ($ideas) {
		echo "\t\$ideas evaluates to true!\n";
	}
	else {
		echo "\t\$ideas evaluates to false!\n";
	}
	echo "\n";

	$value1 = 5;
	$value2 = 6;

	echo "\t" . $value1 . "\n";
	echo "\t" . $value2 . "\n";
}

	sleep(2);
	echo "Wow, I got tired of waiting!";





	$favorites = array (
		'color' => 'black',
		'food' => 'pizza',
		'animal' => 'puppy',
		'boy' => 'Brody'

	);
			var_dump($favorites);

	foreach ($favorites as $category => $choice) {
		echo "My favorite category is $choice.";
	}

?>