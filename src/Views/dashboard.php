<div class="uk-grid">
    <div class="uk-width-1-1 uk-width-1-3@m uk-width-1-4@l">
        <div class="uk-grid">
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-1@m">
                <div class="uk-card uk-card-default uk-card-body  uk-margin-bottom">
                    <h4>Add Appointment</h4>
                    <form method="get" action="/add-appointment">
                        <input class="uk-input uk-margin-small-bottom" type="number" name="phoneNumber" aria-label="phoneNumber" placeholder="Phone Number" required value="0712345678">
                        <div class="uk-inline uk-width-1-1">
                            <button class="uk-form-icon uk-form-icon-flip" type="submit" uk-icon="icon: chevron-right"></button>
                            <input class="uk-input" type="date" name="date" min="<?php echo date("Y-m-d"); ?>" aria-label="Date" placeholder="Date" required value="2023-11-10">
                        </div>
                    </form>

                </div>
            </div>

            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-1@m">
                <div class="uk-card uk-card-default uk-card-body  uk-margin-bottom">
                    <h4>Search Appointment</h4>
                    <form method="get" action="/search-appointment">
                        <input class="uk-input uk-margin-small-bottom" type="date" name="date" aria-label="Date" placeholder="Date" required>
                        <div class="uk-inline uk-width-1-1">
                            <button class="uk-form-icon uk-form-icon-flip" type="submit" uk-icon="icon: chevron-right"></button>
                            <input class="uk-input" name="appointmentNumber" type="text" aria-label="Appointment Number" placeholder="Appointment Number" required>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="uk-width-1-1 uk-width-1-3@m uk-width-1-4@l">
        <table class="uk-table uk-table-small">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Appointment Number</th>
                    <th>Patient</th>
                    <th>ID</th>
                </tr>
            </thead>
        </table>
    </div>
</div>