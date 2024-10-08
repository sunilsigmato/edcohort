<?php
class Pagination_model extends CI_Model {

    function get_pagination($page,$total_pages,$seg_temp,$uri)
    {
        $parsed_url = parse_url($uri);
        $path = trim($parsed_url['path'], '/');
        $segments = explode('/', $path);
        $extracted_segment = $segments[1];

// Adjust the start page if we are close to the beginning
    $pagination_links = '';
    
    // First link
    if ($page > 1) {
        $pagination_links .= '<a href="' . base_url() . $extracted_segment.'/?segment=' . urlencode($seg_temp) . '&page=1" data-ci-pagination-page="1"><<</a>';
    }

    // Previous link
    if ($page > 1) {
        $prev_page = $page - 1;
       // $pagination_links .= '<a href="' . base_url() . $extracted_segment.'/?segment=' . urlencode($seg_temp) . '&page=' . $prev_page . '" data-ci-pagination-page="' . $prev_page . '" rel="prev"><</a>';
    }

    // Calculate the range of pages to display
    $start_page = max(1, $page - 1); // Start from 1 or one page before current
    $end_page = min($total_pages, $page + 1); // End at the total pages or one page after current

    // Adjust the start page if we are close to the beginning
    if ($page == 1) {
        $end_page = min(3, $total_pages); // Show the first three pages if on the first page
    }

    // Adjust the end page if we are close to the end
    if ($page == $total_pages) {
        $start_page = max(1, $total_pages - 2); // Show the last three pages if on the last page
    }

    // Page links
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $page) {
            // Highlight the current page without a link
            $pagination_links .= '<a href="' . base_url() . $extracted_segment.'/?segment=' . $seg_temp. '&page=' . $i . '" data-ci-pagination-page="' . $i . '" style="background: #5eabf4 !important; color: #fff !important; "><strong>' . $i . '</strong></a>';
        } else {
            $pagination_links .= '<a href="' . base_url() . $extracted_segment.'/?segment=' . $seg_temp. '&page=' . $i . '" data-ci-pagination-page="' . $i . '">' . $i . '</a>';
        }
    }

    // Next link
    if ($page < $total_pages) {
        $next_page = $page + 1;
      //  $pagination_links .= '<a href="' . base_url() . $extracted_segment.'/?segment=' . urlencode($seg_temp) . '&page=' . $next_page . '" data-ci-pagination-page="' . $next_page . '" rel="next">></a>';
    }

    // Last link
    if ($total_pages > 3) { // Show last link only if there are more than 3 pages
        $pagination_links .= '<a href="' . base_url() . $extracted_segment.'/?segment=' . urlencode($seg_temp) . '&page=' . $total_pages . '" data-ci-pagination-page="' . $total_pages . '">>></a>';
    }
  // Output the pagination links
  return $pagination_links;
  
  
}
}
?>