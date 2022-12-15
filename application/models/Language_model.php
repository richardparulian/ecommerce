<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'name' => $this->input->post('name', true),
            'short_form' => $this->input->post('short_form', true),
            'language_code' => $this->input->post('language_code', true),
            'language_order' => $this->input->post('language_order', true),
            'text_direction' => $this->input->post('text_direction', true),
            'text_editor_lang' => $this->input->post('text_editor_lang', true),
            'status' => $this->input->post('status', true)
        );
        return $data;
    }

    //get language
    public function get_language($id)
    {
        $sql = "SELECT * FROM languages WHERE id = ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get site language
    public function get_site_language($languages)
    {
        if (!empty($languages)) {
            foreach ($languages as $language) {
                if ($language->id == $this->general_settings->site_lang) {
                    return $language;
                }
            }
            foreach ($languages as $language) {
                return $language;
            }
        }
        $query = $this->db->query("SELECT * FROM languages ORDER BY id LIMIT 1");
        return $query->row();
    }

    //get languages
    public function get_languages()
    {
        $query = $this->db->query("SELECT * FROM languages ORDER BY language_order");
        return $query->result();
    }

    //get language translations
    public function get_language_translations($lang_id)
    {
        $sql = "SELECT * FROM language_translations WHERE lang_id = ?";
        $query = $this->db->query($sql, array(clean_number($lang_id)));
        return $query->result();
    }

    public function getLanguage($lang)
    {
        $this->lang->load('aed', !$lang ? 'id' : $lang);

        $data = array(
            'slider_banner'                 => $this->lang->line('slider_banner'),
            'btn_banner'                    => $this->lang->line('btn_banner'),
            'title_best'                    => $this->lang->line('title_best'),
            'content_best'                  => $this->lang->line('content_best'),
            'title_related'                 => $this->lang->line('title_related'),
            'content_related'               => $this->lang->line('content_related'),
            'title_client'                  => $this->lang->line('title_client'),
            'title_account'                 => $this->lang->line('title_account'),
            'title_auth'                    => $this->lang->line('title_auth'),
            'title_account_setting'         => $this->lang->line('title_account_setting'),
            'title_account_information'     => $this->lang->line('title_account_information'),
            'title_contact_information'     => $this->lang->line('title_contact_information'),
            'title_edit'                    => $this->lang->line('title_edit'),
            'title_change_password'         => $this->lang->line('title_change_password'),
            'title_billing_address'         => $this->lang->line('title_billing_address'),
            'title_shipping_address'        => $this->lang->line('title_shipping_address'),
            'title_manage_address'          => $this->lang->line('title_manage_address'),
            'title_billing_address_info'    => $this->lang->line('title_billing_address_info'),
            'title_shipping_address_info'   => $this->lang->line('title_shipping_address_info'),
            'title_list_address'            => $this->lang->line('title_list_address'),
            'title_create_new_address'      => $this->lang->line('title_create_new_address'),
            'title_address_info'            => $this->lang->line('title_address_info'),
            'title_username_or_email'       => $this->lang->line('title_username_or_email'),
            'title_first_name'              => $this->lang->line('title_first_name'),
            'title_last_name'               => $this->lang->line('title_last_name'),
            'title_company'                 => $this->lang->line('title_company'),
            'title_phone_number'            => $this->lang->line('title_phone_number'),
            'title_street_address'          => $this->lang->line('title_street_address'),
            'title_city'                    => $this->lang->line('title_city'),
            'title_country'                 => $this->lang->line('title_country'),
            'title_state'                   => $this->lang->line('title_state'),
            'title_postcode'                => $this->lang->line('title_postcode'),
            'title_use_billing_address'     => $this->lang->line('title_use_billing_address'),
            'title_use_shipping_address'    => $this->lang->line('title_use_shipping_address'),
            'title_add_address'             => $this->lang->line('title_add_address'),
            'title_change_information'      => $this->lang->line('title_change_information'),
            'title_change_email'            => $this->lang->line('title_change_email'),
            'title_username'                => $this->lang->line('title_username'),
            'title_change_address'          => $this->lang->line('title_change_address'),
            'title_save'                    => $this->lang->line('title_save'),
            'title_information'             => $this->lang->line('title_information'),
            'title_customer_service'        => $this->lang->line('title_customer_service'),
            'title_phone'                   => $this->lang->line('title_phone'),
            'title_register_now'            => $this->lang->line('title_register_now'),
            'title_register'                => $this->lang->line('title_register'),
            'title_sign_in'                 => $this->lang->line('title_sign_in'),
            'title_email'                   => $this->lang->line('title_email'),
            'title_password'                => $this->lang->line('title_password'),
            'title_current_password'        => $this->lang->line('title_current_password'),
            'title_new_password'            => $this->lang->line('title_new_password'),
            'title_confirm_password'        => $this->lang->line('title_confirm_password'),
            'title_show_password'           => $this->lang->line('title_show_password'),
            'title_forgot_password'         => $this->lang->line('title_forgot_password'),
            'title_address'                 => $this->lang->line('title_address'),
            'title_contact_us'              => $this->lang->line('title_contact_us'),
            'title_operational_hour'        => $this->lang->line('title_operational_hour'),
            'title_question'                => $this->lang->line('title_question'),
            'title_full_name'               => $this->lang->line('title_full_name'),
            'title_message'                 => $this->lang->line('title_message'),
            'title_subject'                 => $this->lang->line('title_subject'),
            'title_send_message'            => $this->lang->line('title_send_message'),
            'title_privacy_policy'          => $this->lang->line('title_privacy_policy'),
            'title_term_condition'          => $this->lang->line('title_term_condition'),
            'title_about_us'                => $this->lang->line('title_about_us'),
            'title_my_account'              => $this->lang->line('title_my_account'),
            'title_help_faq'                => $this->lang->line('title_help_faq'),
            'title_shipping_return'         => $this->lang->line('title_shipping_return'),
            'title_search'                  => $this->lang->line('title_search'),
            'title_search_for_blog'         => $this->lang->line('title_search_for_blog'),
            'title_search_for_product'      => $this->lang->line('title_search_for_product'),
            'title_category'                => $this->lang->line('title_category'),
            'title_tags'                    => $this->lang->line('title_tags'),
            'title_author'                  => $this->lang->line('title_author'),
            'title_last_update'             => $this->lang->line('title_last_update'),
            'title_share'                   => $this->lang->line('title_share'),
            'title_filter_by_price'         => $this->lang->line('title_filter_by_price'),
            'title_price'                   => $this->lang->line('title_price'),
            'title_category_product'        => $this->lang->line('title_category_product'),
            'title_product_available_1'     => $this->lang->line('title_product_available_1'),
            'title_product_available_2'     => $this->lang->line('title_product_available_2'),
            'title_product_not_available'   => $this->lang->line('title_product_not_available'),
            'title_sort_by'                 => $this->lang->line('title_sort_by'),
            'title_price_low_to_high'       => $this->lang->line('title_price_low_to_high'),
            'title_price_high_to_low'       => $this->lang->line('title_price_high_to_low'),
            'title_search_result'           => $this->lang->line('title_search_result'),
            'title_my_cart'                 => $this->lang->line('title_my_cart'),
            'title_shopping_now'            => $this->lang->line('title_shopping_now'),
            'title_cart_empty'              => $this->lang->line('title_cart_empty')
        );
        return $data;
    }
}
