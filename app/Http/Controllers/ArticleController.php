<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Tag;
use App\Category;
use DB;

class ArticleController extends Controller
{
    public function index(){
    	$data['owncss'] = [
    						'/media/css/jquery.dataTables.min.css',
    					];
    	$data['ownjs'] = [ 
                            '/media/js/jquery.1.10.12.dataTables.min.js',
    					 	'/own-js/base.js',
    					 	'/own-js/article/index.js',
    					];
        $data['conInfo'] = DB::table('node')->where('name', 'Article')->first();
    	return view('article.index', $data);
    }

    public function add(){
    	
    	$data['owncss'] = [
    						'/media/css/select2_metro.css',
    					];
    	$data['ownjs'] = [
    						'/media/js/select2.min.js',
    						'/own-js/article/add.js',
    					];

    	$data['allTagInfo'] = Tag::orderBy('displayorder', 'asc')->get();

        $data['allCateInfo'] = Category::orderBy('parentcategoryid', 'asc')->get();
        $data['conInfo'] = DB::table('node')->where('name', 'Article')->first();
    	return view('article.add', $data);
    }

    public function insert(Request $request){
        $article = new Article;
        $article->title = $request->input('title');
        $article->articlesource = $request->input('articlesource');
        $article->content = $request->input('content');
        $article->maintainorder = $request->input('maintainorder');
        $article->pageh1 = $request->input('pageh1');
        $article->addeditor = 'Mark';
        $article->tip = 'test';
        $article->addtime = date("Y-m-d H:i:s");
        if ($request->hasFile('imgFile')) {
            $destinationPath = 'fengmian-'.date('Y-m-d');
            $fileName = date('YmdHis').rand(1,100).'.'.$request->imgFile->guessExtension();
            $file = $request->file('imgFile')->move($destinationPath, $fileName);
            $article->image = '/'.$destinationPath.'/'.$fileName;
        }
        if($article->save()){
            $requestPath = "/article/{$article->id}.html";
            $urlData['requestpath'] = $request->has('requestPath')?$request->input('requestPath'):$requestPath;
            $urlData['Modeltype'] = "文章";
            $urlData['optdataid'] = $article->id;
            $urlData['isjump'] = "NO";
            $urlData['status'] = "yes";
            DB::table('rewrite_url')->insert($urlData);

            if($request->has('pagetitle')){
                $pageMetaData['pagetitle'] = $request->input('pagetitle');
                $pageMetaData['pagekeyword'] = $request->input('pagekeyword');
                $pageMetaData['pagedescription'] = $request->input('pagedescription');
                $pageMetaData['optdataid'] = $article->id;
                DB::table('page_meta')->insert($pageMetaData);
            }

            if($request->has('categoryid')){
                $cateogyMappingData['datatype'] = 'article';
                $cateogyMappingData['optdataid'] = $article->id;
                $cateogyMappingData['isprimary'] = 'yes';
                $cateogyMappingData['addtime'] = date("Y-m-d H:i:s");
                DB::table('category_mapping')->insert($cateogyMappingData);
            }

            if($request->has('tag_multi_select2')){
                $tmpList = [];
                foreach ($request->input('tag_multi_select2') as $k => $v) {
                    $data = [];
                    $data['optdataid'] = $article->id;
                    $data['datatype'] = 'article';
                    if($k == 0){
                        $data['isprimary'] = 'yes';
                    }else{
                        $data['isprimary'] = 'no';
                    }
                    $data['addtime'] = date("Y-m-d H:i:s");
                    $data['tagid'] = $v;
                    $tmpList[] = $data;
                }
                DB::table('tag_mapping')->insert($data);
            }
        }
        return redirect(route('article'))->with('status', '添加成功!');
    }
    public function querydata(Request $request){
    	$start = $request->input('start');
    	$length = $request->input('length');
    	$searchArray = session('articleSearch');
        if(isset($searchArray['where'])) $map = $searchArray['where'];
            else $map = '';
        if(isset($searchArray['order'])) $order = $searchArray['order'];
            else $order = '';
        //尚未引入用户系统
        //$adminFlag = session('administrator');
        //if(!isset($adminFlag)) $map['addeditor'] = session('loginUserName');
    	$article = new Article;
    	$result = $article->getArticleListForPage($start,$length,$map,$order);
    	$count = $article->getArticleListForPageCount($map,$order);
    	$jsonBack = array();
    	$jsonBack['data'] = $result;
    	$jsonBack['recordsFiltered'] = $count;
    	$jsonBack['recordsTotal'] = $count;
    	return $jsonBack;
    }
}
