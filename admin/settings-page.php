<?php
function cg_add_admin_menu() {
    add_options_page('Content Guard', 'Content Guard', 'manage_options', 'content-guard', 'cg_options_page');
}
add_action('admin_menu', 'cg_add_admin_menu');

function cg_settings_init() {
    register_setting('cg_settings_group', 'cg_protection_options');

    add_settings_section('cg_section_main', 'Main Settings', null, 'content-guard');

    add_settings_field('cg_enable', 'Enable Protection', 'cg_enable_cb', 'content-guard', 'cg_section_main');
    add_settings_field('cg_message', 'Custom Alert Message', 'cg_message_cb', 'content-guard', 'cg_section_main');
}
add_action('admin_init', 'cg_settings_init');

function cg_enable_cb() {
    $options = get_option('cg_protection_options');
    ?>
    <input type="checkbox" name="cg_protection_options[enable_protection]" value="1" <?php checked(1, $options['enable_protection'] ?? 0); ?>>
    <?php
}

function cg_message_cb() {
    $options = get_option('cg_protection_options');
    ?>
    <input type="text" name="cg_protection_options[custom_message]" value="<?php echo esc_attr($options['custom_message'] ?? 'Right-click is disabled!'); ?>" class="regular-text">
    <?php
}

function cg_options_page() {
    ?>
    <div class="wrap">
        <h1>Content Guard Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('cg_settings_group');
            do_settings_sections('content-guard');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
