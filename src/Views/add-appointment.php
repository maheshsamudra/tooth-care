<?php if ($slot->from) : ?>
    <form action="" method="post">
        <div class="uk-grid">
            <div class="uk-width-1-2@m">
                <h4>Patient Details</h4>
                <input type="text" name="id" value="<?php echo $patient->id ?? ""; ?>" hidden>
                <div class="uk-margin">
                    <label for="name" class="uk-form-label">Name</label>
                    <input type="text" name="name" class="uk-input" placeholder="" required value="<?php echo $patient->name ?? ""; ?>">
                </div>
                <div class="uk-margin">
                    <label for="address" class="uk-form-label">Address</label>
                    <input type="text" name="address" class="uk-input" placeholder="" required value="<?php echo $patient->address ?? ""; ?>">
                </div>
                <div class="uk-margin">
                    <label for="emailAddress" class="uk-form-label">Email</label>
                    <input type="text" name="emailAddress" class="uk-input" placeholder="" required value="<?php echo $patient->emailAddress ?? ""; ?>">
                </div>
                <div class="uk-margin">
                    <label for="phoneNumber" class="uk-form-label">Phone Number</label>
                    <input type="text" name="phoneNumber" class="uk-input" placeholder="" required value="<?php echo $patient->phoneNumber ?? ""; ?>">
                </div>
            </div>
            <div class="uk-width-1-2@m">
                <h4>Appointment Details - # <?php echo count($appointments) + 1; ?></h4>
                <div class="uk-grid uk-child-width-1-2">
                    <div class="">
                        <label for="date" class="uk-form-label">Date</label>
                        <input type="date" name="date" class="uk-input" placeholder="" required value="<?php echo $_GET['date']; ?>" disabled>
                    </div>

                    <div class="">
                        <label for="start" class="uk-form-label">Estimated Start Time</label>
                        <input type="time" name="start" class="uk-input" placeholder="" required disabled>
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="registrationFee" class="uk-form-label">Registration Fee</label>
                    <div>
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon">Rs.</span>
                            <input type="number" name="registrationFee" class="uk-input uk-width-1-1" placeholder="" required value="<?php echo REGISTRATION_FEE; ?>">
                        </div>
                    </div>
                </div>

                <label for="">Services (Optional)</label>
                <div class="uk-margin-bottom uk-grid uk-child-width-1-2@s">
                    <?php foreach ($services as $key => $service) : ?>
                        <div>
                            <label class="uk-block"><input class="uk-checkbox" type="checkbox" value="<?php echo $service['id']; ?>">&nbsp;&nbsp;<?php echo $service['name']; ?></label>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="uk-text-right">
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