@extends('layouts.master')
@section('content')
<!-- BEGIN SEARCHBAR-->
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box {!! config('site.PORLET_COLOR') !!}">
            <div class="portlet-title">
                <div class="caption">
                    {!! config('site.SEARCH_AERA') !!}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body form" >
                <div class="row-fluid">
                    <!--BEGIN SEARCH-->
                    <input type="hidden" id="noAjax" value=""/>
                    <div class="span2">
                        <div class="controls">
                            <input type="text" id="search_id_or_title" name="search_id_or_title" class="m-wrap small" placeholder="id或者title" value="" />
                        </div>
                    </div>
                    <div class="span2">
                        <div class="controls">
                              <select id="selectarticlesource" class="m-wrap small" placeholder="文章来源">
                                  <option value="-1">文章来源</option>
                                  <option value="原创">原创</option>
                                  <option value="转载">转载</option>
                              </select>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="controls">
                              <select id="selectstatus" class="m-wrap small" placeholder="文章状态">
                                  <option value="-1">文章状态</option>
                                  <option value="active">active</option>
                                  <option value="deleted">deleted</option>
                                  <option value="republish">republish</option>
                              </select>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="controls">
                              <select id="selectorderby" class="m-wrap small" placeholder="文章排序">
                                  <option value="-1">文章排序</option>
                                  <option value="id">by id asc</option>
                                  <option value="id desc">by id desc</option>
                                  <option value="maintainorder asc">by maintainorder asc</option>
                                  <option value="maintainorder desc">by maintainorder desc</option>
                              </select>
                        </div>
                    </div>
                    <div class="span1">
                        <div class="btn-group">
                            <button class="btn  {!! config('site.SEARCH_BUTTON_COLOR') !!}" id="searchbutton">{!! config('site.SEARCH_BUTTON') !!}</button>
                        </div>
                    </div>
                </div>
                    <!--END SEARCH-->
            </div>
        </div>
    </div>
</div>
<!-- END SEARCHBAR-->
<!-- BEGIN CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box {!! config('site.PORLET_COLOR') !!}">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-list"></i>{{{$conInfo->remark}}}{!! config('site.LISTNAME') !!}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
                    <div class="span12">
                         <div class="btn-group">
                            <button class="btn green" id="{!! config('site.ADDNAME') !!}{{$conInfo->name}}">{!! config('site.ADD_BUTTON') !!}{{$conInfo->remark}}</button>
                         </div>
                         <div class="btn-group">
                            <button class="btn" id="{!! config('site.ADDNAME') !!}{{$conInfo->name}}">{!! config('site.EDIT_BUTTON') !!}{{$conInfo->remark}}</button>
                         </div>
                         <div class="btn-group">
                            <button class="btn" id="{!! config('site.ADDNAME') !!}{{$conInfo->name}}">{!! config('site.DELETE_BUTTON') !!}{{$conInfo->remark}}</button>
                         </div>
                    </div>
                </div>
                <table class="display" id="tbartilceList">
                    <thead>
                        <tr>
                            <th>
                                编号
                            </th>
                            <th>
                                标题
                            </th>
                            <th>
                                状态
                            </th>
                            <th>
                                点击次数
                            </th>
                            <th>
                                文章来源
                            </th>
                            <th>
                                维护等级
                            </th>
                            <th>
                                编辑
                            </th>
                            <th>
                                所属类别
                                <br>
                                所属标签
                            </th>
                            <th>
                                添加时间
                                <br>
                                最后更新时间
                            </th>
                            <th>
                                操作
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT-->
<include file="Url:modal-edit" />
<include file="Public:modal-delete" />
<include file="Public:modal-alert" />
@endsection