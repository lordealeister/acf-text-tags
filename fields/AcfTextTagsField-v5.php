<?php

// exit if accessed directly
if(!defined('ABSPATH'))
	exit;

// check if class already exists
if(!class_exists('AcfTextTagsField')):
    class AcfTextTagsField extends acf_field {

        public function __construct() {
            $this->name = 'text_tags';
            $this->label = __('Text tags', 'acf-text-tags');
            $this->category = 'basic';

            parent::__construct();
        }

        /**
         * render_field Renderiza o campo na administração
         *
         * @param  mixed $field Campo do ACF
         */
        public function render_field($field) {
            echo "<input type=\"text\" name=\"{$field['name']}\" value=\"{$field['value']}\" data-role=\"tagsinput\" />";
        }

        /**
         * format_value Retorna o valor do campo de acordo com a opção selecionada em sua criação
         *
         * @param  mixed $value Valor do campo
         * @param  int $postId ID do post
         * @param  array $field Campo do ACF
         * @return array|null Valor do campo
         */
        public function format_value($value, $postId, $field) {
            if(empty($value))
                return null;

            return explode(',', $value);
        }

        /**
         *  input_admin_enqueue_scripts()
         *
         *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
         *  Use this action to add CSS + JavaScript to assist your render_field() action.
         *
         *  @type	action (admin_enqueue_scripts)
         *  @since	3.6
         *  @date	23/01/13
         *
         *  @param	n/a
         *  @return	n/a
         */
        function input_admin_enqueue_scripts() {
            wp_enqueue_script('acf-text-tags-vendor-js', plugin_dir_url(__FILE__) . "../assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js", ['jquery'], null, true);
            wp_enqueue_style('acf-text-tags-vendor-css', plugin_dir_url(__FILE__) . "../assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css", false);
            wp_enqueue_style('acf-text-tags-css', plugin_dir_url(__FILE__) .  "../assets/styles/acf-text-tags.css", false);
        }

    }

    // initialize
	new AcfTextTagsField();
endif;
