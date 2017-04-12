<?php

namespace Crawler\Models;

use Illuminate\Database\Eloquent\Model;

class Crawlers extends Model {

    protected $table = 'crawlers';
    public $timestamps = false;
    protected $fillable = [
        'crawler_name'
    ];
    protected $primaryKey = 'crawler_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_crawlers($params = array()) {
        $eloquent = self::orderBy('crawler_id');

        //crawler_name
        if (!empty($params['crawler_name'])) {
            $eloquent->where('crawler_name', 'like', '%'. $params['crawler_name'].'%');
        }

        $crawlers = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $crawlers;
    }



    /**
     *
     * @param type $input
     * @param type $crawler_id
     * @return type
     */
    public function update_crawler($input, $crawler_id = NULL) {

        if (empty($crawler_id)) {
            $crawler_id = $input['crawler_id'];
        }

        $crawler = self::find($crawler_id);

        if (!empty($crawler)) {

            $crawler->crawler_name = $input['crawler_name'];

            $crawler->save();

            return $crawler;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_crawler($input) {

        $crawler = self::create([
                    'crawler_name' => $input['crawler_name'],
        ]);
        return $crawler;
    }
}
