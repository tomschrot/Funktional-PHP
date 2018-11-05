<?php namespace database;

    use database\iConnection;

    /** 
     * Encapsulates a MYSQL server connection. 
     * @copyright 2018 Tom Schröter
    */
    class MYSQL {
        //---------------------------------------------------------------------
        protected $_db = null;
        //---------------------------------------------------------------------
        /**  
         * Ctor
         * @param iConnection $connection Tuple with connection data. 
         * 
        */
        function __construct(iConnection $connection) {
            if(!$this->open($connection))
                throw(new \Exception('Could not connect to '.$connection->server()));
            $this->_db->set_charset('utf8');
        }
        //---------------------------------------------------------------------
        /**
         * Opens a SQL connection.
         * 
         * @param iConnection $connection Tuple with connection data.
         * 
         * @return bool True if connection is opened. 
         * */
        function open(iConnection $connection): bool {
            $this->_db = 
                \mysqli_connect(
                    $connection->server(),
                    $connection->user(),
                    $connection->password()
                );
            return $this->isConnected();
        }
        //---------------------------------------------------------------------
        /**
         * Status of the SQL connection.
         *  
         * @return bool True if SQL connection is established.
         * */
        function isConnected(): bool {
            return ($this->_db !== false);
        }
        //---------------------------------------------------------------------
        /**
         * Used to execute an database procedure. It creates an instance of an 
         * @see database\MYSQLXArgs class and calls the configurating lambda.
         * @param callable $action The lambda that configures the execution arguments.
         */
        function execute(callable $config): int {
            $xargs = new MYSQLXArgs;
            $config($xargs);
            return $this->query($xargs->__toString(), $xargs->resultHandler);
        }
        //---------------------------------------------------------------------
        /**
         * Performs a query against the SQL database.
         * 
         * @param string   $query   The SQL query string.
         * @param callable $action  Lambda being called for each result row.
         */
        function query(string $query, callable $action): int {
            if($this->_db->multi_query($query))
                do{
                    $result = $this->_db->store_result();
                    if( !is_bool($result) )
                        $this->each($result, $action);
                }while( $this->_db->more_results() && $this->_db->next_result() );

            return $this->_db->errno;
        }
        //---------------------------------------------------------------------
        private function each($result, callable $action): void {
            while($row = $result->fetch_object())
                if($action !== null)
                    $action($row);
            $result->free();
        }
        //---------------------------------------------------------------------
    }
?>
