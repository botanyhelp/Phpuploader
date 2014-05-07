<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" enctype="multipart/form-data">
        <input type="file" name="uploadedfile"/>
        <br />
        <input type="submit" value="Upload File"/>
        <br />
        </form>
<?php } else { 
        if (isset($_FILES['uploadedfile']) && ($_FILES['uploadedfile']['error'] == UPLOAD_ERR_OK)) {
                $saveHere = '/var/www/html/uploaded/' . basename($_FILES['uploadedfile']['name']);
                if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $saveHere)) {
                        print "SUCCESS: File saved to $saveHere <br />";
                        print '<br /><a href="/photoUp.php">Upload more files</a><br />';
                        print '<br /><a href="/uploaded/">View uploaded files</a><br />';
                } else {
                        print "FAILURE: move_uploaded_file to $saveHere did not complete properly";
                        print '<br /><a href="/photoUp.php">Upload more files</a><br />';
                        print '<br /><a href="/uploaded/">View uploaded files</a><br />';
                }
        } else {
                print "FAILURE: No file uploaded.";
                print '<br /><a href="/photoUp.php">Upload more files</a><br />';
                print '<br /><a href="/uploaded/">View uploaded files</a><br />';
        }
}
?>

