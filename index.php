<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Suggestion Box</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/main.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Suggestion Box</h1>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-12 p-5">
                    <p>Choose one or more files and click on Send.</p>

                    <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                        <div class="alert alert-success">
                            File(s) sent, thank you !
                        </div>
                    <?php endif; ?>

                    <form action="send.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="form-control" type="file" name="files[]" multiple="multiple" />
                            <input class="btn btn-success" type="submit" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
