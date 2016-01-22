<?php
global $evacorp_settings;

$evacorp_settings['google-map'] = array(
    'id' => 'google-map',
    'label' => 'Google Map',
    'description' => 'Attach iframe google map',
    'type' => 'textarea',
    'default',
    'placeholder',
);

function omw_load_media() {
//    $assets_dir = esc_url(trailingslashit(plugins_url('/assets/', __FILE__)));

    $assets_dir = get_template_directory_uri() . '/assets/';

    wp_register_style('fancybox-style', $assets_dir . 'fancybox/jquery.fancybox.css');
    wp_enqueue_style('fancybox-style');
    //
    wp_enqueue_style('farbtastic');
    wp_enqueue_script('farbtastic');
    //
    wp_enqueue_media();
    wp_register_script('wpt-admin-js', $assets_dir . 'js/settings.js', array('farbtastic', 'jquery'), '1.0.0');
    wp_enqueue_script('wpt-admin-js');
    //
    wp_register_script('fancybox-admin-js', $assets_dir . 'fancybox/jquery.fancybox.pack.js', array('farbtastic', 'jquery'), '2.1.5');
    wp_enqueue_script('fancybox-admin-js');
}

add_action('admin_init', 'omw_load_media');

function omw_taxonomy_add_new_meta_field() {
    global $evacorp_settings;
    $html = '';
    //
    foreach ($evacorp_settings as $field => $data) {
        //
        $t_id = $data['id'];
        //
        switch ($data['type']) {
            case 'wysiwyg':
                ?>
                <div class="form-field">
                    <label for="<?php echo $t_id ?>"> <?php _e($data['label']) ?></label>
                <?php wp_editor('', $t_id, array('wpautop' => false, 'tinymce' => true)); ?>
                    <p class="description"><?php _e($data['description']) ?></p>
                </div>
                <?php
                break;
            case 'media':
                ?>
                <div class="form-field">
                    <label for="<?php echo $t_id ?>"> <?php _e($data['label']) ?></label>
                    <img src="images/media-button-image.gif" alt="Add photos from your media" />
                    <a href="media-upload.php?type=image&#038;wpaft_send_label=<?php echo $t_id ?>&#038;TB_iframe=1&#038;tab=library&#038;height=500&#038;width=640" onclick="image_photo_url_add('<?php echo $t_id ?>')" class="thickbox" title="Add an Image">
                        <strong>
                <?php echo _e('Click here to add/change your image', 'wp-texonomy-meta'); ?>
                        </strong>
                    </a>
                    <p class="description"><?php _e($data['description']) ?></p>
                </div>
                <?php
                break;
            case 'textarea':
                ?>
                <div class="form-field">
                    <label for="<?php echo $t_id ?>"><?php _e($data['label']) ?></label>
                    <textarea  id="<?php echo $t_id ?>"></textarea>
                    <p class="description"><?php _e($data['description']) ?></p>
                </div>
                <?php
                break;
        }
    }
    //
}

//add_action('lab_add_form_fields', 'omw_taxonomy_add_new_meta_field', 10, 2);

function omw_taxonomy_edit_meta_field($term) {
    global $evacorp_settings;
    $html = '';
    //
    foreach ($evacorp_settings as $field => $data) {
        // retrieve the existing value(s) for this meta field. This returns an array
        $t_id = $data['id'] . '-' . $term->term_id;
        $term_meta = get_option('evacorp_' . $t_id);
        //
        switch ($data['type']) {
            case 'wysiwyg':
                ?>
                <tr class="form-field">
                    <th scope="row" valign="top"><label for="<?php echo $t_id ?>"><?php _e($data['label']) ?></label></th>
                    <td>
                <?php wp_editor($term_meta[$t_id] ? stripcslashes($term_meta[$t_id]) : '', $t_id, array('wpautop' => false, 'tinymce' => true)); ?>
                        <p class="description"><?php _e($data['description']) ?></p>
                    </td>
                </tr>
                <?php
                break;
            case 'media':
                $image_thumb = 'images/media-button-image.gif';
                if ($term_meta[$t_id]) {
                    $image_thumb = $term_meta[$t_id];
                }
                ?>
                <tr class="form-field">
                    <th scope="row" valign="top">
                        <label for="<?php echo $t_id ?>" class="meta_name_label"><?php _e($data['label']) ?></label>
                    </th>
                    <td>
                        <img id="<?php echo $t_id ?>_preview" class="image_preview" src="<?php echo $image_thumb ?>" style="max-width:50%;" /><br/>
                        <input id="<?php echo $t_id ?>_button" type="button" data-uploader_title="Upload an image" data-uploader_button_text="Use image" class="image_upload_button button" value="Upload new image" />
                        <input id="<?php echo $t_id ?>_delete" type="button" class="image_delete_button button" value="Remove image" />
                        <input id="<?php echo $t_id ?>" class="image_data_field" type="hidden" name="<?php echo $t_id ?>" value="<?php echo $image_thumb ?>"/>
                    </td>
                </tr>
                <?php
                break;
            case 'textarea':
                ?>
                <tr class="form-field">
                    <th scope="row" valign="top">
                        <label for="<?php echo $t_id ?>"><?php _e($data['label']) ?></label>
                    </th>
                    <td>
                        <textarea  id="<?php echo $t_id ?>" name="<?php echo $t_id ?>" class="textarea"><?php echo $term_meta[$t_id] ? stripcslashes($term_meta[$t_id]) : ''  ?></textarea>
                        <p class="description"><?php _e($data['description']) ?></p>

                    </td>
                </tr>
                <?php
                break;
        }
    }
}

add_action('company-tax_edit_form_fields', 'omw_taxonomy_edit_meta_field', 10, 2);

function omw_save_taxonomy_custom_meta($term_id) {
    global $evacorp_settings;
    //
    foreach ($evacorp_settings as $field => $data) {
        //
        $t_id = $data['id'] . '-' . $term_id;
        //
        if (isset($_POST[$t_id])) {
            $term_meta = get_option('evacorp_' . $t_id);
            $term_meta[$t_id] = $_POST[$t_id];
            // Save the option array.
            update_option('evacorp_' . $t_id, $term_meta);
        }
    }
}

add_action('edited_company-tax', 'omw_save_taxonomy_custom_meta', 10, 2);
add_action('create_company-tax', 'omw_save_taxonomy_custom_meta', 10, 2);
