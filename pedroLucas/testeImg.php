<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <form method="POST">
            <div class="row">
                <div class="col s12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Foto</span>
                            <input type="file" name="file_img" id="file_img">
                        </div>

                        <div class="file-path-wrapper">                                
                            <input class="file-path validate" name="file_img" id="file_img" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s5">
                    <button type="submit" class="btn waves-effect" name="submit" >Inserir <i class="material-icons right">send</i> </button>
                </div>
            </div>
        </form>




        <?php
            if(isset($_POST['submit'])){

                $fileTmp = $_FILES["file_img"]["tmp_name"];
                $fileName = $_FILES["file_img"]["name"];
                $fileType = $_FILES["file_img"]["type"];
                $filePath = "imgAtor/" . $fileName;
    
                move_uploaded_file($fileTmp, $filePath);
            }
        ?>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>