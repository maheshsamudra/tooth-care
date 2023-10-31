<div class="uk-grid">
    <div class="uk-width-2-3@s uk-width-1-2@m uk-margin-auto">
        <h1 class="uk-margin-large-bottom  uk-text-center">Create an Account</h1>
        <form action="/register" method='post' class="uk-form-stacked">
            <div class="uk-margin">
                <label for="name" class="uk-form-label">Name</label>
                <input type="text" name="name" class="uk-input" placeholder="John Smith" required value="John Smith">
            </div>
            <div class="uk-margin">
                <label for="email" class="uk-form-label">Email address</label>
                <input type="email" name="email" class="uk-input" placeholder="yourname@example.com" required value="maheshsamudra@gmail.com">
            </div>
            <div class="uk-margin">
                <label for="password" class="uk-form-label">Password</label>
                <input type="password" name="password" class="uk-input" placeholder="******" required min="6" value="mahesh123">
            </div>
            <div class="uk-margin">
                <label for="confirm_password" class="uk-form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="uk-input" placeholder="******" required min="6" value="mahesh123">
            </div>
            <div class="uk-margin uk-flex uk-flex-between uk-flex-middle">
                <a href="/login">&larr; Back to login</a>
                <button class=" uk-button uk-button-primary">Register</button>
            </div>
        </form>
    </div>
</div>