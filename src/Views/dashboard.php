<div class="uk-grid">
    <div class="uk-width-1-1 uk-width-1-3@m uk-width-1-4@l">
        <div class="uk-grid">
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-1@m">
                <div class="uk-card uk-card-default uk-card-body  uk-margin-bottom">
                    <h4>Add Appointment</h4>
                    <form method="get" action="/appointments/add">
                        <input class="uk-input" type="number" name="phoneNumber" aria-label="phoneNumber" placeholder="Phone Number" required value="">
                        <div class="uk-margin-small">
                            <select name="date" id="date" class="uk-select">
                                <?php foreach ($availableDates as $key => $slot) : ?>
                                    <option value="<?php echo $slot['value']; ?>"><?php echo $slot['label']; ?></option>
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
                    <form method="get" action="/appointments/view">
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
        <div class="uk-flex uk-flex-between uk-flex-center">
            <h1 class="uk-h3 uk-margin-remove">Appointments (<?php echo count($appointments); ?>)</h1>
            <form action="" method="get" class="uk-flex">
                <select name="date" id="date" class="uk-select" required>
                    <option value="">Date</option>
                    <?php foreach ($availableDates as $key => $slot) : ?>
                        <option value="<?php echo $slot['value']; ?>" <?php if ($pickedDate == $slot['value']) : ?>selected<?php endif; ?>><?php echo $slot['label']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="uk-button uk-button-default uk-button-small" type="submit">Change</button>
            </form>
        </div>
        <?php if (count($appointments) > 0) : ?>
            <table class="uk-table uk-table-small  uk-table-divider uk-table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Phone Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value['appointmentNumber']; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['phoneNumber']; ?></td>
                            <td class="uk-text-right">
                                <a href="/appointments/view?id=<?php echo $value["id"]; ?>" class="uk-button uk-button-default uk-button-small">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="uk-margin-medium-top">
                <div class="uk-alert uk-alert-warning uk-text-center">
                    <span>No Appointments for <?php echo $pickedDate; ?>!</span>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>