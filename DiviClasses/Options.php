<?php


namespace DiviClasses;


class Options
{
    public function add_liberty_epanel_fields(){
        global $epanelMainTabs, $themename, $shortname, $options;
        $options[] = array(
            "name" => "wrap-liberty",
            "type" => "contenttab-wrapstart",);
        $options[] = array(
            "type" => "subnavtab-start",);

        $options[] = array(
            "name" => "liberty-1",
            "type" => "subnav-tab",
            "desc" => esc_html__("General", $themename)
        );

        $options[] = array(
            "name" => "liberty-2",
            "type" => "subnav-tab",
            "desc" => esc_html__("Theme Colors",$themename)
        );
        $options[] = array(
            "name" => "liberty-4",
            "type" => "subnav-tab",
            "desc" => esc_html__("Social", $themename)
        );

        $options[] = array(
            "name" => "liberty-5",
            "type" => "subnav-tab",
            "desc" => esc_html__("Preloader",$themename)
        );

        $options[] = array(
            "type" => "subnavtab-end",);

        $options[] = array(
            "name" => "liberty-1",
            "type" => "subcontent-start",);
        $options[] = array(
            'name' => esc_html__('Read More Blog Button Text', $themename),
            'type' => 'text',
            'id' => $shortname . "_liberty_read_more_button_text",
            'desc' => 'Replace the default "Read More" Button Text on Blog Modules globally',
            'std' => 'Read More',
        );

        $options[] = array(
            'name' => esc_html__('Switch to Mobile Menu', $themename),
            'type' => 'text',
            'id' => $shortname . "_liberty_switch_to_mobile_menu",
            'desc' => 'Switch to Mobile Menu',
            'std' => '980px',
        );

        $options[] = array(
            'name' => esc_html__('Fixed Header On Mobiles', $themename),
            'id' => $shortname . "_fixed_header_on_mobiles",
            'desc' => esc_html__('Fixed Header On Mobiles'),
            'std' => 'on',
            "type" => "checkbox"
        );

        $options[] = array(
            'name' => esc_html__('Mobile Nav Background Color', $themename),
            'type' => 'et_color_palette',
            'id' => $shortname . "_liberty_mobile_nav_background_color",
            'desc' => 'Mobile Nav Background Color',
            'std' => 'rgba(0,8,48,0.85)',
        );

        $options[] = array(
            'name' => esc_html__('Mobile Nav Text Color', $themename),
            'type' => 'et_color_palette',
            'id' => $shortname . "_liberty_mobile_nav_text_color",
            'desc' => 'Mobile Nav Text Color',
            'std' => '#ffffff',
        );

        $options[] = array(
            'name' => esc_html__('Select Footer Layout', $themename),
            'id' => $shortname . "_footer_layout",
            'desc' => esc_html__('Choose one of the Layouts saved in Divi Library to display as a global footer.', $themename),
            'std' => 'p_886',
            'type' => 'select',
            'options' => liberty_library_items(),
            'et_save_values' => true,
        );

        $options[] = array(
            'name' => esc_html__('Select Error 404 Page Layout', $themename),
            'id' => $shortname . "_404_page",
            'desc' => esc_html__('Choose one of the Layouts saved in Divi Library to display on the Error 404 page.', $themename),
            'std' => 'p_28187',
            'type' => 'select',
            'options' => $this->liberty_library_items(),
            'et_save_values' => true,
        );
        $options[] = array(
            'name' => esc_html__('Display Author Box', $themename),
            'id' => $shortname . "_post_author_box",
            'desc' => esc_html__('When enabled Author Box will be added to standard single post layout.'),
            'std' => 'on',
            "type" => "checkbox"
        );

        $options[] = array(
            'name' => esc_html__('Show Previous/Next Post Navigation', $themename),
            'id' => $shortname . "_post_navigation",
            'desc' => esc_html__('When enabled the Next Post / Previous Post links will be added to standard single post layout.'),
            'std' => 'on',
            "type" => "checkbox"
        );

        $options[] = array(
            'name' => esc_html__('Show Related Articles on Single Post', $themename),
            'id' => $shortname . "_show_related",
            'desc' => esc_html__('When enabled - random posts from the same category with thumbnails will be added at the end of standard single post layout.'),
            'std' => 'on',
            "type" => "checkbox"
        );

        $options[] = array(
            'name' => esc_html__('Related Articles Title', $themename),
            'type' => 'text',
            'id' => $shortname . "_related_title",
            'desc' => 'Replace the default title above related posts thumbnails',
            'std' => 'You may also like',
        );

        $options[] = array(
            'name' => esc_html__('Show Ghost Header when Divi Builder disabled', $themename),
            'id' => $shortname . "_show_ghost_header",
            'desc' => esc_html__('When enabled - the alternative header will be displayed on every page that doesn\'t use the Divi Builder (category, archive pages etc.)'),
            'std' => 'on',
            "type" => "checkbox"
        );

        $options[] = array(
            "name" => "liberty-1",
            "type" => "subcontent-end",);

        $options[] = array(
            "name" => "liberty-2",
            "type" => "subcontent-start",);


        $options[] = array(
            'name' => esc_html__('Main Accent Color', $themename),
            'type' => 'et_color_palette',
            'id' => $shortname . '_liberty_accent_color',
            'desc' => esc_html__( 'This is main accent color for your website. You can set different colors for specific elements in Divi Theme Customizer. Global color settings can be overwritten with individual module settings. Default Liberty Accent Color is #afa46e',$themename),
            'std' => '#afa46e',    );

        $options[] = array(
            'name' => esc_html__('Dark Elements Color', $themename),
            'type' => 'et_color_palette',
            'id' => $shortname . '_liberty_dark_color',
            'desc' => esc_html__( 'This is a color set for all dark elements on your website. You can set different colors for specific elements in Divi Theme Customizer. Global color settings can be overwritten with individual module settings. Default Liberty Dark color is #1b213a',$themename),
            'std' => '#1b213a',    );

        $options[] = array(
            'name' => esc_html__('Light Elements Color', $themename),
            'type' => 'et_color_palette',
            'id' => $shortname . '_liberty_light_color',
            'desc' => esc_html__( 'This is a color set for all light elements on your website. You can set different colors for specific elements in Divi Theme Customizer. Global color settings can be overwritten with individual module settings. Default Liberty Light Color is #f6f6f7',$themename),
            'std' => '#f6f6f7',    );

        $options[] = array(
            "name" => "liberty-2",
            "type" => "subcontent-end",);
        $options[] = array(
            "name" => "liberty-4",
            "type" => "subcontent-start",);

        $options[] = array(
            'name' => esc_html__('Social Icons', $themename),
            'desc' => '',
            "type" => "callback_function",
            "function_name" => 'et_liberty_blank',
        );

        $options[]  = array( "name" =>esc_html__( "Youtube Url", $themename),
            "id" => $shortname . "_youtube_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Youtube. ",$themename)
        );

