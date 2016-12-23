<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Sitecount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '统计站点信息';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //多少篇文章，多少个类别，多少个标签，最后更新时间，每个类别下面的文章数量,每篇文章下面的评论数
        $key_name = ['totalArticleCount', 'activeArticleCount', 'originArticleCount', 'totalCategoryCount', 'totalTagCount', 'lastUpdateSiteTime'];

        $key_name[0] = DB::table('article')->count();
        $key_name[1] = DB::table('article')->where('status', 'active')->count();
        $key_name[2] = DB::table('article')->where('articlesource', '原创')->count();
        $key_name[3] = DB::table('category')->count();
        $key_name[4] = DB::table('tag')->count();
        $key_name[5] = DB::table('article')->max('lastupdatetime');
        
    }
}
