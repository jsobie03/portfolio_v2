<?php
$plugin_path = plugins_url('theme-core');
return array(
	'title' => __('THEME OPTIONS', 'theme-core'),
	'logo' => $plugin_path.'/admin/logo.png',
    'menus' => array(
        array(
            'title' => esc_html__('General Settings', 'theme-core'),
            'name' => 'menu_1',
            'icon' => 'font-awesome:fa-magic',
            'menus' => array(
                array(
                    'title' => esc_html__('Header', 'theme-core'),
                    'name' => 'header',
                    'icon' => 'font-awesome:fa-th-large',
                    'controls' => array(
                        //Logo Image Section
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Logo Image', 'theme-core'),
                            'name' => 'image_logo_section',
                            'description' => esc_html__('Upload or select logo for header.', 'theme-core'),
                            'fields' => array(
                                array(
                                    'type' => 'upload',
                                    'name' => 'image_logo',
                                    'label' => esc_html__('Image Logo', 'theme-core'),
                                    'description' => esc_html__('Upload or choose custom logo', 'theme-core'),
                                )
                            ),
                        ),
                        // Favicon Section
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Favicon', 'theme-core'),
                            'name' => 'favicon_section',
                            'description' => esc_html__('Image favicon', 'theme-core'),
                            'fields' => array(
                                // Favicon
                                array(
                                    'type' => 'upload',
                                    'name' => 'favicon',
                                    'label' => esc_html__('Favicon', 'theme-core'),
                                    'description' => esc_html__('Upload 16x16 pixels favicon.', 'theme-core'),
                                    'default' => '',
                                ),
                            ),
                        ),
                        // Other Details Section
                        array(
                            'type' => 'section',
                            'title' => esc_html__('Other Details', 'theme-core'),
                            'name' => 'other_section',
                            'description' => esc_html__('Other Details', 'theme-core'),
                            'fields' => array(
                                // General Pages Menu
                                array(
                                    'type' => 'select',
                                    'name' => 'header_menu_type',
                                    'label' => esc_html__('General Pages Menu', 'theme-core'),
                                    'items' => array(
                                        array(
                                            'value' => 'default',
                                            'label' => esc_html__('Default', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'default-transparent',
                                            'label' => esc_html__('Default Transparent', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'header-3d',
                                            'label' => esc_html__('3D Menu', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'header-hamburg',
                                            'label' => esc_html__('Hamburg', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'simple-logo',
                                            'label' => esc_html__('Simple Logo', 'theme-core'),
                                        ),
                                    ),
                                    'default' => array(
                                        'default',
                                    ),
                                ),
                                // General Pages Menu Style
                                array(
                                    'type' => 'select',
                                    'name' => 'header_menu_style',
                                    'label' => esc_html__('General Pages Style', 'theme-core'),
                                    'items' => array(
                                        array(
                                            'value' => 'dark',
                                            'label' => esc_html__('Dark', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'light',
                                            'label' => esc_html__('Light', 'theme-core'),
                                        )
                                    ),
                                    'default' => array(
                                        'dark',
                                    ),
                                ),
                                // General Pages Footer
                                array(
                                    'type' => 'select',
                                    'name' => 'select_footer_type',
                                    'label' => esc_html__('General Pages Footer', 'theme-core'),
                                    'items' => array(
                                        array(
                                            'value' => 'default',
                                            'label' => esc_html__('Default', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'footer-diagonal',
                                            'label' => esc_html__('Diagonal (Contact Form)', 'theme-core'),
                                        ),
                                        array(
                                            'value' => 'footer-plain',
                                            'label' => esc_html__('Plain (Contact Form)', 'theme-core'),
                                        )
                                    ),
                                    'default' => array(
                                        'default',
                                    ),
                                ),
                                // Footer Diagonal/Plain BG Image
                                array(
                                    'type' => 'upload',
                                    'name' => 'footer_form_bg',
                                    'label' => esc_html__('Footer Diagonal/Plain BG Image', 'theme-core'),
                                    'description' => esc_html__('Upload or choose custom bg for Diagonal/Plain footer.', 'theme-core'),
                                ),
                                // Footer Default BG Image
                                array(
                                    'type' => 'upload',
                                    'name' => 'footer_default_bg',
                                    'label' => esc_html__('Footer Default BG Image', 'theme-core'),
                                    'description' => esc_html__('Upload or choose custom bg for Default footer.', 'theme-core'),
                                ),
                                // 3D Menu Phone
                                array(
                                    'type' => 'textbox',
                                    'name' => 'threeD_menu_phone',
                                    'label' => esc_html__('3D Menu Phone', 'theme-core'),
                                    'description' => esc_html__('Enter phone number for 3d menu header.', 'theme-core')
                                ),
                                // Disable Site Loader
                                array(
                                    'type' => 'toggle',
                                    'name' => 'disable_site_loader',
                                    'label' => esc_html__('Disable Site Loader', 'theme-core'),
                                    'description' => esc_html__('You can disable loader for site.', 'theme-core'),
                                    'default' => '0',
                                ),
                                // Site Loader Image
                                array(
                                    'type' => 'upload',
                                    'name' => 'site_loader_img',
                                    'label' => esc_html__('Site Loader Image', 'theme-core'),
                                    'description' => esc_html__('Upload or choose image for site loader.', 'theme-core'),
                                ),
                                // Enable Boxed Layout
                                array(
                                    'type' => 'toggle',
                                    'name' => 'enable_boxed_layout',
                                    'label' => esc_html__('Enable Boxed Layout', 'theme-core'),
                                    'description' => esc_html__('You can enable boxed layout for site.', 'theme-core'),
                                    'default' => '0',
                                ),
                                // Boxed Layout BG Image
                                array(
                                    'type' => 'upload',
                                    'name' => 'boxed_layout_bg',
                                    'label' => esc_html__('Boxed Layout BG Image', 'theme-core'),
                                    'description' => esc_html__('Upload or choose custom bg for boxed layout.', 'theme-core'),
                                ),
                                // Custom CSS
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'custom_css',
                                    'label' => esc_html__('Custom CSS', 'theme-core'),
                                    'description' => esc_html__('Write your custom css here.', 'theme-core'),
                                    'theme' => 'github',
                                    'mode' => 'css',
                                ),
                                // Custom JS
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'custom_js',
                                    'label' => esc_html__('Custom JS', 'theme-core'),
                                    'description' => esc_html__('Write your custom js here.', 'theme-core'),
                                    'theme' => 'twilight',
                                    'mode' => 'javascript',
                                ),
                                // Footer Copyright
                                array(
                                    'type' => 'textbox',
                                    'name' => 'footer_copyright',
                                    'label' => esc_html__('Copyright Text', 'theme-core'),
                                    'description' => esc_html__('Only alphabets and numbers allowed here.', 'theme-core'),
                                    'default' => esc_html__('Copyright &copy; 2017 webicode.com', 'theme-core')
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Styling Options
        array(
            'title' => esc_html__('Styling Options', 'theme-core'),
            'name' => 'styling_options',
            'icon' => 'font-awesome:fa-gift',
            'controls' => array(
                // Heading Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Headings', 'theme-core'),
                    'fields' => array(
                        // Heading H1
                        array(
                            'type' => 'color',
                            'name' => 'heading_h1',
                            'label' => esc_html__('Heading H1', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'theme-core'),
                        ),
                        // Heading H2
                        array(
                            'type' => 'color',
                            'name' => 'heading_h2',
                            'label' => esc_html__('Heading H2', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'theme-core'),
                        ),
                        // Heading H3
                        array(
                            'type' => 'color',
                            'name' => 'heading_h3',
                            'label' => esc_html__('Heading H3', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'theme-core'),
                        ),
                        // Heading H4
                        array(
                            'type' => 'color',
                            'name' => 'heading_h4',
                            'label' => esc_html__('Heading H4', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'theme-core'),
                        ),
                        // Heading H5
                        array(
                            'type' => 'color',
                            'name' => 'heading_h5',
                            'label' => esc_html__('Heading H5', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'theme-core'),
                        ),
                        // Heading H6
                        array(
                            'type' => 'color',
                            'name' => 'heading_h6',
                            'label' => esc_html__('Heading H6', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set heading color.', 'theme-core'),
                        ),
                    ),
                ),
                // Header Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Header', 'theme-core'),
                    'fields' => array(
                        // Menu Normal Color
                        array(
                            'type' => 'color',
                            'name' => 'menu_normal',
                            'label' => esc_html__('Menu Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set menu color.', 'theme-core'),
                        ),
                        // Menu Active & Hover Color
                        array(
                            'type' => 'color',
                            'name' => 'menu_active',
                            'label' => esc_html__('Menu Active/Hover Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set menu active/hover color.', 'theme-core'),
                        ),
                        // Header BG Color
                        array(
                            'type' => 'color',
                            'name' => 'header_bg',
                            'label' => esc_html__('Menu Header Background Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set background color.', 'theme-core'),
                        ),
                        // Sub Menu BG Color
                        array(
                            'type' => 'color',
                            'name' => 'sub_menu_bg',
                            'label' => esc_html__('Sub Menu Background Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set background color.', 'theme-core'),
                        ),
                    ),
                ),
                // Body Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Body', 'theme-core'),
                    'fields' => array(
                        // Default Color
                        array(
                            'type' => 'color',
                            'name' => 'default_color',
                            'label' => esc_html__('Default Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set default color.', 'theme-core'),
                        ),
                        // Body Color
                        array(
                            'type' => 'color',
                            'name' => 'body_color',
                            'label' => esc_html__('Body Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set body color, general p tag.', 'theme-core'),
                        ),
                    ),
                ),
                // Footer Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Footer', 'theme-core'),
                    'fields' => array(
                        // Footer Default Background Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_default_bg',
                            'label' => esc_html__('Footer Default Background Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set footer default background color.', 'theme-core'),
                        ),
                        // Footer Default Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_default_color',
                            'label' => esc_html__('Footer Default Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set footer default color.', 'theme-core'),
                        ),
                        // Footer Diagonal Background Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_diagonal_bg',
                            'label' => esc_html__('Footer Diagonal Background Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set footer diagonal background color.', 'theme-core'),
                        ),
                        // Footer Diagonal Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_diagonal_color',
                            'label' => esc_html__('Footer Diagonal Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set footer diagonal color.', 'theme-core'),
                        ),
                        // Footer Plain Background Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_plain_bg',
                            'label' => esc_html__('Footer Plain Background Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set footer plain background color.', 'theme-core'),
                        ),
                        // Footer Plain Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_plain_color',
                            'label' => esc_html__('Footer Plain Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set footer plain color.', 'theme-core'),
                        ),
                    ),
                ),
                // Other Styling
                array(
                    'type' => 'section',
                    'title' => esc_html__('Other Styling', 'theme-core'),
                    'fields' => array(
                        // Links Color
                        array(
                            'type' => 'color',
                            'name' => 'links_normal',
                            'label' => esc_html__('Links Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set links color.', 'theme-core'),
                        ),
                        // Links Color
                        array(
                            'type' => 'color',
                            'name' => 'links_hover',
                            'label' => esc_html__('Links Hover Color', 'theme-core'),
                            'description' => esc_html__('Color Picker, you can set links hover color.', 'theme-core'),
                        )
                    ),
                ),
            ),
        ),
        // Typography Options
        array(
            'title' => esc_html__('Typography Options', 'theme-core'),
            'name' => 'typo_options',
            'icon' => 'font-awesome:fa-text-width',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Headings Font Family', 'theme-core'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'headings_font_face',
                            'label' => esc_html__('Headings Font Face: h1,h2,h3', 'theme-core'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'headings_font_weight',
                            'label' => esc_html__('Headings Font Weight', 'theme-core'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'headings_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Meta Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Meta Data Font Family', 'theme-core'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'meta_font_face',
                            'label' => esc_html__('Meta Data Font Face: h4,h5,h6, widget title etc.', 'theme-core'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'meta_font_weight',
                            'label' => esc_html__('Meta Data Font Weight', 'theme-core'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'meta_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Body Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Body Font Family', 'theme-core'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'body_font_face',
                            'label' => esc_html__('Body Font Face', 'theme-core'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'body_font_weight',
                            'label' => esc_html__('Body Font Weight', 'theme-core'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'body_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Font Sizes Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Font Sizes', 'theme-core'),
                    'fields' => array(
                        // Body Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'body_font_size',
                            'label'   => esc_html__('Body Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H1 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h1_font_size',
                            'label'   => esc_html__('H1 Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H2 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h2_font_size',
                            'label'   => esc_html__('H2 Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H3 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h3_font_size',
                            'label'   => esc_html__('H3 Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H4 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h4_font_size',
                            'label'   => esc_html__('H4 Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H5 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h5_font_size',
                            'label'   => esc_html__('H5 Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H6 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h6_font_size',
                            'label'   => esc_html__('H6 Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Menu Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'menu_font_size',
                            'label'   => esc_html__('Menu Font Size (px)', 'theme-core'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        )
                    ),
                ),
            ),
        ),
        // Single Page Options
        array(
            'title' => esc_html__('Post Page Options', 'theme-core'),
            'name' => 'post_options',
            'icon' => 'font-awesome:fa-files-o',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('Single Page Details', 'theme-core'),
                    'fields' => array(
                        // Banner BG Image
                        array(
                            'type' => 'upload',
                            'name' => 'single_banner_bg',
                            'label' => esc_html__('Single Posts Banner Image', 'theme-core'),
                            'description' => esc_html__('Upload or choose custom bg for single posts banner.', 'theme-core'),
                        ),
                        // Hide Feature Image
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_feature_image',
                            'label' => esc_html__('Hide Feature Image', 'theme-core'),
                            'description' => esc_html__('You can hide feature image for posts.', 'theme-core'),
                            'default' => '0',
                        ),
                        // Hide Banner Categories
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_banner_categories',
                            'label' => esc_html__('Hide Banner Categories', 'theme-core'),
                            'description' => esc_html__('You can hide the banner categories.', 'theme-core'),
                            'default' => '0',
                        ),
                        // Hide Banner Comments
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_banner_comments',
                            'label' => esc_html__('Hide Banner Comments/Date', 'theme-core'),
                            'description' => esc_html__('You can hide the banner Comments/Date.', 'theme-core'),
                            'default' => '0',
                        ),
                        // Hide Complete Banner
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_complete_banner',
                            'label' => esc_html__('Hide Complete Banner', 'theme-core'),
                            'description' => esc_html__('You can hide complete banner.', 'theme-core'),
                            'default' => '0',
                        ),
                        // Hide Author Box
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_author',
                            'label' => esc_html__('Hide Author Box', 'theme-core'),
                            'description' => esc_html__('You can hide the author box.', 'theme-core'),
                            'default' => '1',
                        ),
                        // Hide Social Share & Tags
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_social_share_tags',
                            'label' => esc_html__('Hide Social Share & Tags', 'theme-core'),
                            'description' => esc_html__('You can hide social share & tags for post.', 'theme-core'),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
        // Footer Options
        array(
            'title' => esc_html__('Footer Options', 'theme-core'),
            'name' => 'footer_options',
            'icon' => 'font-awesome:fa-flag',
            'controls' => array(
                // Footer Content
                array(
                    'type' => 'section',
                    'title' => esc_html__('Footer Content', 'theme-core'),
                    'fields' => array(
                        // Footer Title
                        array(
                            'type' => 'textbox',
                            'name' => 'footer_title',
                            'label' => esc_html__('Footer Title', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core')
                        ),
                        // Footer Title Abv Text
                        array(
                            'type' => 'textbox',
                            'name' => 'footer_title_abv_txt',
                            'label' => esc_html__('Footer Title Above Text', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core')
                        ),
                        // Footer Contact Form Shortcode
                        array(
                            'type' => 'textbox',
                            'name' => 'footer_form_shortcode',
                            'label' => esc_html__('Footer Form Shortcode', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core')
                        ),
                        // Footer Email
                        array(
                            'type' => 'textbox',
                            'name' => 'footer_email',
                            'label' => esc_html__('Footer Email', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core')
                        ),
                        // Footer Phone
                        array(
                            'type' => 'textbox',
                            'name' => 'footer_phone',
                            'label' => esc_html__('Footer Phone', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core')
                        ),
                        // Footer Description Text
                        array(
                            'type' => 'textarea',
                            'name' => 'footer_description_txt',
                            'label' => esc_html__('Footer Description Text', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core')
                        ),
                    ),
                ),
                // Social Connect
                array(
                    'type' => 'section',
                    'title' => esc_html__('Social Connect', 'theme-core'),
                    'fields' => array(
                        // Facebook
                        array(
                            'type' => 'textbox',
                            'name' => 'facebook',
                            'label' => esc_html__('Facebook', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '#',
                        ),
                        // Twitter
                        array(
                            'type' => 'textbox',
                            'name' => 'twitter',
                            'label' => esc_html__('Twitter', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '#',
                        ),
                        // Dribble
                        array(
                            'type' => 'textbox',
                            'name' => 'dribbble',
                            'label' => esc_html__('Dribbble', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '',
                        ),
                        // Google Plus
                        array(
                            'type' => 'textbox',
                            'name' => 'google',
                            'label' => esc_html__('Google+', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '',
                        ),
                        // Linkedin
                        array(
                            'type' => 'textbox',
                            'name' => 'linkedin',
                            'label' => esc_html__('LinkedIn', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '',
                        ),
                        // Pinterest
                        array(
                            'type' => 'textbox',
                            'name' => 'pinterest',
                            'label' => esc_html__('Pinterest', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '#',
                        ),
                        // Instagram
                        array(
                            'type' => 'textbox',
                            'name' => 'instagram',
                            'label' => esc_html__('Instagram', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '',
                        ),
                        // Youtube
                        array(
                            'type' => 'textbox',
                            'name' => 'youtube',
                            'label' => esc_html__('Youtube', 'theme-core'),
                            'description' => esc_html__('Leave empty if not required.', 'theme-core'),
                            'default' => '',
                        ),
                    ),
                ),
            ),
        ),
        // 404 Page Options
        array(
            'title' => esc_html__('404 Page Options', 'theme-core'),
            'name' => 'page404_options',
            'icon' => 'font-awesome:fa-warning',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('404 Page Details', 'theme-core'),
                    'fields' => array(
                        // 404 Editor
                        array(
                            'type' => 'codeeditor',
                            'name' => 'error_404',
                            'label' => esc_html__('Page Text', 'theme-core'),
                            'description' => esc_html__('HTML tags are supported.', 'theme-core'),
                            'theme' => 'github',
                            'mode' => 'html',
                        ),
                    ),
                ),
            ),
        ),
        // Code Snippets
        array(
            'title' => esc_html__('Code Snippets', 'theme-core'),
            'name' => 'codeSnippets_options',
            'icon' => 'font-awesome:fa-info',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => esc_html__('HTML CODE SNIPPETS', 'theme-core'),
                    'fields' => array(
                        // Buttons
                        array(
                            'type' => 'notebox',
                            'name' => 'button_1',
                            'label' => esc_html__('DEFAULT BUTTON', 'theme-core'),
                            'description' => esc_html__('<a href="#." class="btn-flat">BUTTON FLAT</a>', 'theme-core'),
                            'status' => 'normal',
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'button_2',
                            'label' => esc_html__('BUTTON WHITE BORDER', 'theme-core'),
                            'description' => esc_html__('<a href="#." class="btn-large">BUTTON TEXT</a>', 'theme-core'),
                            'status' => 'normal',
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'contact_form',
                            'label' => esc_html__('CONTACT FORM', 'theme-core'),
                            'description' => esc_html__('<ul class="row"><li class="col-sm-12"><label>[text* Name class:form-control placeholder "Name"]</label></li><li class="col-sm-12"><label>[email* Email class:form-control placeholder "Email"]</label></li><li class="col-sm-12"><label>[text Phone class:form-control placeholder "Phone"]</label></li><li class="col-sm-12"><label>[textarea message class:form-control placeholder "Message"]</label></li><li class="col-sm-12 text-left"><button type="submit"  class="btn-round" value="submit">SEND MAIL</button></li></ul>', 'theme-core'),
                            'status' => 'normal',
                        )
                    ),
                ),
            ),
        ),
    )
);
/**
 *EOF
 */