        $options[]  = array( "name" =>esc_html__( "Linkedin Url", $themename),
            "id" => $shortname . "_linkedin_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Linkedin. ",$themename)
        );

        $options[]  = array( "name" =>esc_html__( "Pinterest Url", $themename),
            "id" => $shortname . "_pinterest_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Pinterest. ",$themename)
        );

        $options[]  = array( "name" =>esc_html__( "Tumblr Url", $themename),
            "id" => $shortname . "_tumblr_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Tumblr. ",$themename)
        );


        $options[]  = array( "name" =>esc_html__( "Flikr Url", $themename),
            "id" => $shortname . "_flikr_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Flikr. ",$themename)
        );

        $options[]  = array( "name" =>esc_html__( "Dribbble Url", $themename),
            "id" => $shortname . "_dribbble_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Dribbble. ",$themename)
        );

        $options[]  = array( "name" =>esc_html__( "Vimeo Url", $themename),
            "id" => $shortname . "_vimeo_url",
            "std" => "",
            "type" => "text",
            "validation_type" => "url",
            "desc" =>esc_html__( "Enter the URL of your Vimeo. ",$themename)
        );

        $options[] = array(
            "name" => "liberty-4",
            "type" => "subcontent-end",);


        $options[] = array(
            "name" => "liberty-5",
            "type" => "subcontent-start",);

        $options[] = array(
            'name' => esc_html__('Preloader', $themename),
            'id' => $shortname . "_liberty_preloader_option",
            'desc' => esc_html__('Prealoder ENABLE/DISABLE',$themename),
            'std' => 'on',
            "type" => "checkbox"
        );


        $options[] = array(
            'name' => esc_html__('Preloader Image Size', $themename),
            'id' => $shortname . "_liberty_preloader_image_size",
            'desc' => esc_html__('Preloader Image Size', $themename),
            'std' => '70px',
            "type" => "select",
            "options" => array(
                '70px' => esc_html__('Regular', $themename),
                '100px' => esc_html__('Large', $themename),
            ),
            'et_save_values' => true,
        );

        $options[] = array(
            'name' => esc_html__('Preloader Images', $themename),
            'desc' => '',
            "type" => "callback_function",
            "function_name" => 'et_preloader_option',
        );


        $options[] = array(
            'name' => esc_html__('Preloader Image Uploader', $themename),
            'id' => $shortname . "_liberty_preloader_custom_image",
            'desc' => esc_html__('You can Upload your Desire image.Image size will be maximum width: 200px and maximum height : 200px', $themename),
            'std' => '',
            "type" => "upload"
        );

        $options[] = array(
            'name' => esc_html__('Preloader background color', $themename),
            'id' => $shortname . "_liberty_preloader_background_color",
            'desc' => esc_html__('Please Select preloader background color here. You can also add html HEX color code.', $themename),
            'std' => '#fefefe',
            "type" => "et_color_palette"
        );


        $options[] = array(
            'name' => esc_html__('Preloader Effects', $themename),
            'id' => $shortname . "_liberty_preloader_effects",
            'desc' => esc_html__('Preloader Effects.', $themename),
            'std' => 'fadeOut',
            "type" => "select",
            "options" => array(
                'fadeOut' => esc_html__('Fade Out ', $themename),
                'slideUp' => esc_html__('Slide Up', $themename),
            ),
            'et_save_values' => true,
        );


        $options[] = array(
            'name' => esc_html__('Preloader Fadeout Speed', $themename),
            'id' => $shortname . "_liberty_preloader_fadeout_speed",
            'desc' => esc_html__('Preloader Fadeout Speed.', $themename),
            'std' => 'fast',
            "type" => "select",
            "options" => array(
                'fast' => esc_html__('Fast', $themename),
                'slow' => esc_html__('Slow', $themename),
            ),
            'et_save_values' => true,
        );
        $options[] = array(
            "name" => "liberty-5",
            "type" => "subcontent-end",);
        $options[] = array(
            "name" => "wrap-liberty",
            "type" => "contenttab-wrapend",);
    }
    public function add_epanel_tab(){
        $this->add_liberty_epanel_fields();
        ?>
        <li><a href="#wrap-liberty"><?php echo 'Taran'; ?></a></li>
        <?php
    }

    public function liberty_library_items() {
        $args = array('post_type' => 'et_pb_layout', 'posts_per_page' => -1);
        $layouts = get_posts($args);
        $layout_ids = wp_list_pluck( $layouts , 'post_title','ID' ); // Get the Forms ID in an Array
        $got_layouts = array();
        if(!empty($layout_ids)){
            foreach($layout_ids as $key=>$val){
                $got_layouts[ 'p_'.$key] =esc_html__( $val, 'et_builder' );
            }
        }else{
            $got_layouts += [null => 'Sorry, Divi Library is empty. Create some layouts...'];
        }
        return $got_layouts;
    }

}