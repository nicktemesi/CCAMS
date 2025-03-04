<?php 
class View_content{
    function get_home_content($userid){
        // Define number of posts per page
        $posts_per_page = 3;

        // Get the current page from the query string, default to 1
        $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

        // Calculate the offset for the SQL query
        $offset = ($current_page - 1) * $posts_per_page;

        // Fetch posts with pagination
        $DB = new Database();
        // SQL query to fetch posts from the groups the user is a member of
        $query = "
        SELECT 
            p.post_id,p.post_content,p.post_image,p.post_date,g.group_name
        FROM 
            posts_table p
        JOIN 
            group_members_table gm ON p.group_id = gm.group_id
        JOIN 
            group_table g ON g.groupid = p.group_id
        WHERE 
            gm.user_id = $userid
        ORDER BY 
            p.post_date DESC  
        LIMIT $posts_per_page OFFSET $offset
                 ";

        $posts = $DB->readFromDb($query);
        // print_r($posts);


        // SQL query to count total posts
        $count_query = "
            SELECT COUNT(*) AS total 
            FROM posts_table p
            JOIN group_members_table gm ON p.group_id = gm.group_id
            WHERE gm.user_id = $userid
        ";
        $count_result = $DB->readFromDb($count_query);
        $total_posts = $count_result[0]['total'];
        $total_pages = ceil($total_posts / $posts_per_page);

        // return $posts;
        return [
            'posts' => $posts,
            'total_pages' => $total_pages,
            'current_page' => $current_page,
        ];
    }
}
?>