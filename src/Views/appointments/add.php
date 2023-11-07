<?php if ($slot->from) : ?>
    <form action="" method="post">
        <div class="uk-grid">
            <div class="uk-width-1-2@m uk-margin-auto">
                <h4>Patient Details</h4>
                <input type="text" name="patientId" value="<?php echo $patient->id ?? ""; ?>" hidden>
                <div class="uk-margin">
                    <label for="name" class="uk-form-label">Name</label>
                    <input type="text" name="patientName" class="uk-input" placeholder="" required value="<?php echo $patient->name ?? ""; ?>">
                </div>
                <div class="uk-margin">
                    <label for="address" class="uk-form-label">Address</label>
                    <input type="text" name="patientAddress" class="uk-input" placeholder="" required value="<?php echo $patient->address ?? ""; ?>">
                </div>
                <div class="uk-margin">
                    <label for="emailAddress" class="uk-form-label">Email</label>
                    <input type="text" name="patientEmailAddress" class="uk-input" placeholder="" required value="<?php echo $patient->emailAddress ?? ""; ?>">
                </div>
                <div class="uk-margin">
                    <label for="phoneNumber" class="uk-form-label">Phone Number</label>
                    <input type="number" name="patientPhoneNumber" class="uk-input" placeholder="" required value="<?php echo $patient->phoneNumber ?? $_GET['phoneNumber'] ?? ""; ?>" <?php echo !!$patient ? " readonly" : ""; ?>>
                </div>

                <hr class="uk-margin-medium">

                <h4>Appointment Details</h4>
                <h5>Appointment Number: <?php echo $appointmentNumber; ?></h5>
                <input type="text" name="appointmentNumber" value="<?php echo $appointmentNumber; ?>" hidden>
                <div class="uk-grid uk-child-width-1-2">
                    <div class="">
                        <label for="date" class="uk-form-label">Date</label>
                        <input type="date" name="date" class="uk-input" placeholder="" required value="<?php echo $_GET['date']; ?>" readonly>
                    </div>
                    <div class="">
                        <label for="registrationFee" class="uk-form-label">Registration Fee</label>
                        <div>
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon">Rs.</span>
                                <input type="number" name="registrationFee" class="uk-input uk-width-1-1" placeholder="" required value="<?php echo REGISTRATION_FEE; ?>">
                            </div>
                        </div>
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