<?php

    /** Configure a local (development) SQL server. */
    class MyDatabase implements database\iConnection {
        function server  (): string  { return 'p:127.0.0.1';    }
        function user    (): string  { return 'phpfunc';        }
        function password(): string  { return 'ticktricktrack'; }
    }

?>
