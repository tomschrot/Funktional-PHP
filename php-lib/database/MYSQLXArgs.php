<?php namespace database;

    /** 
     * Extend @see database\ExecutionArgs for specific usage. 
     * @copyright 2018 Tom Schröter
     */
    final class MYSQLXArgs extends ExecutionArgs {
        /** @return string Callable SQL statement: "CALL SCHEMA.PROCEDURE('arg1', 'arg2', ...);" */
        function __toString():string {
            return 'CALL '.parent::__toString();
        }
        //---------------------------------------------------------------------
    }
?>