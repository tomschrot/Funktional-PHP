<?php namespace common;

      use database\MYSQL;

    /**
     * Just to encapsulate helpful (global) stuff here.
     * @copyright 2018 Tom Schröter
     */
    final class Omni {
        //---------------------------------------------------------------------
        /**
         * Returns value from super global $_REQUEST array.
         * @param  string $name Name of item.
         * @return string       Value of request item or empty string if item does not exists.
         */
        static function request(string $name): string {
            return ( isset($_REQUEST[$name])? $_REQUEST[$name] : '' );
        }
        //---------------------------------------------------------------------
        static private $_db = null;
        /**
         * Access to database connection as specified in MyDatabase.
         * @return MYSQL A MYSQL handler instance.
         */
        static function db(): MYSQL {
            if(self::$_db === null)
                self::$_db = new MYSQL(new \MyDatabase);
            return self::$_db;
        }
        //---------------------------------------------------------------------
        /** 
         *  Calls a configurator and executes the SQL query.
         *  @param callable $config that takes MYSQLXArgs $xargs as parameter.
         */
        static function dbExec(callable $config): int {
            return self::db()->execute($config);
        }
        //---------------------------------------------------------------------
    }

?>