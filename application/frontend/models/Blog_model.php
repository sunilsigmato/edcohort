<?php
class blog_model extends CI_Model {
	public function get_index_posts()
    {
        $res_api = wp_api_call('posts?categories=1&per_page=10');
        return json_decode($res_api, true);
    }
    public function get_media_single_image($parameter)
    {
        $url_parts = explode('/', $parameter);
        $res_api = wp_api_call('media/'.end($url_parts));
        $json_data = json_decode($res_api, true);
        return $json_data['guid']['rendered'];
    }


}
