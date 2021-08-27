<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        @foreach( $settings as $setting )
        <!-- App Title -->
        <title>@yield('title') | {{ $setting->title }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/uploads/setting/'.$setting->favicon_path) }}">
        @endforeach

        @if(empty($setting))
        <!-- App Title -->
        <title>@yield('title')</title>
        @endif

        <!-- Latest compiled and minified CSS : Bootstrap CDN link-->
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->

        <!-- App css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
        

        <!-- third party css -->
        <link href="{{ asset('backend/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/vendor/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->


        <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu left-side-menu-dark">

                <div class="slimscroll-menu">

                    @if(isset($setting))
                    <!-- LOGO -->
                    <a href="{{ URL::route('dashboard.index') }}" class="logo text-center mb-4">
                        <span class="logo-lg">
                            <img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="logo" height="20">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="logo" height="24">
                        </span>
                    </a>
                    @endif

                    @if(Request::is('dashboard*'))
                    <!--- Sidemenu -->
                    @include('admin.inc.sidebar')
                    <!-- End Sidebar -->
                    @endif

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    @if(isset(Auth::user()->image_path))
                                    <img src="{{ asset('/uploads/profile/'.Auth::user()->image_path) }}" onerror="this.onerror=null;this.src='/backend/images/users/user.png';" alt="user-image" class="rounded-circle">
                                    @else
                                    <img src="{{ asset('/backend/images/users/user.png') }}" alt="user-image" class="rounded-circle">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !
                                            <small class="pro-user-name ml-1">
                                                {{ Auth::user()->name }}
                                            </small>
                                        </h6>
                                    </div>

                                    <!-- item-->
                                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-user"></i>
                                        <span>My Account</span>
                                    </a> -->

                                    @can('isAdmin')
                                    <!-- item-->
                                    <a href="{{ URL::route('setting.index') }}" class="dropdown-item notify-item">
                                        <i class="fe-settings"></i>
                                        <span>Settings</span>
                                    </a>
                                    @endcan

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        
                                        <i class="fe-log-out"></i>
                                        <span>Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                            @endguest

                        </ul>
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="fe-menu"></i>
                        </button>
                        <div class="app-search">
                            <!-- <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                    </div>
                    <!-- end Topbar -->


                    <!-- Start Content-->
                    @yield('content')
                    <!-- End Content-->
                    


                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                @if(isset($setting))
                                Admin &copy; - {{ $setting->title }}
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="{{ URL('/') }}">Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- App js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>
        <script src="{{ asset('backend/js/all.min.js') }}"></script>
        <script src="{{ asset('backend/js/summernote-bs4.js') }}"></script>


        <!-- third party js -->
        <script src="{{ asset('backend/js/vendor/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('backend/js/vendor/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('backend/js/vendor/switchery.min.js') }}"></script>
        <!-- third party js ends -->
        

        <script src="{{ asset('backend/js/app.js') }}"></script>
        <!-- Latest compiled and minified JavaScript -->
        <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script-->
        <script>
            //Jquery Starts
            $(document).ready(function(){

                $(document).on('change','#services',function(){
                    var Service_val = $(this).val();
                    if(Service_val == 1 ){
                            $('#5day').text(100);
                            $('#48hrs').text(150);
                            $('#24hrs').text(200);
                            $('#12hrs').text(300);
                        }else if(Service_val == 2){
                            $('#5day').text(120);
                            $('#48hrs').text(170);
                            $('#24hrs').text(220);
                            $('#12hrs').text(320);
                        }else if(Service_val == 3){
                            $('#5day').text(150);
                            $('#48hrs').text(200);
                            $('#24hrs').text(250);
                            $('#12hrs').text(350);
                        }else{
                            $('#5day').text(200);
                            $('#48hrs').text(250);
                            $('#24hrs').text(280);
                            $('#12hrs').text(400);
                        }
                });

                $(document).on('click','#checlbtn',function(){
                    var Service_val = $('#services').val();
                    var words_val = $('#nowords').val();
                    var delivery = $('input[name="flexRadioDefault"]:checked').val();

                    if(Service_val = 1){ // Service 1 : Proof Reading and Editing
                        if(0 < words_val && words_val< 50 ){
                            $('#5day').text(100);
                            $('#48hrs').text(150);
                            $('#24hrs').text(200);
                            $('#12hrs').text(300);
                        }else if(50 < words_val && words_val< 100 ){
                            $('#5day').text(120);
                            $('#48hrs').text(170);
                            $('#24hrs').text(220);
                            $('#12hrs').text(320);
                        }else if(100 < words_val &&  words_val< 500 ){
                            $('#5day').text(150);
                            $('#48hrs').text(200);
                            $('#24hrs').text(250);
                            $('#12hrs').text(350);
                        }else{
                            $('#5day').text(200);
                            $('#48hrs').text(250);
                            $('#24hrs').text(280);
                            $('#12hrs').text(400);
                        }
                    }

                    //delivery values
                    if($('input[name="Paraphrasing"]').is(":checked")){
                        
                        var extra1 = $('input[name="Paraphrasing"]').val();
                    }
                    if($('input[name="Formatting"]').is(":checked")){
                        
                        var extra2 = $('input[name="Formatting"]').val();
                    }
                    if($('input[name="FlagReport"]').is(":checked")){
                        
                        var extra3 = $('input[name="FlagReport"]').val();
                    }
                    
                   
                    alert(extra1+'-'+extra2+'-'+extra3)
                    var total_amount =  extra1 + extra2 + extra3;
                    $('.total-val').text(total_amount);
                    //alert(Service_val +'-'+words_val+'-'+delivery+'-'+extra1+''+extra2+''+extra3); 
                });
            });
        </script>
    </body>
</html>