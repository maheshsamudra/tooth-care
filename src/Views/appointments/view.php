<div class="uk-grid">
    <div class="uk-width-1-2@m uk-margin-auto">
        <h1 class="uk-h3">Appointment # <?php echo $appointment->appointmentNumber; ?></h1>

        <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
            <tbody>
                <tr>
                    <td>Date</td>
                    <td><?php echo $appointment->date; ?></td>
                </tr>
                <tr>
                    <td>Services</td>
                    <td>
                        <?php if (count($obtainedServices) > 0) : ?>
                            <ul>
                                <?php foreach ($obtainedServices as $key => $value) : ?>
                                    <li><?php echo $value['service']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            No services
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Patient's Name</td>
                    <td><?php echo $patient->name; ?></td>
                </tr>
                <tr>
                    <td>Patient's Address</td>
                    <td><?php echo $patient->address; ?></td>
                </tr>
                <tr>
                    <td>Patient's Phone Number</td>
                    <td><?php echo $patient->phoneNumber; ?></td>
                </tr>
                <tr>
                    <td>Patient's Email</td>
                    <td><?php echo $patient->emailAddress; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="uk-flex uk-flex-between">
            <a href="/" class="uk-button uk-button-default">Back to Home Page</a>

            <a href="/appointments/edit?id=<?php echo $appointment->id; ?>" class="uk-button uk-button-secondary">Update</a>
        </div>
    </div>
</div>