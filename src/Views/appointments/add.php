<?php if ($slot->from) : ?>
    <form action="" method="post" class="uk-form-horizontal">
        <div class="uk-grid">
            <div class="uk-width-1-2@m uk-margin-auto">

                <h4>Appointment Details</h4>
                <h5>Appointment Number: <?php echo $appointmentNumber; ?></h5>
                <input type="text" name="appointmentNumber" value="<?php echo $appointmentNumber; ?>" hidden>
                <div class="uk-margin">
                    <label for="date" class="uk-form-label">Date</label>
                    <div class="uk-form-controls">
                        <input type="date" name="date" class="uk-input" placeholder="" required value="<?php echo $_GET['date']; ?>" readonly>
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="registrationFee" class="uk-form-label">Registration Fee Received?</label>
                    <div class="uk-form-controls">
                        <input class="uk-checkbox uk-margin-small-top" name="registrationFeePaid" type="checkbox">
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
                    <button class="uk-button uk-button-primary" type="submit">Add</button>
                </div>
            </div>
        </div>
    </form>
<?php else : ?>
    <div>
        <p>Cannot make appointments today. Please change the date.</p>
    </div>
<?php endif; ?>