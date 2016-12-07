<div class="header navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="/">
                <img src="/image/logo2.png" alt="logo" />
            </a>
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="/media/image/menu-toggler.png" alt="" />
            </a>
            <ul class="nav pull-right">
                <li class="dropdown user"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="{$Think.Session.userImage}" />
                    &nbsp
                    <span class="username">{$Think.Session.loginUserName}</span><i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{:U('Public/changepwd')}"><i class="icon-user"></i>修改密码</a></li>
                        <li><a href="{:U('Public/logout')}"><i class="icon-key"></i>注销</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>