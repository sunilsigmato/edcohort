<?php
class blog_model extends CI_Model {
	public function get_index_posts() // Home Page Blog
    {
        $res_api = wp_api_call('posts?categories=1&per_page=10');
        return json_decode($res_api, true);
    }
    public function get_review_posts() // Review Page Blog
    {
        $res_api = wp_api_call('posts?categories=2&per_page=10');
        return json_decode($res_api, true);
    }
    public function get_complaint_posts() // Complaint Page Blog
    {
        $res_api = wp_api_call('posts?categories=1&per_page=10');
        return json_decode($res_api, true);
    }
    public function get_compare_posts() // Compare Page Blog
    {
        $res_api = wp_api_call('posts?categories=1&per_page=10');
        return json_decode($res_api, true);
    }

    public function get_counselling_posts() // Counselling Page Blog
    {
        $res_api = wp_api_call('posts?categories=1&per_page=10');
        return json_decode($res_api, true);
    }

    public function get_coupon_posts() // Coupon Page Blog
    {
        $res_api = wp_api_call('posts?categories=7&per_page=10');
        return json_decode($res_api, true);
    }

    public function get_media_single_image($parameter) // Retive Single Image
    {
        $url_parts = explode('/', $parameter);
        $res_api = wp_api_call('media/'.end($url_parts));
        $json_data = json_decode($res_api, true);
        return $json_data['guid']['rendered'];
    }


}
