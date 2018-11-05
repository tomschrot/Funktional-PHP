<?php namespace database;

    /** 
     * Defines SQL connection parameters. 
     * @copyright 2018 Tom Schröter
    */
    interface iConnection {
            function server  (): string;
            function user    (): string;
            function password(): string;
        }
?>    