    <form action="" method="post" class="uk-form-horizontal">
        <input type="text" name="id" hidden value="<?php echo $appointment->id; ?>">
        <div class="uk-grid">
            <div class="uk-width-1-2@m uk-margin-auto">

                <h4>Appointment Details</h4>
                <h5>Appointment Number: <?php echo $appointment->appointmentNumber; ?></h5>
                <input type="text" name="appointmentNumber" value="<?php echo $appointmentNumber; ?>" hidden>
                <div class="uk-margin">
                    <label for="date" class="uk-form-label">Date</label>
                    <div class="uk-form-controls">
                        <select name="date" id="date" class="uk-select">
                            <?php foreach ($availableDates as $key => $slot) : ?>
                                <option value="<?php echo $slot['value']; ?>" <?php if ($slot['value'] == $appointment->date) : ?>selected<?php endif; ?>><?php echo $slot['label']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="registrationFee" class="uk-form-label">Registration Fee Received</label>
                    <div class="uk-form-controls">
                        <input class="uk-checkbox uk-margin-small-top" name="registrationFeePaid" type="checkbox" <?php if ($appointment->registrationFee == 1000) : ?>checked disabled<?php endif; ?>>
                    </div>
                </div>

                <div class="uk-margin">
                    <label for="" class="uk-form-label">Services</label>
                    <div class="uk-form-controls">

                        <?php foreach ($services as $key => $service) : ?>
                            <?php
                            $key = array_search($service['id'], array_column($obtainedServices, 'serviceId'));
                            ?>
                            <label for="service<?php echo $service['id']; ?>" class="uk-display-block" style="padding-top: 6px;">
                                <input class="uk-checkbox" name="services[]" type="checkbox" <?php if ($key) : ?>checked<?php endif; ?> id="service<?php echo $service['id']; ?>" value="<?php echo $service['id']; ?>"> <?php echo $service['name']; ?>
                            </label>
                        <?php endforeach; ?>

                    </div>
                </div>

                <hr class="uk-margin-medium">


                <h4>Patient Details</h4>
                <input type="text" name="patientId" value="<?php echo $patient->id ?? ""; ?>" hidden>
                <div class="uk-margin">
                    <label for="name" class="uk-form-label">Name</label>
                    <div class="uk-form-controls">
                        <input type="text" name="patientName" class="uk-input" placeholder="" required value="<?php echo $patient->name ?? ""; ?>">
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="address" class="uk-form-label">Address</label>
                    <div class="uk-form-controls">
                        <input type="text" name="patientAddress" class="uk-input" placeholder="" required value="<?php echo $patient->address ?? ""; ?>">
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="emailAddress" class="uk-form-label">Email</label>
                    <div class="uk-form-controls">
                        <input type="text" name="patientEmailAddress" class="uk-input" placeholder="" required value="<?php echo $patient->emailAddress ?? ""; ?>">
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="phoneNumber" class="uk-form-label">Phone Number</label>
                    <div class="uk-form-controls">
                        <input type="number" name="patientPhoneNumber" class="uk-input" placeholder="" required value="<?php echo $patient->phoneNumber ?? $_GET['phoneNumber'] ?? ""; ?>" <?php echo !!$patient ? " readonly" : ""; ?>>
                    </div>
                </div>

                <div class="uk-text-right uk-margin">
                    <button class="uk-button uk-button-primary" type="submit">Update</button>
                </div>
            </div>
        </div>
    </form>