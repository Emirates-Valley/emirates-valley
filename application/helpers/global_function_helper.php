<?php 
if(!function_exists('title_slug')) {
    function title_slug($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
if(!function_exists('userInfo')){
    function userInfo($userId){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->userInfo($userId);
    }
}

if(!function_exists('home_slider')){
    function home_slider(){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->slider_listing();
    }
}

if(!function_exists('home_features')){
    function home_features(){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->features_listing();
    }
}

if(!function_exists('home_testimonial')){
    function home_testimonial(){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->testimonial_listing();
    }
}

if(!function_exists('home_team')){
    function home_team(){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->team_listing();
    }
}

if(!function_exists('get_active_dealers')){
    function get_active_dealers(){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->get_active_dealers();
    }
}