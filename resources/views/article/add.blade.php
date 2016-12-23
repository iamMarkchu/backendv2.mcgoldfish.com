@extends('layouts.master')
@section('content')
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box {!! config('site.PORLET_COLOR') !!}">
            <div class="portlet-title">
                <div class="caption">
                    {!! config('site.ADD_BUTTON') !!}{{$conInfo->remark}}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="row-fluid">
                    <div class="span12">
                        <form action="{{route('article-insert')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="tabbable tabbable-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab">文章</a></li>
                                <li><a href="#tab_1_2" data-toggle="tab">类别&标签</a></li>
                                <li><a href="#tab_1_3" data-toggle="tab">标题&关键字&描述</a></li>
                            </ul>
                            <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="control-group">
                                            <label class="control-label">文章标题</label>
                                            <div class="controls">
                                                <input type="text" placeholder="文章标题" class="m-wrap large"  name="title" autocomplete="off" />
                                                <p class="help-inline"><span class="text-warning">*</span>&nbsp不能为空</p>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">文章封面</label>
                                            <div class="controls">
                                                <input type="file" name="imgFile" />
                                            </div>
                                            <div class="controls">
                                                <p class="help-inline"><span class="text-warning">*</span>&nbsp750*220图片显示效果最佳,且图片大小不超过2M</p>
                                            </div>
                                            <div class="controls">
                                                <img id="imghead" src=""/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">文章来源</label>
                                            <div class="controls">
                                                <label class="radio">
                                                    <span class="checked">
                                                        <input type="radio" name="articlesource" value="原创" checked="checked">
                                                    </span>
                                                    原创
                                                </label>
                                                <label class="radio">
                                                    <span>
                                                        <input type="radio" name="articlesource" value="转载">
                                                    </span>
                                                    转载
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">文章链接</label>
                                            <div class="controls">
                                                <input type="text" placeholder="文章链接" class="m-wrap large"  name="requestPath" />

                                                <span class="help-inline"><span style="color:red;">*</span>&nbsp若不填,url默认为/article/文章id.html</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">文章内容</label>
                                            <div class="controls">
                                                 <script id="container" name="content" type="text/plain">
                                                    这里写你的初始化内容
                                                </script>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">维护等级</label>
                                            <div class="controls">
                                                <input type="text" placeholder="维护等级" class="m-wrap small" name="maintainorder" value="99"/>
                                                <span class="help-inline">按什么顺序排序</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_1_2">
                                       <div class="control-group">
                                            <label class="control-label">标签选择</label>
                                            <div class="controls tagclass">
                                                <select multiple="multiple" data-placeholder="标签选择" class="chosen span3 chzn-done select2" tabindex="-1"  name="tag_multi_select2[]">
                                                    @foreach($allTagInfo as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->displayname}}</option>
                                                    @endforeach
                                                </select>
                                                &nbsp<a href="#" id="addOneTag" class="btn red">{!! config('site.ADD_BUTTON') !!}一个新标签</a>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">分类选择</label>
                                            <div class="controls">
                                                <select data-placeholder="分类选择" class="chosen span3 chzn-done select2" tabindex="-1" name="categoryid" style="display: none;">
                                                    <option></option>
                                                    @foreach($allCateInfo as $category)
                                                    <option value="{{$category->id}}">{{$category->displayname}}</option>
                                                    @endforeach
                                                </select>
                                                &nbsp<a href="#" id="addOneCategory" class="btn green">{!! config('site.ADD_BUTTON') !!}一个新类别</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_1_3">
                                        <div class="control-group">
                                                <label class="control-label">网页H1</label>
                                            <div class="controls">
                                                <input type="text" placeholder="网页H1" class="m-wrap medium" id="manager" name="pageh1" />
                                                <span class="help-inline">与seo有关的网页h1</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label">网页title</label>
                                            <div class="controls">
                                                <input type="text" placeholder="pagetitle" class="m-wrap medium" id="manager" name="pagetitle" />
                                                <span class="help-inline">与seo有关的title</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label">网页keyword</label>
                                            <div class="controls">
                                                <input type="text" placeholder="pagekeyword" class="m-wrap medium" name="pagekeyword" />
                                                <span class="help-inline">与seo有关的keyword</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label">网页description</label>
                                            <div class="controls">
                                                <input type="text" placeholder="pagedescription" class="m-wrap medium" name="pagedescription" />
                                                <span class="help-inline">与seo有关的description</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn blue">{!! config('site.SAVE_BUTTON') !!}</button>
                                <a href="{{route('article')}}" class="btn">{!! config('site.CANCEL_BUTTON') !!}</a>
                            </div>
                        </form>
                        <!--END TABS-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<include file="Tag:modal-add" />
<include file="Category:modal-add" />
<include file="Public:modal-alert" />
@endsection