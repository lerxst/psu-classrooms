<?php
	$pageTitle = "Classrooms";
	require_once('includes/header.php');

	echo "<h1>" . $pageTitle . "</h1>";

	$m = new MongoClient();

	$db = $m->ist;

	$collection = $db->classrooms;
	$eventCollection = $db->events;

	$cursor = $collection->find();
	$cursor->sort(array('classroomName' => 1));
	$eventCursor = $eventCollection->find();

	foreach($cursor as $document) {
		echo '<div class="row" style="margin-bottom:10px;">';
		echo '<div class="col-md-3">';
		if(isset($document["picfile"]))
		{
			echo '<img src="' . $document["picfile"] . '" class="img-rounded" width="250" />';
		}
		echo '</div>';
		echo '<div class="col-md-9">';
		echo '<h4>' . $document["classroomName"] . '</h4>';
		echo '</div>';
		echo '</div>';
	}
	
	foreach($eventCursor as $document)
	{
		echo $document["name"] . "<br/>";
	}
	
	require_once('includes/footer.php');
?>
