<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="Description" content="Enter your description here"/>
            <!-- Bootstrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- font-awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <!-- Sweetalert2 -->
            <link rel="stylesheet" href="<?php echo SERVERURL; ?>public/plugin/SweetAlert/sweetalert2.min.css">
            
            <!-- DataTable -->
            <link rel="stylesheet" href="<?php echo SERVERURL; ?>public/plugin/DataTables/datatables.min.css">
            <!-- Selectpicker -->
            <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/css/bootstrap-select.min.css"> -->
            <link rel="stylesheet" href="<?php echo SERVERURL; ?>public/plugin/bootstrap-select-1.13.9/dist/css/bootstrap-select.min.css">
            <!-- Style -->    
            <link rel="stylesheet" href="<?php echo SERVERURL ?>views/css/style.css">


            <!-- SCRIPT -->

            <!-- Jquery -->
            <script src="<?php echo SERVERURL; ?>public/plugin/jquery/jquery.js"></script>
            <!-- Bootstrap -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <!-- sweetalert2 -->
            <script src="<?php echo SERVERURL; ?>public/plugin/SweetAlert/sweetalert2.min.js"></script>
            
            <!-- DataTables -->
            <script src="<?php echo SERVERURL; ?>public/plugin/DataTables/datatables.js"></script>
            <!-- Selectpicker -->
            <script src="<?php echo SERVERURL; ?>public/plugin/bootstrap-select-1.13.9/dist/js/bootstrap-select.js"></script>
            
            
            
            <title><?php echo COMPANY; ?></title>
        </head>
        <body class="contentBody">

            <div class="content-head">
                <!-- <h1 class="tituloH1"><?php echo COMPANY; ?></h1> -->
                <div class="content-menuHead ">
                    <ul class="menu">
                        <li> <a href="#" onclick="views(2);" class="">Cursos</a> </li>
                        <li> <a href="#" onclick="views(1);">Salones</a> </li>

                    </ul>
                </div>
            </div>
