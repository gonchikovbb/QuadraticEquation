<?php

require_once('../../config.php');
require_once('quadratic_equation_form.php');

global $DB, $OUTPUT, $PAGE;

$PAGE->set_pagelayout('standard');
$PAGE->set_heading('Квадратное уравнение');

$quadraticEquationForm = new quadratic_equation_form();

$url = new moodle_url('/blocks/quadratic_equation/history_view.php');
$quadraticEquationForm->set_data(['intro' => html_writer::link($url, 'История')]);

if ($quadraticEquationForm->validate()) {
    $formData = $quadraticEquationForm->get_data();

    $a = $formData->a;
    $b = $formData->b;
    $c = $formData->c;

    $d = $b * $b - 4 * $a * $c;

    if ($d<0) {
        $quadraticEquationForm->x = "Решений нет, поскольку D<0";
        $quadraticEquationForm->set_data(['x' => $quadraticEquationForm->x]);
    } else {
        $x1 = round(((-$b)-sqrt($d))/(2*$a),2);
        $x2 = round(((-$b)+sqrt($d))/(2*$a),2);

        $quadraticEquationForm->set_data(['x1' => $x1,'x2' => $x2]);

        $quadraticEquationForm->a = $a;
        $quadraticEquationForm->b = $b;
        $quadraticEquationForm->c = $c;
        $quadraticEquationForm->x1 = $x1;
        $quadraticEquationForm->x2 = $x2;

        $DB->insert_record('values', $quadraticEquationForm);
    }
}

echo $OUTPUT->header();
$quadraticEquationForm->display();
echo $OUTPUT->footer();

?>