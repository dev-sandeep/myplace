<!-- Template for Messages to the user -->
<div id="screen-messages" class="column large-6">
    <?php if (is_array($messages)): ?>
        <?php foreach ($messages as $type => $message_group): ?>
            <?php foreach ($message_group as $message): ?>    

                <?php
                $fa = $type;
                if ($type == 'danger')
                {
                    $fa = 'ban';
                }
                else if ($type = 'success')
                {
                    $fa = 'check';
                }
                ?>
                <div data-alert class="customalert customalert-dismissable customalert-<?php print $type; ?>">
                    <i class="fa fa-<?php print $fa; ?>"></i>
                    <button type="button" class="close white padding-right-10" data-dismiss="alert" aria-hidden="true">×</button>
                    <b><?php print $message; ?></b>                        
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>