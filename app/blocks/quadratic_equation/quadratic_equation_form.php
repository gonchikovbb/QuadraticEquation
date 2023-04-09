<?php
require_once("{$CFG->libdir}/formslib.php");

class quadratic_equation_form extends moodleform {

    function definition() {

        $mform =& $this->_form;

        $mform->addElement('text', 'a', 'a = '); // Add elements to your form.
        $mform->setType('a', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('a', '');        // Default value.

        $mform->addElement('text', 'b', 'b = '); // Add elements to your form.
        $mform->setType('b', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('b', '');        // Default value.

        $mform->addElement('text', 'c', 'c = '); // Add elements to your form.
        $mform->setType('c', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('c', '');        // Default value.

        $mform->addElement('static', 'x1', 'x1 = '); // Add elements to your form.
        $mform->setType('x1', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('x1', '');        // Default value.

        $mform->addElement('static', 'x2', 'x2 = '); // Add elements to your form.
        $mform->setType('x2', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('x2', '');        // Default value.

        $mform->addElement('static', 'x', ''); // Add elements to your form.
        $mform->setType('x', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('x', '');        // Default value.

        $mform->addElement('submit', 'testname', 'Решить');

        $mform->addElement('button', 'intro', 'История');
    }

    public function validate():bool
    {
        $a = $this->get_data()->a;
        $b = $this->get_data()->b;
        $c = $this->get_data()->c;

        if (empty($a)) {
            $this->set_data(['x' => "Введите переменную 'а'"]);
            return false;
        }
        if (!is_numeric($a)) {
            $this->set_data(['x' => "Переменная 'а' должна быть числом"]);
            return false;
        }
        if (!empty($b) && !is_numeric($b)) {
            $this->set_data(['x' => "Переменная 'b' должна быть числом"]);
            return false;
        }
        if (!empty($c) && !is_numeric($c)) {
            $this->set_data(['x' => "Переменная 'c' должна быть числом"]);
            return false;
        }
        if ($a===0) {
            $this->set_data(['x' => "Переменная 'а' не должна быть равно 0"]);
            return false;
        }

        return true;
    }
}