<?php

namespace Crawler\Models;

use Illuminate\Database\Eloquent\Model;

class Crawlers extends Model {

    protected $table = 'crawlers';
    public $timestamps = false;
    protected $fillable = [
        'crawler_subject',
        'crawler_content',
        'crawler_url'
    ];
    protected $primaryKey = 'crawler_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_crawlers($params = array()) {
        $eloquent = self::orderBy('crawler_id');

        //crawler_subject
        if (!empty($params['crawler_subject'])) {
            $eloquent->where('crawler_subject', 'like', '%'. $params['crawler_subject'].'%');
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

            $crawler->crawler_subject = $input['crawler_subject'];
            $crawler->crawler_content = $input['crawler_content'];
            $crawler->crawler_url = $input['crawler_url'];

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
                    'crawler_subject' => $input['crawler_subject'],
                    'crawler_content' => $input['crawler_content'],
                    'crawler_url' => $input['crawler_url']
        ]);
        return $crawler;
    }
}
