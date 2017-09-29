    <?php include_once './Scripts/ShowHideScript.html'; ?>

    <div class="modal-dialog">
        <div class="dialog-header">
            <div class="dialog-title">Upload</div>
            <button class="dialog-cls-btn" onClick="div_hide('UploadDiv')">x</button>
        </div>
        <div class="clear"></div>
        <form action="./Page_inc/Upload.php" enctype="multipart/form-data" method="post">
            <div class="input-fld">
                <div class="label" >Image</div>
                <input class="main-inpt"  type='file' name='img' />
            </div>
            <div class="space-5pxno"></div>
            <div class="button-area">
                <input type="submit" value="Upload" class="prime-btn med rt-side" />
            </div>
            <div class="space-10pxno"></div>
        </form>
    </div>