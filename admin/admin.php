<?php 

    global $bttActivate;
    global $PluginName;
    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'wporg_messages' );

?>


<div class="admin-content">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        <li class="nav-item">
            <a class="nav-link active" id="pills-widgets-tab" data-toggle="pill" href="#pills-widgets" role="tab" aria-controls="pills-widgets" aria-selected="true">Widgets</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="pills-backtt-tab" data-toggle="pill" href="#pills-backtt" role="tab" aria-controls="pills-backtt" aria-selected="false">Back To Top</a>
        </li>

    </ul>

        <div class="tab-pane fade show active" id="pills-widgets" role="tabpanel" aria-labelledby="pills-widgets-tab">Coming soon!</div>

        <div class="tab-pane fade" id="pills-backtt" role="tabpanel" aria-labelledby="pills-backtt-tab">

            <form method="post" action="options.php">
                <?php 
                
                    settings_fields( 'extraAO_settings' ); // settings group name
                    do_settings_sections( 'extraAO' ); // just a page slug
                    submit_button();
                ?>
            </form>

        </div>

    </div>

</div>