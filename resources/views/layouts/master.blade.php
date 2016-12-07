<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
@include('public.head')
<body class="page-header-fixed page-sidebar-fixed">
    @include('public.header')
    <div class="page-container">
        @include('public.menu')
        <div class="page-content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="breadcrumb my-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="/">Home</a>
                                <i class="icon-angle-right">
                                </i>
                            </li>
                            <volist name="breadCrumb" id="vo">
                                <li>
                                    <a href="">{$vo}</a><neq name="key" value="1">
                                        <i class="icon-angle-right"></i></neq>
                                </li>
                            </volist>
                        </ul>
                    </div>
                </div>
                <div>
                     @yield('content')
                </div>
              </div>
            </div>
        </div>
    </div>
    @include('public.footer')
    @include('public.footer-js')
</body>
</html>
