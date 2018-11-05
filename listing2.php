<?php 

    class Person {
        public $firstname = '';
        public $lastname  = '';

        function __toString(): string {
            return $this->firstname.' '.$this->lastname;
        }
    }

    class PersonList {
        private $_myList = array();

        function add(Person $p) {
            $this->_myList[] = $p;
        }

        function show() {
            foreach($this->_myList as $person)
                echo $person.'<br>';
        }
    }

    $population = new PersonList;

    $person = new Person;
    $person->firstname = 'Micky';
    $person->lastname  = 'Maus';
    $population->add($person);
    
    $person = new Person;
    $person->firstname = 'Donald';
    $person->lastname  = 'Duck';
    $population->add($person);
    
    $person = new Person;
    $person->firstname = 'Goofy';
    $population->add($person);
    //etc...

    echo 'Einwohner:<br>';
    $population->show();
?>