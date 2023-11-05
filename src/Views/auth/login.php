<div class="uk-grid">
    <div class="uk-width-2-3@s uk-width-1-2@m uk-margin-auto">
        <h1 class="uk-margin-large-bottom uk-text-center">Log in to your account</h1>
        <form action="/login" method='post' class="uk-form-stacked">
            <div class="uk-margin">
                <label for="username" class="uk-form-label">Username</label>
                <input type="text" name="username" class="uk-input" placeholder="" required value="maheshsamudra">
            </div>
            <div class="uk-margin">
                <label for="password" class="uk-form-label">Password</label>
                <input type="password" name="password" class="uk-input" placeholder="" required min="6" value="mahesh123">
            </div>
            <div class="uk-margin uk-flex uk-flex-between uk-flex-middle">
                <small><u class="uk-text-muted uk-padding-small-top uk-padding-small-bottom uk-padding-small-right" uk-tooltip="Contact us to get started.">Don't have an account?</u></small>
                <button class=" uk-button uk-button-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>