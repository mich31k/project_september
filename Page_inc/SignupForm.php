
<!-- 
    Author : Lene Tramm
    Made on : 28-09-2017 @ 20:41:07
-->
    <?php include_once './Scripts/ShowHideScript.html'; ?>

    <div class="modal-dialog">
        <div class="dialog-header">
            <div class="dialog-title">Sign Up</div>
            <button class="dialog-cls-btn" onClick="div_hide('SignUpDiv')">x</button>
        </div>
        <div class="clear"></div>
        <form action="./Page_inc/SignUp.php" method="post">
            <div class="input-fld">
                <div class="label" >Username</div>
                <input class="main-inpt" name="username" type="text" />
            </div>
            <div class="input-fld">
                <div class="label">Email</div>
                <input class="main-inpt" name="email" type="text" />
            </div>
            <div class="input-fld">
                <div class="label">Password</div>
                <input class="main-inpt" name="password" type="password" />
            </div>
            <div class="space-5pxno"></div>
            <div class="button-area">
                <input type="submit" value="Sign Up" class="prime-btn med rt-side" />
            </div>
            <div class="space-10pxno"></div>
        </form>
    </div>

