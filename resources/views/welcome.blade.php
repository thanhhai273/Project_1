@extends('layouts.app')

@section('content')
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>LINKET</title>
    <link rel="icon" type="image/x-icon" href="public/assets/linkicon.svg" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    </head>
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase"> LINK-ET</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Tạo trang Bio của bạn một cách miễn phí !</h2>
                    <a class="btn btn-primary" href="{{ route('register') }}">Đăng kí miễn phí!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="blog-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Đường dẫn duy nhất bạn cần</h2>
                        <p class="text-white-50">
                            Đường dẫn duy nhất mà bạn cần liên kết tới mọi mạng xã hội mà bạn sử dụng. Tạo mới tại
                            <a href="{{ url('/') }}">LinkET.</a>
                            Với LinkET, bạn có thể chứa bất kì thông tin nào trong một đường dẫn.
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/color.jpg" alt="..." />
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><video class="img-fluid mb-3 mb-lg-0" src="https://videos.ctfassets.net/lbsm39fugycf/1i6LctbRMzKsEmWCdbZWe8/3aecc0e1dd43fa2e291e9d6778c822ee/link_to_anywhere.mp4"  autoplay="autoplay" loop="loop" controls="controls" alt="everywhere" /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Sử dụng ở mọi nơi</h4>
                            <p class="text-black-50 mb-0">Bạn bè của bạn có thể sử dụng LinkET ở mọi nơi để có thể biết thêm thông tin về bạn</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-right">
                            <h4>Kết nối tới mọi ứng dụng</h4>
                            <p class="text-black-50 mb-0">Với LinkET bạn có thể kết nối tới mọi tài khoản mà bạn sử dụng</p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7"><video class="img-fluid-right mb-3 mb-lg-0" src="https://videos.ctfassets.net/lbsm39fugycf/7oDgvpqZimd2N3qRJ3FOmx/be9603d765dc8bedd0d57ae02dc50579/linktree-for-tiktok-hero-2.mp4"  autoplay="autoplay" loop="loop" controls="controls" alt="everytime" /></div>
                </div>
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><video class="img-fluid mb-3 mb-lg-0" src="https://videos.ctfassets.net/lbsm39fugycf/4jcMGgBbI0ZkJxn9Wqy3DK/61f26c5d0e317799c58e48cd484ce1e6/linktree-causes-landing-page-hero-1.mp4" autoplay="autoplay"  loop="loop" controls="controls" alt="easytomanage" /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Dễ dàng quản lí</h4>
                            <p class="text-black-50 mb-0">Bạn chỉ mất chút thời gian trong việc xây dựng liên kết cũng như thiết kế trang bio theo mong muốn</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>An toàn, tin cậy </h4>
                            <p class="text-black-50 mb-0">Với LinkET bạn không cần lo lắng về việc bảo mật tài khoản vì LinkET không theo dõi bất kì thông tin nào của bạn cũng như khách truy cập! </p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7"><video class="img-fluid-right mb-3 mb-lg-0" src="https://videos.ctfassets.net/lbsm39fugycf/5Z88UNk5vAFjxKxSePOS1g/b086910440ca7417d35674734b6ff360/website_security_8s.mp4" autoplay="autoplay" loop="loop" controls="controls" alt="safeandtrust" /></div>
                </div>
                
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Để nhận được thông tin mới nhất vui lòng nhập email của bạn</h2>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="emailAddress" type="email" placeholder="Vui lòng nhập Email..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                                <div class="col-auto"><button class="btn btn-primary " id="submitButton" type="submit">Xác nhận</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">Vui lòng nhập đúng email của bạn</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email không hợp lệ</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Thành công !</div>
                                    <br />
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Địa chỉ</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Hà Nội, Việt Nam</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">Thanhhai@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Điện thoại</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+84 393151810</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="https://www.facebook.com/phamthanhhai99/"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
@endsection