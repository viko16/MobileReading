<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $searchBookName    = $this->input->get_post('searchBookName');
        $showingBookID     = $this->input->get('bid');
        $showingClassifyID = $this->input->get('cid');

        $this->load->model('classify_model');
        $this->load->model('article_model');

        $classifyArray            = $this->classify_model->get_classify();
        $articleArray             = null;
        $searchResultArticleArray = null;

        if ($showingClassifyID) {
            $articleArray = $this->article_model->get_article_by_keyword_and_classify('', $showingClassifyID);
            if ($searchBookName) {
                $searchResultArticleArray = $this->article_model->get_article_by_keyword_and_classify($searchBookName, $showingClassifyID);
            } else {
                $searchResultArticleArray = $this->article_model->get_article_by_keyword_and_classify('', $showingClassifyID);
            }
        } else {
            $articleArray = $this->article_model->get_article();
            if ($searchBookName) {
                $searchResultArticleArray = $this->article_model->get_article_by_keyword_and_classify($searchBookName);
            } else {
                $searchResultArticleArray = $this->article_model->get_article();
            }
        }

        $this->load->view('home/html-header');
        $this->load->view('home/jQueryMobilePage', ['classifyArray'            => $classifyArray,
                                                    'articleArray'             => $articleArray,
                                                    'searchBookName'           => $searchBookName,
                                                    'searchResultArticleArray' => $searchResultArticleArray,
                                                    'showingClassifyID'        => $showingClassifyID,
                                                    'showingBookID'            => $showingBookID,
                                                    'showingBook'              => $this->article_model->get_article($showingBookID)]);
        $this->load->view('home/html-footer');
    }

} 