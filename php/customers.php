<?php namespace customers;
    use common\Omni;
    use database\MYSQLXArgs;
?>
    <!-- HTML -->
    <h4>Kunden:</h4>
    <table id="_table" class="table table-sm table-striped table-bordered table-hover">
        <thead class="thead-light">
            <tr class="">
                <th>Kunde</th>
                <th>Name</th>
                <th>Stadt</th>
                <th>Land</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP -->
            <?php
                Omni::dbExec( function (MYSQLXArgs $xArgs) {
                        //-----------------------------------------------------
                        //Set the execution arguments...
                        $xArgs->schema    = 'classicmodels';
                        $xArgs->procedure = 'GET_CUSTOMERS_BY_COUNTRY';
                        // collect form input data...
                        $xArgs->args[] = 
                                Omni::request("_countrySelect") !== '' ?
                                    Omni::request("_countrySelect") :
                                    Omni::request("_countryInput" ); 
                        //-----------------------------------------------------
                        //...and define column render for each row:
                        $xArgs->resultHandler = function ($row) {
                            echo 
                                '<tr>'
                                    .'<td>'.$row->customer.'</td>'
                                    .'<td>'.$row->name    .'</td>'
                                    .'<td>'.$row->city    .'</td>'
                                    .'<td>'.$row->country .'</td>'
                                .'</tr>';
                        };
                        //-----------------------------------------------------
                });
            ?>
        </tbody>
    </table>