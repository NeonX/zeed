<?php

    $filename  = $_FILES['file']['name'];
    $typefile  = $_FILES['file']['type']; 
    $sizefile  = $_FILES['file']['size']; 
    $tmpname   = $_FILES['file']['tmp_name'];
    $storefile = "./images_upload/original/original_". time() . '_' . $filename;
    $thumbfile = "./images_upload/thumb/thumb_". time() . '_' . $filename;

    if (move_uploaded_file($tmpname, $storefile)) {
        require_once './common/phpthumb/ThumbLib.inc.php';
        $thumb = PhpThumbFactory::create($storefile);
        $thumb->adaptiveResize(320, 250);
        $thumb->save($thumbfile);

    }
?>
<script language="JavaScript">
    window.parent.uploadok('<?=$thumbfile?>');
</script>
