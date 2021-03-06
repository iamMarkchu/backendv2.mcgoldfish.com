<div class="page-sidebar nav-collapse collapse">
    <ul class="page-sidebar-menu">   
        <li>
            <div class="sidebar-toggler hidden-phone"></div>
        </li>
        <li>
            <form class="sidebar-search">
                <div class="input-box">
                    <a href="javascript:;" class="remove"></a>
                    <input type="text" placeholder="Search...">
                    <input type="button" class="submit" value=" ">
                </div>
            </form>
        </li>            
        <li <eq name="conInfo.name" value="Index">class="active"</eq>>
            <a href="{:U('/')}">
                <i class="icon-home"></i>
                <span class="title">首页</span>
                <span class="selected"></span>
            </a>
        </li>
        <li <eq name="conInfo.name" value="Auth">class="active"</eq>>
            <a href="javascript:;">
                <i class="icon-wrench"></i>
                <span class="title">站点管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{:U('Auth/index')}">授权管理</a>
                </li>
                <li>
                    <a href="{:U('Node/index')}">节点管理</a>
                </li>
                <li>
                    <a href="{:U('SiteConfig/index')}">站点管理</a>
                </li>
                 <li>
                    <a href="{:U('User/index')}">用户管理</a>
                </li>
            </ul>
        </li>
        <li <eq name="conInfo.name" value="Article">class="active"</eq>>
            <a href="javascript:;">
                <i class="icon-file-text"></i>
                <span class="title">内容管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{route('article-add')}}">新增文章</a>
                </li>
                <li>
                    <a href="{{route('article')}}">文章管理</a>
                </li>
                <li>
                    <a href="{:U('Tag/index')}">标签管理</a>
                </li>
                 <li>
                    <a href="{:U('Category/index')}">类别管理</a>
                </li>
                <li>
                    <a href="{:U('Url/index')}">链接管理</a>
                </li>
                <li>
                    <a href="{:U('Comment/index')}">评论管理</a>
                </li>
                <li>
                    <a href="{:U('Album/index')}">相册管理</a>
                </li>
                <li>
                    <a href="{:U('Images/index')}">图片管理</a>
                </li>
            </ul>
        </li>
       <!--  <li <eq name="conInfo.name" value="Finance">class="active"</eq>>
            <a href="javascript:;">
                <i class="icon-money"></i>
                <span class="title">财务</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{:U('Finance/add')}">添加一笔财务</a>
                </li>
                <li>
                    <a href="{:U('Finance/index')}">财务管理</a>
                </li>
            </ul>
        </li> -->
    </ul>
</div>