<?php

namespace Crawler\Controlers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Crawler\Models\Crawlers;

class CrawlerFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_crawler = new crawlers();
        $crawlers = $obj_crawler->get_crawlers();
        $this->data = array(
            'request' => $request,
            'crawlers' => $crawlers
        );
        return view('crawler::crawler.index', $this->data);
    }

}