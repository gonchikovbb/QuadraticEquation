<?php
require_once("{$CFG->libdir}/formslib.php");

class history extends moodleform
{
    function definition() {

        global $DB;

        $mform =& $this->_form;

        $records = $DB->get_records('values');

        $data = json_decode(json_encode($records), true);

        foreach ($data as $equation) {
            $id = $equation['id'];

            $mform->addElement('static', $id);
            $mform->setType($id, PARAM_NOTAGS);
            $mform->setDefault($id, '');

            $a = $equation['a'];
            $b = $equation['b'];
            $c = $equation['c'];
            $x1 = $equation['x1'];
            $x2 = $equation['x2'];

            $this->set_data([$equation['id'] => "При значениях: a = $a  b = $b c = $c <br> Корни равны: x1 = $x1 x2 = $x2"]);
        }
    }
}