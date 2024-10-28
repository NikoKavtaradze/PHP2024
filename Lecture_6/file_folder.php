<div class="test">
<?php
    if(isset($_POST['folder'])){
        $n_folder = $_POST['folder'];
        mkdir("MyDrive/".$n_folder);
    }

    if(isset($_POST['file'])){
        $n_file = $_POST['file'];
        fopen("MyDrive/".$n_file.".txt", "w");
    }

    if(isset($_POST['new_name'])){
        $new_name = $_POST['new_name'];
        $old_name = $_POST['old_name'];
        if(!is_file("MyDrive/".$old_name)){
            if(!is_dir("MyDrive/".$new_name)){
                rename("MyDrive/".$old_name, "MyDrive/".$new_name);
            }else{
                echo "<script>alert('The folder exists.')</script>";
            }
        }else{
            if(!file_exists("MyDrive/".$new_name)){
                rename("MyDrive/".$old_name, "MyDrive/".$new_name.".txt");
            }else{
                echo "<script>alert('The File exists.')</script>";
            }
        }
    }

    if(isset($_GET['source'])){
        $source = "MyDrive/".$_GET['source'];
        // echo $source;
        if(is_file($source)){
            unlink($source);
        }else{
                rmdir($source);
        }
    }

    if(isset($_POST["up_file"])){
        $up_file = $_POST["up_file"];
        $file = $_FILES["uploaded_file"];
        $new_source = "MyDrive/".$file["name"];
        echo "<pre>";
        print_r($file);
        echo "</pre>";
        move_uploaded_file($file["tmp_name"], $new_source);
    }

    if (isset($_GET['view'])) {
        $filePath = "MyDrive/" . $_GET['view'];
        if (is_file($filePath)) {
            $fileContent = file_get_contents($filePath);
            echo "<div class='file-content'><h3>File Content:</h3><pre>$fileContent</pre></div>";
        }
    }
    if (isset($_GET['edit'])) {
        $fileToEdit = "MyDrive/" . $_GET['edit'];
        if (is_file($fileToEdit)) {
            $fileContent = file_get_contents($fileToEdit);
            ?>
            <div class="edit-form">
                <h3>Editing: <?= $_GET['edit'] ?></h3>
                <form action="" method="post">
                    <textarea name="file_content" rows="10" cols="50"><?= htmlspecialchars($fileContent) ?></textarea>
                    <input type="hidden" name="file_path" value="<?= $fileToEdit ?>">
                    <button type="submit" name="save_changes">Save Changes</button>
                </form>
            </div>
            <?php
        }
    }


    if (isset($_POST['save_changes'])) {
        $filePath = $_POST['file_path'];
        $newContent = $_POST['file_content'];
        file_put_contents($filePath, $newContent);
        echo "<p>File edited successfully!</p>";
    }
    $scan = scandir("MyDrive");

    

    // echo "<pre>";
    // print_r($scan);
    // echo "</pre>";
?>
</div>