<?php $total = $appointment->registrationFee ?? 0; ?>

<div class="uk-grid">
    <div class="uk-width-1-2@m uk-margin-auto">
        <h1 class="uk-h4">Appointment # <?php echo $appointment->appointmentNumber; ?> on <?php echo $appointment->date; ?></h1>

        <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
            <tbody>

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
                <tr>
                    <td>Registration Fee</td>
                    <td class="uk-text-right"><?php echo $appointment->registrationFee ?? "Rs. 0"; ?></td>
                </tr>
                <tr>
                    <td>Services</td>
                    <td>
                        <?php if (count($obtainedServices) > 0) : ?>
                            <?php foreach ($obtainedServices as $key => $value) : $total += $value['price']; ?>
                                <span class="uk-flex uk-flex-between">
                                    <span><?php echo $value['service']; ?></span>
                                    <span>Rs. <?php echo number_format($value['price']); ?></span>
                                </span>
                            <?php endforeach; ?>
                        <?php else : ?>
                            No services
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if (!!$total) : ?>
                    <tr>
                        <td>Total</td>
                        <td class="uk-text-right">
                            Rs. <?php echo number_format($total); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


        <?php if (!!$appointment->paidAt) : ?>
            <p>Payment completed on <?php echo $appointment->paidAt; ?></p>
        <?php endif; ?>

        <div class="uk-flex uk-flex-between">
            <a href="/" class="uk-button uk-button-default">Back to Home Page</a>

            <?php if (count($obtainedServices) > 0) : ?>
                <button onclick="window.print();" class="uk-button uk-button-secondary">Print Invoice</button>
            <?php else : ?>
                <a href="/appointments/edit?id=<?php echo $appointment->id; ?>" class="uk-button uk-button-secondary">Update</a>
            <?php endif; ?>

        </div>
    </div>
</div>