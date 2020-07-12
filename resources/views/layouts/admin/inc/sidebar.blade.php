@php
    $secondParam = Request::segment(2);
    $thirdParam = Request::segment(3);
@endphp

<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#">
                        <img src="{{ Gravatar::get($admin->email) }}" class="img-circle img-responsive">
                    </a>
                    <h6>{{ ucwords($admin->getFullName()) }}</h6>
                    <span class="text-size-small">{!! config('app.name') !!}</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    {{--<li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>--}}
                    {{--<li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>--}}
                    {{--<li><a href="#"><i class="icon-comment-discussion"></i> <span><span--}}
                    {{--class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>--}}
                    {{--<li class="divider"></li>--}}
                    <li><a href="#" id="change_password"><i class="icon-cog5"></i> <span>Change Password</span></a></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="icon-switch2"></i> <span>Logout</span></a></li>


                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li class="{{ $secondParam == 'dashboard' ? 'active':'' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @can('master-policy.perform',['admin-type','view'])
                        <li>
                            <a href="{{ route('admin.admin-type.index') }}"><i class="icon-address-book2 "></i>
                                <span>Admin Types</span></a>
                        </li>
                    @endcan
                    @can('master-policy.perform',['modules','view'])
                        <li class="{{ $secondParam == 'modules' ? 'active':'' }}">
                            <a href="{{ route('admin.module.index') }}"><i class="icon-address-book2 "></i>
                                <span>Module</span></a>
                        </li>
                    @endcan

                    @can('master-policy.perform', ['banner', 'view'])
                        <li class="{{ $secondParam == 'banner' ? 'active':'' }}">
                            <a href="{{ route('admin.banner.index') }}">
                                <i class=" icon-image3"></i>
                                <span>Banners</span>
                            </a>
                        </li>
                    @endcan
                    @can('master-policy.perform', ['blog_categories', 'view'])
                        <li class="{{ $secondParam == 'blog_categories' ? 'active':'' }}">
                            <a href="{{ route('admin.blog.category.index') }}">
                                <i class=" icon-image3"></i>
                                <span>Blog Categories</span>
                            </a>
                        </li>
                    @endcan
                    @can('master-policy.perform', ['blog', 'view'])
                        <li class="{{ $secondParam == 'blog' ? 'active':'' }}">
                            <a href="{{ route('admin.blog.index') }}">
                                <i class=" icon-image3"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                    @endcan

                    @can('master-policy.perform', ['content', 'view'])
                        <li class="{{ $secondParam == 'contents' ? 'active':'' }}">
                            <a href="{{ route('admin.contents.index') }}">
                                <i class="icon-stats-bars"></i>
                                <span>Content</span>
                            </a>
                        </li>
                    @endcan

                    @can('master-policy.perform', ['content-banner', 'view'])
                        <li class="{{ $secondParam == 'content-banner' ? 'active':'' }}">
                            <a href="{{ route('admin.content-banner.index') }}">
                                <i class="icon-stats-bars"></i>
                                <span>Content-Banner</span>
                            </a>
                        </li>
                    @endcan
                    @can('master-policy.perform',['event','view'])
                        <li class="{{ $secondParam == 'event' ? 'active':'' }}">
                            <a href="{{ route('admin.event.index') }}">
                                <i class=" icon-images2"></i>
                                <span>Event</span>
                            </a>
                        </li>
                    @endcan
                            @can('master-policy.perform',['gallery','view'])
                                <li class="{{ $secondParam == 'gallery' ? 'active':'' }}">
                                    <a href="{{ route('admin.gallery.index') }}">
                                        <i class=" icon-images2"></i>
                                        <span>Gallery</span>
                                    </a>
                                </li>
                            @endcan

            @can('master-policy.perform', ['news', 'view'])
                                                <li class="{{ $secondParam == 'news' ? 'active':'' }}">
                                                    <a href="{{ route('admin.news.index') }}">
                                                        <i class=" icon-grid"></i>
                                                        <span>News</span>
                                                    </a>
                                                </li>
                                            @endcan

                                                @can('master-policy.perform', ['room-list', 'view'])
                                                    <li class="{{ $secondParam == 'room-list' ? 'active':'' }}">
                                                        <a href="{{ route('admin.roomlist.index') }}">
                                                            <i class=" icon-download"></i>
                                                            <span>Roomlist</span>
                                                        </a>
                                                    </li>
                                                @endcan






                   

                  {{--  @can('master-policy.perform', ['notice', 'view'])--}}
                      {{--      <li class="{{ $secondParam == 'notice' ? 'active':'' }}">--}}
                        {{--        <a href="{{ route('admin.notice.index') }}">--}}
                           {{--         <i class=" icon-bell3"></i>--}}
                           {{--         <span>Notice</span>--}}
                            {{--    </a>--}}
                         {{--   </li>--}}
                     {{--   @endcan --}}



                  {{--  @can('master-policy.perform',['popup','view'])
                   {{--      <li class="{{ $secondParam == 'popup' ? 'active':'' }}">
                            <a href="{{ route('admin.popup.index') }}">
                                <i class=" icon-images2"></i>
                                <span>PopUp</span>
                            </a>
                        </li> --}}
                   {{--  @endcan --}}

                {{--    @can('master-policy.perform', ['room-list', 'view']) --}}
                 {{--       <li class="{{ $secondParam == 'roomlist' ? 'active':'' }}">
                            <a href="{{ route('admin.roomlist.index') }}">
                                <i class=" icon-images2"></i>
                                <span>Roomlist</span>
                            </a>
                        </li> --}}
                 {{--   @endcan --}}








                                                    @can('master-policy.perform', ['setting', 'view'])
                                                        <li class="{{ $thirdParam == 'setting' ? 'active':'' }}">
                                                            <a href="{{ route('admin.setting.index') }}">
                                                                <i class=" icon-cog2"></i>
                                                                <span>Site Setting</span>
                                                            </a>
                                                        </li>
                                                    @endcan
                    @can('master-policy.perform', ['testimonial', 'view'])
                        <li class="{{ $secondParam == 'testimonial' ? 'active':'' }}">
                            <a href="{{ route('admin.testimonials.index') }}">
                                <i class=" icon-vcard"></i>
                                <span>Testimonial</span>
                            </a>
                        </li>
                    @endcan

                    @can('master-policy.perform', ['member-type', 'view'])
                        <li class="{{ $thirdParam == 'member-type' ? 'active':'' }}">
                            <a href="{{ route('admin.member-type.index') }}">
                                <i class=" icon-cog2"></i>
                                <span>Member Type</span>
                            </a>
                        </li>
                    @endcan

                    @can('master-policy.perform', ['member', 'view'])
                        <li class="{{ $thirdParam == 'member' ? 'active':'' }}">
                            <a href="{{ route('admin.member.index') }}">
                                <i class=" icon-cog2"></i>
                                <span>Members</span>
                            </a>
                        </li>
                    @endcan

                  {{--  @can('master-policy.perform', ['email-subscribe', 'view']) --}}
                   {{--     <li class="{{ $thirdParam == 'email-subscribe' ? 'active':'' }}">
                            <a href="{{ route('admin.email-subscribe.index') }}">
                                <i class=" icon-cog2"></i>
                                <span>Email Subscribe</span>
                            </a>
                        </li> --}}
                {{--    @endcan --}}

                 {{--   @can('master-policy.perform', ['blog', 'view']) --}}
                  {{--      <li class="{{ $thirdParam == 'blog' ? 'active':'' }}">
                            <a href="{{ route('admin.blog.blog.index') }}">
                                <i class=" icon-blog"></i>
                                <span>Blog</span>
                            </a>
                        </li> --}}
                  {{--  @endcan --}}
                  

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
                <div class="alert alert-success" style="display:none"></div>
                <div class="alert alert-danger" style="display:none"></div>
            </div>
            <div class="modal-body">
                {!! Form::open(array('route' => 'admin.reset_password','class'=>'form-horizontal','id'=>'Password', 'files' => 'true')) !!}
                _
                <fieldset class="content-group">
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="control-label col-lg-4">old Password <span class="text-danger">*</span></label>

                        <div class="col-lg-8 ">
                            {!! Form::password('oldpassword', null, array('class'=>'form-control','placeholder'=>'Title')) !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group {{ $errors->has('caption') ? ' has-error' : '' }}">
                        <label class="control-label col-lg-4">New Password <span class="text-danger">*</span></label>

                        <div class="col-lg-8 ">
                            {!! Form::password('newpassword', null, array('class'=>'form-control','placeholder'=>'Caption')) !!}
                        </div>
                        @if ($errors->has('caption'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('caption') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                        <label class="control-label col-lg-4">Confirm Password <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            {!! Form::password('confirmpassword', null, array('class'=>'form-control', 'required' => 'true')) !!}

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </fieldset>
                <div class="text-left col-lg-offset-2">
                    <button type="submit" class="btn btn-primary legitRipple">
                        Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>