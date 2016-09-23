<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class News_model extends CI_Model
{

    // get all news
    function get_all()
    {
        $query = $this->db->get('ci_news');
        return $query->result_array();
    }
    // get one news article by its id
    function get_one($ne_id)
    {
        $this->db->get_where('ci_news', array('ne_id' => $ne_id));
        $query = $this->db->get('ci_news');
        return $query->row();
    }

}

/* End of file news_model.php */
    /* Location: ./application/models/news_model.php */