<?php namespace Crawler\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Crawler\Models\Crawlers;
/**
 * Validators
 */
use Goutte\Client as GoutteClient;
use GuzzleHttp\Client as GuzzleClient;

class CrawlerController extends Controller {
	public $arrMenu = array();
	private $guzzleClient = NULL;
	private $client = NULL;
	private $base_uri = 'http://vnexpress.net/';
    private $max_page = 100;
	private $crawler = NULL;
	private $obj_crawler = NULL;

	public function __construct() {
        $this->guzzleClient  = new GuzzleClient([
        	'base_uri' => $this->base_uri, 
        	'verify' => false
    	]);

    	$this->client = new GoutteClient();
        $this->client = $this->client->setClient($this->guzzleClient);

        $this->obj_crawler = new Crawlers();
    }

    public function index(Request $request){
    	$params = $request->all();

    	$this->getData('tin-tuc/the-gioi/');
    	die();
        $list_crawler = $this->obj_crawler->get_crawlers($params);

        $this->data_view = array_merge($this->data_view, array(
            'crawlers' => $list_crawler,
            'request' => $request,
            'params' => $params
        ));
        return view('crawler::crawler.admin.crawler_list', $this->data_view);
    }
	public function getMenu(){
        $this->crawler = $this->client->request('GET', $this->base_uri);

        $this->crawler->filter('#menu_web')->each(function ($node) {
        	$this->arrMenu = $node->text();
        	// array_push($this->arrMenu, $node->text());
		});
		return $this->arrMenu;
	}
	public function getData($uri){
        // $index = 1;

        // while ($index < 5) {
        //     $this->crawler = $this->client->request('GET', $this->base_uri.$uri.'page/'.$index.'.html');
        
        //     $this->crawler->filter('.title_news')->each(function ($node) {
        //         $crl = NULL;
        //         $link = $node->filter('a')->attr('href');
        //         $crl = $this->client->request('GET', $link);

        //         $subject = trim($node->text());
        //         // $content = $crl->filter('#left_calculator')->text();
                
        //         $input = [
        //             'crawler_subject' => $subject,
        //             'crawler_content' => '',
        //             'crawler_url' => $link
        //         ];
        //         $crawler = $this->obj_crawler->add_crawler($input);
        //     });

        //     $index++;
        // }

        $this->crawler = $this->client->request(
            'POST', 
            'https://www.vietnamworks.com/viec-lam-cong-nghe-cao-tai-ho-chi-minh-i66v29-vn', 
            [
                'requests' => [
                    'indexName' => 'vnw_job_v2_66',
                    'params' => [
                        'hitsPerPage' => 50,
                        'maxValuesPerFacet' => 20,
                        'page' => 0,
                        'facets' => ["categoryIds","locationIds","categories","locations","skills","jobLevel","company"],
                        'tagFilters' => null,
                        'facetFilters' => ['locationIds' => 29, 'categoryIds' => 66]
                    ]
                ]
            ]);
        echo $this->crawler->getBody();
        $this->crawler->filter('h3 > a')->each(function ($node){
            print_r($node->text());
        });
    }
}