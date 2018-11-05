<?php namespace countrydropdown;

    use common\Omni;
    use database\MYSQLXArgs;
?>
    <!-- HTML -->
    <div class="form-group">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text" >Land Auswahl</div>
            </div>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" name="_countrySelect" onchange="form.submit();">
                <option></option>
                <!-- PHP -->
                <?php
                    // dynamically fill the dropdown:
                    Omni::dbExec( function (MYSQLXArgs $xArgs) {
                            //-------------------------------------------------
                            //Set the execution arguments...
                            $xArgs->schema        = 'classicmodels';
                            $xArgs->procedure     = 'GET_CUSTOMER_COUNTRIES';
                            //-------------------------------------------------
                            //...and define the result handling lambda.
                            $xArgs->resultHandler = function ($row) {
                                echo
                                    '<option value="'.$row->country.'">'
                                    .$row->label
                                    .'</option>';
                            };
                            //-------------------------------------------------                    
                    });
                ?>
            </select>
        </div>
    </div>