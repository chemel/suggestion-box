<!DOCTYPE html>
<html>
<head>
    <title>Suggestion Box</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                            Files sent, thank you !
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
