<?php

namespace Crawler\Models;

use Illuminate\Database\Eloquent\Model;

class CrawlersCategories extends Model {

    protected $table = 'crawlers_categories';
    public $timestamps = false;
    protected $fillable = [
        'crawler_category_name'
    ];
    protected $primaryKey = 'crawler_category_id';

    public function get_crawlers_categories($params = array()) {
        $eloquent = self::orderBy('crawler_category_id');

        if (!empty($params['crawler_category_name'])) {
            $eloquent->where('crawler_category_name', 'like', '%'. $params['crawler_category_name'].'%');
        }
        $crawlers_category = $eloquent->paginate(10);
        return $crawlers_category;
    }

    /**
     *
     * @param type $input
     * @param type $crawler_id
     * @return type
     */
    public function update_crawler($input, $crawler_id = NULL) {

        if (empty($crawler_id)) {
            $crawler_id = $input['crawler_category_id'];
        }

        $crawler = self::find($crawler_id);

        if (!empty($crawler)) {

            $crawler->crawler_category_name = $input['crawler_category_name'];

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
                    'crawler_category_name' => $input['crawler_category_name'],
        ]);
        return $crawler;
    }
}
