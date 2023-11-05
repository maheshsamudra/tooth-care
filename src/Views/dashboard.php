<div class="uk-grid">
    <div class="uk-width-1-1 uk-width-1-3@m uk-width-1-4@l">
        <div class="uk-grid">
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-1@m">
                <div class="uk-card uk-card-default uk-card-body  uk-margin-bottom">
                    <h4>Add Appointment</h4>
                    <form method="get" action="/appointments/add">
                        <input class="uk-input" type="number" name="phoneNumber" aria-label="phoneNumber" placeholder="Phone Number" required value="0712345678">
                        <div class="uk-margin-small">
                            <select name="date" id="date" class="uk-select">
                                <?php if (array_search(date("l"), array_column($slots, 'day'))) : ?>
                                    <option value="<?php echo date("Y-m-d"); ?>"><?php echo date("l, d M Y"); ?></option>
                                <?php endif; ?>
                                <?php foreach ($slots as $key => $slot) : ?>
                                    <?php if ($slot['from']) : $day = $slot['day']; ?>
                                        <option value="<?php echo date("Y-m-d", strtotime("next $day")); ?>"><?php echo date("l, d M Y", strtotime("next $day")); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach ($slots as $key => $slot) : ?>
                                    <?php if ($slot['from']) : $day = $slot['day']; ?>
                                        <option value="<?php echo date("Y-m-d", strtotime("second $day")); ?>"><?php echo date("l, d M Y", strtotime("second $day")); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="uk-button uk-button-default" type="submit">Next</button>
                    </form>

                </div>
            </div>

            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-1@m">
                <div class="uk-card uk-card-default uk-card-body  uk-margin-bottom">
                    <h4>Search Appointment</h4>
                    <form method="get" action="/search-appointment">
                        <input class="uk-input" type="date" name="date" aria-label="Date" placeholder="Date" required>
                        <div class="uk-margin-small">
                            <input class="uk-input" name="appointmentNumber" type="text" aria-label="Appointment Number" placeholder="Appointment Number" required>
                        </div>
                        <button class="uk-button uk-button-default" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="uk-width-1-1 uk-width-2-3@m uk-width-3-4@l">
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