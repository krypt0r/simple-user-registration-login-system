<p class="h4 text-center mb-4">Edit Details</p>
<!-- Material input text -->
<div class="md-form">
    <i class="fa fa-user prefix grey-text"></i>
    <input name="updateName" type="text" id="materialFormRegisterNameEx" class="form-control" value="<?php echo $name;?>">
    <label for="materialFormRegisterNameEx">Your name</label>
</div>
<!-- Material input email -->
<div class="md-form">
    <i class="fa fa-envelope prefix grey-text"></i>
    <input name="updateEmail" type="email" id="materialFormLoginEmailEx" class="form-control" value="<?php echo $email;?>">
    <label for="materialFormLoginEmailEx">Your email</label>
</div>

<!-- Material input password -->


<div class="text-center mt-4">
    <button name="save" class="btn btn-deep-orange btn-sm" type="submit">Save</button>
</div>
