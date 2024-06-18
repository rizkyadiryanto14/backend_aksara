<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--	<link rel="shortcut icon" href="-->
    <?php //echo base_url('back_assets/img/pkk_baru_dark.png') 
    ?>
    <!--" type="image/x-icon">-->
    <title>Belajar Aksara</title>
    <!-- CCS utama -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- styled -->
    <style type="text/css">
        * {
            transition: all 0.6s;
        }

        body {
            color: #888;
            width: 100%;
            margin: 0;
            user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
        }

        #main {
            display: table;
            width: 100%;
            height: 100vh;
            text-align: center;
        }

        .fof {
            display: table-cell;
            vertical-align: middle;
        }

        .fof h1 {
            font-size: 36px;
            display: inline-block;
            padding-right: 12px;
        }

        .klip {
            animation: type .4s alternate infinite;
        }

        @keyframes type {
            from {
                box-shadow: inset -3px 0px 0px #888;
            }

            to {
                box-shadow: inset -3px 0px 0px transparent;
            }
        }
    </style>
</head>

<body style="background-color: #f5f5f5; user-select:none; -moz-user-select:none; -ms-user-select:none; -khtml-user-select:none; -webkit-user-select:none;">
    <div class="container">
        <div class="mt-5">
            <div class="row">
                <div class="col-12 col-md-6 text-center mt-3 mx-auto p-3">
                    <img src="<?= base_url('assets/images/aksara_logo.png') ?>" width="30%" />
                    <br>
                    <h1 class="h2" style="font-size: 28px;">Belajar Aksara</h1>
                    <p class="lead">Sign In to System</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 mx-auto mt-6">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 mx-auto mt-6">
                    <form action="<?= base_url('auth/login'); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" minlength="2" maxlength="32" name="username" placeholder="Username" required autofocus />
                        </div>
                        <div class="form-group">
                            <input type="password" minlength="2" maxlength="32" title="Four characters is the minimum password" class="form-control" name="password" placeholder="Password" required />
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div class="custom-control custom-checkbox">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary w-100" value="Sign In" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>