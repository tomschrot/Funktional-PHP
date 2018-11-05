<?php namespace database;

    /** 
     * Defines a configuration for executing a sql procedure. 
     * @copyright 2018 Tom Schröter
    */
    abstract class ExecutionArgs {
        /** 
         * @var string   $schema        Prefix for database schema.
         * @var string   $procedure     Name of procedure to call.
         * @var array    $args          List of arguments for the procedure. Keep the oder matched!
         * @var callable $resultHandler A lambda that handles result rows (if any).
         * */
        public $schema          = '';
        public $procedure       = '';
        public $args            = array();
        public $resultHandler   = null;
        //---------------------------------------------------------------------
        /** @return string Callable SQL statement: SCHEMA.PROCEDURE('arg1', 'arg2', ...); */
        function __toString(): string {
            return
                ( ($this->schema !== '')? $this->schema.'.' : '' )
                .$this->procedure.'('
                .$this->assemble($this->args)
                .');';
        }
        //---------------------------------------------------------------------
        /** Builds a parameter string like "'para1', 'para2', ..." */
        private function assemble(array $args): string {
            $str = '';
            if(count($args) === 0) return $str;

            foreach($args as $item)
                $str .= ', \''.$item.'\'';

            return substr($str, 2);
        }
        //---------------------------------------------------------------------
    }

?>