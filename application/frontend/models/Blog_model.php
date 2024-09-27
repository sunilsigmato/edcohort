<?php
class blog_model extends CI_Model {

	protected $baseUrlBlog = 'https://edcohort.com/blog/wp-json/wp/v2/';
	public function get_index_posts()
    {
        $url = $this->baseUrlBlog . 'posts?categories=1&per_page=10';
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Execute cURL
        $response = curl_exec($ch);
        // Check for cURL errors
        if (curl_errno($ch)) {
            // Handle error
            return [];
        }
        // Close cURL
        curl_close($ch);

        // Decode JSON response
        return json_decode($response, true);
    }
}
