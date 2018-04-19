<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>uploads Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>

<body>

<div class="container ">
    <div class="col-8">
        <h1>Select image to upload:</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file"></label>
                <input id='upload' type="file" name="file[]" multiple="multiple">
                <button type="submit" name="submit" class="btn btn-primary">upload</button>
            </div>
        </form>
    </div>
</div>

<div class="flex-row">
    <?php

    $themeDir = __DIR__.'/uploads';

    $iterator = new FilesystemIterator($themeDir);

    if (isset($_POST['Delete'])) {
        $fichier = 'uploads/' . $_POST['vignette'];

        if( file_exists ( $fichier)) {
            unlink( $fichier );
        }
    }

    foreach($iterator as $file) {
        ?>
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="<?= 'uploads/' . $file->getfilename()?>" alt="Fichier" />
                <p><?= $file->getfilename() ?></p>
                <form method="post" action="index.php">
                    <input type="hidden" name="vignette" value="<?= $file->getfilename() ?>"/>
                    <button type="submit" name="Delete">Delete</button>
                </form>
            </a>
        </div>
        <?php
    }
    ?>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
</body>
</html>
