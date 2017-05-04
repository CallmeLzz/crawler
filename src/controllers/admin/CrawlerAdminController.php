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
use Crawler\Validators\CrawlerAdminValidator;

class CrawlerAdminController extends Controller {

    public $data_view = array();

    private $obj_crawler = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_crawler = new Crawlers();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_crawler = $this->obj_crawler->get_crawlers($params);

        $this->data_view = array_merge($this->data_view, array(
            'crawlers' => $list_crawler,
            'request' => $request,
            'params' => $params
        ));
        return view('crawler::crawler.admin.crawler_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $crawler = NULL;
        $crawler_id = (int) $request->get('id');


        if (!empty($crawler_id) && (is_int($crawler_id))) {
            $crawler = $this->obj_crawler->find($crawler_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'crawler' => $crawler,
            'request' => $request
        ));
        return view('crawler::crawler.admin.crawler_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new crawlerAdminValidator();

        $input = $request->all();

        $crawler_id = (int) $request->get('id');
        $crawler = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($crawler_id) && is_int($crawler_id)) {

                $crawler = $this->obj_crawler->find($crawler_id);
            }

        } else {
            if (!empty($crawler_id) && is_int($crawler_id)) {

                $crawler = $this->obj_crawler->find($crawler_id);

                if (!empty($crawler)) {

                    $input['crawler_id'] = $crawler_id;
                    $crawler = $this->obj_crawler->update_crawler($input);

                    //Message
                    \Session::flash('message', trans('crawler::crawler_admin.message_update_successfully'));
                    return Redirect::route("admin_crawler.edit", ["id" => $crawler->crawler_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('crawler::crawler_admin.message_update_unsuccessfully'));
                }
            } else {

                $crawler = $this->obj_crawler->add_crawler($input);

                if (!empty($crawler)) {

                    //Message
                    \Session::flash('message', trans('crawler::crawler_admin.message_add_successfully'));
                    return Redirect::route("admin_crawler.edit", ["id" => $crawler->crawler_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('crawler::crawler_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'crawler' => $crawler,
            'request' => $request,
        ), $data);

        return view('crawler::crawler.admin.crawler_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $crawler = NULL;
        $crawler_id = $request->get('id');

        if (!empty($crawler_id)) {
            $crawler = $this->obj_crawler->find($crawler_id);

            if (!empty($crawler)) {
                  //Message
                \Session::flash('message', trans('crawler::crawler_admin.message_delete_successfully'));

                $crawler->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'crawler' => $crawler,
        ));

        return Redirect::route("admin_crawler");
    }
}