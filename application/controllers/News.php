<?php

/** @property news_model $news_model *
* @property comment_model $comment_model
 */
class News extends Front_end
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('comment_model');
        $this->load->library('form_validation');


    }


    // this function to handle getting all news
    function index()
    {
        $data['news'] = $this->news_model->get_all();
        $this->view('content/news_list', $data);
    }

    /* this function to handle getting
      news details and its comments based on news id  */

    function show_one($ne_id)
    {
        // get a post news based on news id
        $data['news'] = $this->news_model->get_one($ne_id);
        // get a post COMMENTS based on news id and send it to view
        $data['comments'] = $this->show_tree($ne_id);
        $this->view('content/show_one', $data);
    }
    // this function to handle add comments form on the news
    function add_comment($ne_id)
    {

        // get a post id based on news id
        $data['news'] = $this->news_model->get_one($ne_id);

        //set validation rules
        $this->form_validation->set_rules('comment_name', 'Name', 'required|trim|htmlspecialchars');
        $this->form_validation->set_rules('comment_email', 'Email', 'required|valid_email|trim|htmlspecialchars');
        $this->form_validation->set_rules('comment_body', 'comment_body', 'required|trim|htmlspecialchars');
        if ($this->form_validation->run() == FALSE) {
            // if not valid load comments
            $this->session->set_flashdata('error_msg', validation_errors());
            redirect("news/show_one/$ne_id");
        } else {
            //if valid send comment to admin to tak approve
            $this->comment_model->add_new_comment();
            $this->session->set_flashdata('error_msg', 'Your comment is awaiting moderation.');
            redirect("news/show_one/$ne_id");
        }
    }

    function show_tree($ne_id)
    {
        // create array to store all comments ids
        $store_all_id = array();
        // get all parent comments ids by using news id
        $id_result = $this->comment_model->tree_all($ne_id);
        // loop through all comments to save parent ids $store_all_id array
        foreach ($id_result as $comment_id) {
            array_push($store_all_id, $comment_id['parent_id']);
        }
        // return all hierarchical tree data from in_parent by sending
        //  initiate parameters 0 is the main parent,news id, all parent ids

        return  $this->in_parent(0,$ne_id, $store_all_id);
    }


    /* recursive function to loop
       through all comments and retrieve it
    */
    function in_parent($in_parent,$ne_id,$store_all_id) {
        // this variable to save all concatenated html
        $html = "";
        // build hierarchy  html structure based on ul li (parent-child) nodes
        if (in_array($in_parent,$store_all_id)) {
            $result = $this->comment_model->tree_by_parent($ne_id,$in_parent);
            $html .=  $in_parent == 0 ? "<ul class='tree'>" : "<ul>";
            foreach ($result as $re) {
                $html .= " <li class='comment_box'>
            <div class='aut'>".$re['comment_name']."</div>
            <div class='aut'>".$re['comment_email']."</div>
            <div class='comment-body'>".$re['comment_body']."</div>
            <div class='timestamp'>".date("F j, Y", $re['comment_created'])."</div>
            <a  href='#comment_form' class='reply' id='" . $re['comment_id'] . "'>Replay </a>";
                $html .=$this->in_parent($re['comment_id'],$ne_id, $store_all_id);
                $html .= "</li>";
            }
            $html .=  "</ul>";
        }

        return $html;
    }



}
/* End of file news.php */
/* Location: ./application/controllers/news.php */