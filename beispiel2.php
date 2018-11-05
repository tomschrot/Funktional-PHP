<?php namespace index; 
    require 'php/loader.php';
    require 'php/config.php';

    use common\Omni;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-store,no-cache">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Functional PHP</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>

    <body>
        <div id="_mainContainer" class="container">
            <!-- Headline -->
            <div class="row mt-3">
                <h4>Functional PHP Demo</h4>
            </div>
            <!-- Form -->
            <div class="row mt-3">
                <form method="post">
                    <!-- Dropdown -->
                    <div class="form-row">
                        <?php require 'php/countrydropdown.php' ?>
                    </div>
                    <!-- Input Search -->
                    <div class="form-row">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text" > oder </div>
                            </div>
                            <input type="text" class="form-control" name="_countryInput" value="<?php echo Omni::request('_countryInput'); ?>">
                            <div class="input-group-append input-group-sm">
                                <button type="submit" class="btn btn-outline-secondary" > suche </button>
                            </div>
                        </div>        
                    </div>
                </form>
            </div>
            <!-- Table output -->
            <div class="row mt-3">
                <?php require 'php/customers.php' ?>
            </div>
        </div>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>