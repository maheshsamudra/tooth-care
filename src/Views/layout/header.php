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
                        </a>

                    </div>

                    <?php if (isset($user)) : ?>

                        <div class="uk-navbar-right">

                            <div class="uk-navbar-item">
                                <div>Welcome <?php echo $user->firstName; ?>!</div>
                            </div>

                            <ul class="uk-navbar-nav">

                                <li><a href="/logout" class="uk-flex uk-flex-center"><span uk-icon="sign-out"></span>
                                    </a></li>


                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </nav>

        <div style="flex-grow: 1">

            <?php if (isset($alert) && $alert->messages && $alert->type) : ?>
                <div class="uk-margin-top uk-margin-bottom">
                    <div class="uk-container">
                        <div class="uk-alert-<?php echo $alert->type; ?>" uk-alert>
                            <a href class="uk-alert-close" uk-close></a>
                            <ul>
                                <?php foreach ($alert->messages as $message) {
                                    echo "<li>$message</li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="uk-margin-large-top uk-margin-large-bottom uk-container">