<div class="uk-grid">
    <div class="uk-width-1-2@m uk-margin-auto">
        <h1 class="uk-margin-large-bottom uk-text-center">Log in to your account</h1>
        <form action="/login" method='post' class="uk-form-stacked">
            <div class="uk-margin">
                <label for="email" class="uk-form-label">Email address</label>
                <input type="email" name="email" class="uk-input" placeholder="yourname@example.com" required value="maheshsamudra@gmail.com">
            </div>
            <div class="uk-margin">
                <label for="password" class="uk-form-label">Password</label>
                <input type="password" name="password" class="uk-input" placeholder="******" required min="6" value="mahesh123">
            </div>
            <div class="uk-margin uk-flex uk-flex-between uk-flex-middle">
                <a href="/register">Create an account &rarr;</a>
                <button class=" uk-button uk-button-primary">Login</button>
            </div>
        </form>
    </div>
</div>