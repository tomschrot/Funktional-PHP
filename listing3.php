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

        function add(callable $config) {
            $p = new Person;
            $this->_myList[] = $p;
            $config($p);
        }

        function each(callable $action) {
            foreach($this->_myList as $p)
                $action($p);
        }

    }

    $popolation = new PersonList;

    $popolation->add( function(Person $p) {
        $p->firstname = 'Micky';
        $p->lastname  = 'Maus';
    });

    $popolation->add( function(Person $p) {
        $p->firstname = 'Goofy';
    });

    $popolation->add( function(Person $p) {
        $p->firstname = 'Donald';
        $p->lastname  = 'Duck';
    });

    $popolation->each( function(Person $p) {
        echo $p.'<br>';
    });
?>