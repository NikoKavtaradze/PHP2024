<?php
    include "file_folder.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lercture 5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="controls">
            <div class="row">
                <a href="index.php">HOME</a>
            </div>
            <div class="row">
                <form action="" method="post">
                    <input type="text" placeholder="name" name="folder"> <button>Create Folder</button>
                </form>
            </div>
            <div class="row">
                <form action="" method="post">
                    <input type="text" placeholder="name" name="file"> <button>Create File</button>
                </form>
            </div>
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" placeholder="name" name="uploaded_file"> 
                    <button name="up_file">Upload File</button>
                </form>
            </div>
        </div>
        <div class="content">
            <table class="dataset">
                <tr>
                    <th>Name</th>
                    <th>Rename</th>
                    <th>Delete</th>
                    <th>Download</th>
                </tr>
                <?php
                    for($i=2; $i<count($scan); $i++){
                ?>
                <tr>
                    <td class="<?=is_file("MyDrive/".$scan[$i])?"file":"folder"?>">
                        <span> <?=$scan[$i]?> 
                            <a href="?view=<?=$scan[$i]?>">View</a>
                            <a href="?edit=<?=$scan[$i]?>">Edit</a>
                        </span>
                    </td>
                    <td style="width:25%">
                        <form action="" method="post">
                            <input type="text" plcaeholder="rename" name="new_name">
                            <input type="hidden" name="old_name" value="<?=$scan[$i]?>">
                            <button>Rename</button>
                        </form>
                    </td>
                    <td>
                        <a href="?source=<?=$scan[$i]?>">delete</a>
                    </td>       
                    <td>
                        <a href="<?="MyDrive/".$scan[$i]?>" download><?=is_file("MyDrive/".$scan[$i])?"download":""?></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>