<?php include('includes/header.html'); ?>

    <div class="container">
        <!-- Makes card for each record -->
        <?php foreach($models as $model) { ?>
            <div class="border border-secondary row todo-item pt-1">
                <div class="col-9">
                    <form method ="post" action ="/" id="check-form-<?php echo $model->getId(); ?>">
                        <input type="hidden" name="action" value="check"> 
                        <input type="hidden" name="id" value="<?php echo $model->getId(); ?>">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" <?php if ($model->getIsChecked()) { echo "checked"; } ?> id="customCheck-<?php echo $model->getId(); ?>" onchange="document.getElementById('check-form-<?php echo $model->getId(); ?>').submit()">
                            <label class="custom-control-label h5" for="customCheck-<?php echo $model->getId(); ?>"><?php echo $model->getTitle(); ?></label>
                        </div>
                    </form>
                    <p><?php echo $model->getText(); ?></p>
                </div>
                <div class="col-3">
                    <p class="date-info"><?php
                        // Changes date format from string to timestamp
                        $today = strtotime("today");
                        $datetime_created = explode(" ", $model->getDateCreated());
                        $date_created = strtotime($datetime_created[0]);

                        // Calculates difference between today and record's creation date (in years, months and days)
                        $diff = $today - $date_created; 
                        $years = floor($diff / (365*60*60*24));
                        $months = floor(($diff) / (30*60*60*24));
                        $days = floor(($diff)/ (60*60*24));

                        if ($days == 0) {
                            echo "Šodien";
                        } else if ($days == 1) {
                            echo "Vakar";
                        } else if ($months == 0) {
                            echo "Pirms $days dienām";
                        } else if ($months == 1) {
                            echo "Pirms $months mēneša";
                        } else if ($years == 0) {
                            echo "Pirms $months mēnešiem";
                        } else if ($years == 1) {
                            echo "Pirms $years gada";
                        } else {
                            echo "Pirms $years gadiem";
                        }
                    ?></p>
                    <a class="btn btn-outline-info edit-button" href="/?action=edit&id=<?php echo $model->getId(); ?>">Labot</a>
                </div>
            </div>
        <?php } ?>

        <a class="btn btn-outline-primary float-right" id="add" href="/?action=create">Pievienot jaunu</a>
    </div>

<?php include('includes/footer.html'); ?>