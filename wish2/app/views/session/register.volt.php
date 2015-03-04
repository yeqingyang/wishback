
<?php echo $this->getContent(); ?>

<div class="page-header">
    <h2>Register for INVO</h2>
</div>

<?php echo $this->tag->form(array('session/register', 'id' => 'registerForm', 'class' => 'form-horizontal', 'onbeforesubmit' => 'return false')); ?>
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="name">Your Full Name</label>
            <div class="controls">
                <?php echo $this->tag->textField(array('name', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(required)</p>
                <div class="alert" id="name_alert">
                    <strong>Warning!</strong> Please enter your full name
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <?php echo $this->tag->textField(array('username', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(required)</p>
                <div class="alert" id="username_alert">
                    <strong>Warning!</strong> Please enter your desired user name
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Email Address</label>
            <div class="controls">
                <?php echo $this->tag->textField(array('email', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(required)</p>
                <div class="alert" id="email_alert">
                    <strong>Warning!</strong> Please enter your email
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <?php echo $this->tag->passwordField(array('password', 'class' => 'input-xlarge')); ?>
                <p class="help-block">(minimum 8 characters)</p>
                <div class="alert" id="password_alert">
                    <strong>Warning!</strong> Please provide a valid password
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="repeatPassword">Repeat Password</label>
            <div class="controls">
                <?php echo $this->tag->passwordField(array('repeatPassword', 'class' => 'input-xlarge')); ?>
                <div class="alert" id="repeatPassword_alert">
                    <strong>Warning!</strong> The password does not match
                </div>
            </div>
        </div>
        <div class="form-actions">
            <?php echo $this->tag->submitButton(array('Register', 'class' => 'btn btn-primary btn-large', 'onclick' => 'return SignUp.validate();')); ?>
            <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
        </div>
    </fieldset>
</form>
