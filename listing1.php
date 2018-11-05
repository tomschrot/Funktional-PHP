<?php 

    class Person {
        public $firstname;
        public $lastname;

        function __construct(string $firstname = '', string $lastname = '') {
            $this->firstname = $firstname;
            $this->lastname  = $lastname;
        }

        function __toString(): string {
            return $this->firstname.' '.$this->lastname;
        }
    }

    class PersonList {
        private $_myList = array();

        function add(Person $person) {
            $this->_myList[] = $person;
        }

        function show() {
            foreach($this->_myList as $person)
                echo $person.'<br>';
        }

    }

    $population = new PersonList;
    
    $population->add( new Person('Micky' , 'Maus'       ) );
    $population->add( new Person('Donald', 'Duck'       ) );
    $population->add( new Person('Goofy') );
    $population->add( new Person('Gustav', 'Gans'       ) );
    $population->add( new Person('Daniel', 'Düsentrieb' ) );
    //etc...

    echo 'Einwohner:<br>';
    $population->show();
?>