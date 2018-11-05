<?php

    /**
     * Simple auto loader.
     * @copyright 2018 Tom Schröter
     */
    final class AutoLoad {
        //---------------------------------------------------------------------
        static public function fromLIB($className) {
            require
                'php-lib/'
                .str_replace('\\', '/', $className).'.php';
        }
        //---------------------------------------------------------------------
    }
    
    spl_autoload_register('AutoLoad::fromLIB');
?>
