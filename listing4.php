<?php

    class Person {
        public $role       = '';
        public $firstname  = '';
        public $lastname   = '';
        public $isFriend   = true;

        function __toString(): string {
            return 
                $this->firstname
                .' '
                .$this->lastname
                .', '
                .($this->role === '' ? ' - ' : $this->role);
        }
    }

    class PersonList {
        private $_myList = array();

        final function add(callable $config) {
            $p = new Person;
            $this->_myList[] = $p;
            $config($p);
        }

        final function each(callable $action) {
            foreach($this->_myList as $p)
                $action($p);
        }

        final function probe(callable $match, callable $action) {
            $this->each( function(Person $p) use ($match, $action) {
                if($match($p))
                    $action($p);
            });
        }
    }

    $population = new PersonList;

    $population->add( function(Person $p) {
        $p->firstname  = 'Micky';
        $p->lastname   = 'Maus';
        $p->role       = 'Detektiv';
    });

    $population->add( function(Person $p) {
        $p->firstname = 'Goofy';
        $p->role      = 'Kumpel';
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Donald';
        $p->lastname   = 'Duck';
        $p->role       = 'Pechvogel';
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Albert';
        $p->lastname   = 'Hunter';
        $p->role       = 'Komissar';
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Dagobert';
        $p->lastname   = 'Duck';
        $p->role       = 'Fantastillardär';
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Daniel';
        $p->lastname   = 'Düsentrieb';
        $p->role       = 'Erfinder';
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Karlo';
        $p->lastname   = 'Kater';
        $p->role       = 'Schurke';
        $p->isFriend   = false;
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Opa';
        $p->lastname   = 'Knack';
        $p->role       = 'Panzerknacker';
        $p->isFriend   = false;
    });

    $population->add( function(Person $p) {
        $p->firstname  = 'Babyface';
        $p->lastname   = 'Knack';
        $p->role       = 'Panzerknacker';
        $p->isFriend   = false;
    });

    $population->add( function(Person $p) {
        $p->lastname   = 'Phantom';
        $p->role       = 'Erzfeind';
        $p->isFriend   = false;
    });
    // usw...

    class Filter {
        static function ducks(Person $p) { return $p->lastname === 'Duck'; }
        static function good (Person $p) { return $p->isFriend === true;   }
        static function bad  (Person $p) { return $p->isFriend === false;  }
    }

    class Show {
        // normale Ausgabe 
        static function normal($it) { echo $it.'<br>'; }
        // die Guten in grün:
        static function good($it) { 
            echo 
                '<span style="color:green;">'
                .$it
                .'</span><br>';
        }
        // und die Bösen rot:
        static function bad($it) { 
            echo 
                '<span style="color:red;">'
                .$it
                .'</span><br>';
        }
    }

    // alle Einwohner mit einer Funktion zur Ausgabe anzeigen
    echo 'Einwohner:<br><br>';
    $population->each( function(Person $p) {
        echo $p.'<br>';
    });

    // jetzt filtern nach Enten:
    echo '<br><br> Die Enten:<br><br>';
    $population->probe(
        function(Person $p) { return $p->lastname === 'Duck'; }, // if TRUE
        function(Person $p) { echo $p.'<br>'; }                  // THEN echo...
    );

    // Nur die Guten anzeigen.
    // Gut ist wer $isFriend === true hat,
    // zum Anzeigen wird nun eine vordefinierte Funktion benutzt:
    echo '<br><br>Die Guten:<br><br>';
    $population->probe(
        function($it){ return $it->isFriend; },
        ['\Show', 'good']
    );

    // Nur die Bösen suchen.
    // Beide Funktionen kommen jetzt aus einer Bibliothek:
    echo '<br><br>Die Bösen:<br><br>';
    $population->probe(
        ['\Filter', 'bad'],
        ['\Show'  , 'bad']
    );

?>