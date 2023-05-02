<?php
// start session
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Bulk SMS </title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
</head>
<body  class=" border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    <div class="container-tight py-4">
        <?php
        if (isset($_SESSION['success'])) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <h4 class="alert-title">Wow! Everything worked!</h4>
                        <div class="text-muted">Your message has been sent!</div>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            <?php
            unset($_SESSION['success']);
        }
        ?>
        <form class="card card-md" action="api.php" method="post" autocomplete="off">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Send an SMS Message</h2>
                <div class="mb-3">
                    <label class="form-label">SMS Platform</label>
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                        <label class="form-selectgroup-item flex-fill">
                            <input type="radio" name="form-post" value="mobitech" class="form-selectgroup-input" checked>
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    <strong>Mobitech Technologies</strong>
                                </div>
                            </div>
                        </label>
                        <label class="form-selectgroup-item flex-fill">
                            <input type="radio" name="form-post" value="africastalking" class="form-selectgroup-input">
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    <strong>Africa's talking</strong>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Recepient Phone Numbers</label>
                    <input type="text"  class="form-control "  id="number" name="number">
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" data-bs-toggle="autosize" name="message" placeholder="Write something…"></textarea>                </div>
                <div class="form-footer">
                    <button type="submit" name="submit" class="btn btn-primary w-100">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="./dist/js/tabler.min.js"></script>
<script src="./dist/js/demo.min.js"></script>
</body>
</html>