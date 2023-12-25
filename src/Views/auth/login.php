<div class="uk-grid">
    <div class="uk-width-2-3@s uk-width-1-2@m uk-margin-auto">
        <h1 class="uk-margin-large-bottom uk-text-center">Welcome back!</h1>
        <form action="/login" method='post' class="uk-form-stacked">
            <div class="uk-margin">
                <label for="username" class="uk-form-label">Username</label>
                <input type="text" name="username" autofocus class="uk-input" placeholder="" required value="<?php echo $post['username'] ?? ''; ?>">
            </div>
            <div class="uk-margin">
                <label for="password" class="uk-form-label">Password</label>
                <input type="password" name="password" class="uk-input" placeholder="" required min="6" value="<?php echo $post['password'] ?? ''; ?>">
            </div>
            <div class="uk-margin uk-flex uk-flex-between uk-flex-middle">
                <small><u class="uk-text-muted uk-padding-small-top uk-padding-small-bottom uk-padding-small-right" uk-tooltip="Please contact the administrator to get started.">Don't have an account?</u></small>
                <button class=" uk-button uk-button-primary" type="submit">Login</button>
            </div>
        </form>

        <hr>
    </div>
</div>