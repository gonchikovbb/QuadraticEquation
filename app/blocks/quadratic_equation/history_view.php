<?php
require_once('../../config.php');
require_once('history.php');

global $DB, $OUTPUT, $PAGE;

$PAGE->set_pagelayout('standard');

$PAGE->set_heading('История');

$history = new history();

echo $OUTPUT->header();
$history->display();
echo $OUTPUT->footer();