<?php ! is_logged_in() OR show_404() ?>


<form action="<?php echo base_url() ?>account/login" method="post" id="login" enctype="multipart/form-data">
    <h2>Login</h2>
    <div class="--input">
        <span>ID</span>
        <input type="text" name="id" placeholder="ID">
    </div>
    <div class="--input">
        <span>Password</span>
        <input type="password" name="password" placeholder="Password">
    </div>
    <div class="--submit right">
        <input type="submit" value="LOGIN">
    </div>
</form>
