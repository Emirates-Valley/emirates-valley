<?php 
if(!function_exists('userInfo')){
    function userInfo($userId){
        $CI = & get_instance();
        $CI->load->model('global_function_model');
        return $CI->global_function_model->userInfo($userId);
    }
}