   <div class="modal-dialog">
        <div class="dialog-header">
        <div class="dialog-title">Sign In</div>
            <button class="dialog-cls-btn" onClick="div_hide('SignInDiv')">x</button>
        </div>
        <div class="clear"></div>
        <form action="./Page_inc/SignIn.php" method="post">
            <div class="input-fld">
                <div class="label">Email</div>
                <input class="main-inpt" name="email" type="text" />
            </div>
            <div class="input-fld">
                <div class="label" >Password</div>
                <input class="main-inpt" name="password" type="password" />
            </div>
            <div class="space-5pxno"></div>
            <div class="button-area">
                <input type="submit" value="Sign In" class="prime-btn med rt-side" />
            </div>
            <div class="space-10pxno"></div>
        </form>
    </div>