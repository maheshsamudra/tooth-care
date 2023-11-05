<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="/favicon.png" />

    <link rel="stylesheet" href="/assets/css/uikit.min.css" />

</head>

<body>

    <div class="uk-flex uk-flex-column" style="min-height: 100vh">

        <nav class="uk-navbar-container">
            <div class="uk-container">
                <div class="uk-navbar">

                    <div class="uk-navbar-left">

                        <a class="uk-navbar-item uk-logo uk-text-primary uk-text-light" href="/" aria-label="Back to Home">
                            <img src="/assets/images/logo.png" alt="Logo" height="32" width="32">
                            Tooth Care
                        </a> | <h1 class="uk-margin-remove uk-h5 uk-text-light"><?php echo $title; ?></h1>

                    </div>

                    <?php if (isset($user)) : ?>

                        <div class="uk-navbar-right">

                            <div class="uk-navbar-item">
                                <div>Welcome <?php echo $user->firstName; ?>!</div>
                            </div>

                            <ul class="uk-navbar-nav">

                                <li><a href="/logout" class="uk-flex uk-flex-center" uk-tooltip="title: Logout; pos: left"><span uk-icon="sign-out"></span>
                                    </a></li>


                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </nav>

        <div style="flex-grow: 1">

            <?php if (isset($successMessages) && $successMessages) : ?>
                <div class="uk-margin-top uk-margin-bottom">
                    <div class="uk-container">
                        <div class="uk-alert uk-alert-warning">
                            <a href class="uk-alert-close" uk-close></a>
                            <ul>
                                <?php foreach ($successMessages as $message) {
                                    echo "<li>$message</li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if (isset($warningMessages) && $warningMessages) : ?>
                <div class="uk-margin-top uk-margin-bottom">
                    <div class="uk-container">
                        <div class="uk-alert uk-alert-warning">
                            <a href class="uk-alert-close" uk-close></a>
                            <ul>
                                <?php foreach ($warningMessages as $message) {
                                        echo "<li>$message</li>";
                                    } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($errorMessages) && $errorMessages) : ?>
                <div class="uk-margin-top uk-margin-bottom">
                    <div class="uk-container">
                        <div class="uk-alert uk-alert-danger">
                            <a href class="uk-alert-close" uk-close></a>
                            <ul>
                                <?php foreach ($errorMessages as $message) {
                                    echo "<li>$message</li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="uk-margin-large-top uk-margin-large-bottom uk-container">