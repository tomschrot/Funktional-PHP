<?php namespace Funktionsvariablen;

    function calc(int $x): int {
        return $x + 3;
    }

    function test(callable $fn) {
        echo $fn(1).'<br>';
    }

    test( function(int $x): int { 
        return $x + 1; 
    });

    $myFunc = function(int $x): int { return $x + 2; };
    test( $myFunc );

    test( 'Funktionsvariablen\calc' );

    class CalcLib {
        static function calc10(int $x): int { return $x * 10; }
        static function calc15(int $x): int { return $x * 15; }
        static function calc75(int $x): int { return $x * 75; }
    }

    test( ['Funktionsvariablen\CalcLib', 'calc10'] );
    test( ['Funktionsvariablen\CalcLib', 'calc15'] );
    test( ['Funktionsvariablen\CalcLib', 'calc75'] );

    class CalcLibObj {
        public $factor = 0;
        function calc(int $x): int { return $x * $this->factor; }
    }

    $myLib = new CalcLibObj;
    test( [$myLib, 'calc'] );
  
    $myLib->factor = -2;
    test( [$myLib, 'calc'] );

?>    