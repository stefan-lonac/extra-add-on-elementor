<?php 


        // ************* Registering and displaying the fields that will be stored in the wordpress database *************
        add_action( 'admin_init',  'extraAO_register_setting' );
        function extraAO_register_setting(){
           
            // Add fields to the wordpress database
            add_settings_section(
                'extraAO-btt', // section ID
                '', // title (if needed)
                '', // callback function (if needed)
                'extraAO' // page slug
            );


            // Field registration Number of users
            register_setting(
                'extraAO_settings', // settings group name
                'activate-back-to-top', // option name
                'sanitize_text_field' // sanitization function
            );

            // The display function displays the "extraAO_radio_field_html_receive" fields and function on the admin.php page
            add_settings_field(
                'activate-back-to-top',
                'Activate Back To Top: ',
                'extraAO_radio_field_html_receive', // function which prints the field
                'extraAO', // page slug
                'extraAO-btt', // section ID
                array( 
                    'label_for' => 'activate-back-to-top',
                    // 'class' => 'table__tr', // for <tr> element
                )
            );
        

        }


        // ==== The text input fields are displayed ====
        
        // Activate Back To Top
        function extraAO_radio_field_html_receive(){
            
            ?>
                <input id="toggle-event" data-toggle="toggle" type="checkbox" name="activate-back-to-top" value="1" <?php checked( esc_attr( get_option('activate-back-to-top')), 1 );?> /></td>
                
            <?php
            
        }// END: Activate Back To Top

        // ==== END: The text input fields are displayed ====

        // ************* END: Registering and displaying the fields that will be stored in the wordpress database *************