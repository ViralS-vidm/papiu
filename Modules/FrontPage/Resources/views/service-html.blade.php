@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="container">
            <div class="overView services">
                <div class="leftOver">
                    <h1>{{ __('frontpage::message.introduction_all_title') }}</h1>
                </div><!-- End .leftOver -->
                <div class="rightOver">
                    <span>Không chỉ bao gồm những dịch vụ cơ bản mà du khách được trải nghiệm trong quá trình tận hưởng kỳ nghỉ tại các khu nhà, P'apiu dành riêng cho du khách những gói dịch vụ đặc biệt khác như cầu hôn, lễ cưới, quà tặng người thân, tủ lưu giữ kỷ niệm hay xe đưa đón. P'apiu hy vọng các cặp đôi sẽ có thể bỏ quên không gian và thời gian, tận hưởng kỳ nghỉ hoàn hảo cùng những kỷ niệm tuyệt vời khó quên. </span>
                </div><!-- End .rightOver -->
            </div><!-- End .overView -->
            <div class="foodSlide services">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
    {{--                        <div class="contentText_slide">--}}
    {{--                            <span>Food</span>--}}
    {{--                        </div>--}}
                        </li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1">
    {{--                        <div class="contentText_slide">--}}
    {{--                            <span>Travel</span>--}}
    {{--                        </div>--}}
                        </li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2">
    {{--                        <div class="contentText_slide">--}}
    {{--                            <span>Bussiness</span>--}}
    {{--                        </div>--}}
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ theme_url('images/food.png') }}" class="d-block w-100" alt="" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ theme_url('images/food.png') }}" class="d-block w-100" alt="" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ theme_url('images/food.png') }}" class="d-block w-100" alt="" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('components.services')
        @include('components.order_now')
        <div class="optionHome">
            <div class="container">
                <div class="content_home">
                    <div class="titleCategory">
                        @include('components.breadcrumb')
                    </div><!-- End .titleCategory -->
                    <ul class="nav nav-tabs category_option servicesed" role="tablist">
                        <li role="presentation" class="active"><a href="#propose" aria-controls="propose" role="tab" data-toggle="tab">{{ __('frontpage::message.service_propose_title') }}</a></li>
                        <li role="presentation"><a href="#married" aria-controls="married" role="tab" data-toggle="tab">{{ __('frontpage::message.service_married_title') }}</a></li>
                        <li role="presentation"><a href="#honeymoon" aria-controls="honeymoon" role="tab" data-toggle="tab">{{ __('frontpage::message.honeymoon_package_title') }}</a></li>
                        <li role="presentation"><a href="#gift" aria-controls="gift" role="tab" data-toggle="tab">{{ __('frontpage::message.gift_title') }}</a></li>
                        <li role="presentation"><a href="#souvenir" aria-controls="souvenir" role="tab" data-toggle="tab">{{ __('frontpage::message.souvenir_title') }}</a></li>
                        <li role="presentation"><a href="#shuttle" aria-controls="shuttle" role="tab" data-toggle="tab">{{ __('frontpage::message.car_shuttle_title') }}</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content categorySlide">
                        <div role="tabpanel" class="tab-pane active" id="propose">
                            @include('components.slide_detail')
                            <div class="overView">
                                <div class="leftOver">
                                    <h1>{{ __('frontpage::message.service_propose_title') }}</h1>
                                </div><!-- End .leftOver -->
                            </div><!-- End .overView -->
                            <div class="infomation_servies">
                                <ul class="content_detail">
                                    <li>
                                        <p>
                                            Với không gian lãng mạn và cách bày trí đặc biệt, mang lại cả giác thăng hoa và riêng tư đặc biệt của lứa đôi P'apiu tin rằng, cô dâu tương lai của bạn sẽ rất bất ngờ và xúc động.
                                            Dịch vụ cầu hôn có giá <strong>10.000.000</strong> bao gồm:
                                        </p>
                                        <p>
                                            Trao đổi, tìm hiểu thông tin (câu chuyện tình yêu, ngày kỉ niệm, sở thích của cả hai nhân vật chính)
                                            Tư vấn nội dung, ý tưởng cầu hôn.
                                            Trang trí không gian ấm cúng & lãng mạn với nến, hoa, bong bóng xung quanh khu vực cầu hôn
                                            Âm nhạc phù hợp
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Một tấm thiệp bằng form có tên hai người và trên tấm thiệp dán những tấm hình kỉ niệm đã chụp chung trong suốt thời gian quen nhau
                                            ( kích thước thiệp cao 70cm)
                                            <br>
                                            Bảng chữ PP dán form có 4 người cầm:
                                            “ Làm vợ anh nhé/ làm người yêu anh nhé/ Will you marry me/ I Love you”
                                            <br>
                                            Hoa cầu hôn
                                            <br>
                                            Rượu vang, bánh
                                            <br>
                                            Chụp ảnh phóng sự ghi lại khoảnh khắc ngọt ngào của 2 nhân vật chính
                                            <br>
                                            Quà tặng cho cặp đôi
                                        </p>
                                    </li>
                                </ul>
                                <button type="button" class="btn-primary-book">{{ __('frontpage::message.booking_services_title') }}</button>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="married">
                            <div class="imgHome">
                                <img src="{{ theme_url('images/img_married.png') }}" alt="" />
                            </div>
                            <div class="overView">
                                <div class="leftOver">
                                    <h1>{{ __('frontpage::message.service_married_title') }}</h1>
                                </div><!-- End .leftOver -->
                            </div><!-- End .overView -->
                            <div class="infomation_servies">
                                <ul class="content_detail">
                                    <li>
                                        <p>
                                            Không cần ồn ào hay vội vã, tình yêu là những gì ấm áp và chân thành nhất. P'apiu tĩnh lặng và nên thơ là nơi lý tưởng để tổ chức lễ cưới với không gian lãng mạn, thăng hoa, chỉ có cô dâu chú rể cùng những khách mời đặc biệt theo nghi lễ truyền thống của người Dao, chi phí từ 500.000.000, bao gồm:
                                        </p>
                                        <p>
                                            Trao đổi, tìm hiểu thông tin (câu chuyện tình yêu, ngày kỉ niệm, sở thích của cả hai nhân vật chính).
                                            Tư vấn nội dung, ý tưởng kịch bản cưới.
                                            Lưu trú 3 ngày 2 đêm cho tối đa 20 khách mời;
                                            Phục vụ ăn 3 bữa/ ngày ( trong đó có 1 tiệc cưới)
                                            Tổ chức tiệc cưới ( tiệc BBQ/ chọn món theo Menu hoặc yêu cầu từ khách hàng)
                                            Tổ chức chơi trò chơi dân gian tập thể
                                            Hoạt động đốt lửa ngoài trời buổi tối (Mùa đông)
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Tổ chức từ thiện tại bản Mông
                                            )
                                            <br>
                                            Thăm quan Cao Nguyên đá
                                            <br>
                                            Thực hiện bộ ảnh ngoài trời / phóng sự cưới
                                            <br>
                                            Backdrop
                                            <br>
                                            Trang điểm cô dâu, chú rể
                                            <br>
                                            Hoa cầm tay, hoa cài áo, hoa trang trí
                                            <br>
                                            Trưởng bản người Dao thực hiện các nghi thức cưới theo phong tục
                                            <br>
                                            Tặng kèm bộ trang phục cưới của người Giao
                                            ( bao gồm trang sức)
                                            <br>
                                            Trang điểm cô dâu, chú rể
                                            <br>
                                            Âm nhạc đặc trưng của người dân tộc
                                            <br>
                                            Quà tặng cho Cô dâu chú rể và khách mời với nhiều lựa chọn
                                            <br>
                                            Xe đưa 2 chiều < 300km toàn bộ khách
                                            ( đón tại 1 điểm)
                                        </p>
                                    </li>
                                </ul>
                                <button type="button" class="btn-primary-book">{{ __('frontpage::message.form_signup_title') }}</button>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="honeymoon">
                            <div class="imgHome">
                                <img src="{{ theme_url('images/nhaham.png') }}" alt="" />
                            </div>
                            <div class="overView">
                                <div class="leftOver">
                                    <h1>{{ __('frontpage::message.honeymoon_package_title') }}</h1>
                                </div><!-- End .leftOver -->
                            </div><!-- End .overView -->
                            <div class="infomation_servies">
                            <ul class="content_detail">
                                <li>
                                    <p>
                                        Nằm ẩn mình giữa non nút Hà Giang hùng vĩ và nguyên sơ, P'apiu là nơi lý tưởng để các cặp đôi tận hưởng tuần trăng mật ý nghĩa và ngọt ngào với không gian riêng tư đặc biệt có một không hai.
                                        Gói trăng mật tại P'apiu có giá từ 55.000.0000 với đầy đủ các dịch vụ:
                                    </p>
                                    <p>
                                        Nhà hàng: phục vụ 5 bữa/ ngày; 24/7 tại phòng, vườn rau hoặc các không gian theo yêu cầu từ khách hàng
                                        <br>
                                        Khách hàng sẽ được thưởng thức bữa ăn đặc biệt được đầu bếp của Papiu thực hiện dành riêng cho tuần trăng mật
                                        <br>
                                        Mini bar
                                        <br>
                                        Nghỉ 4 ngày 3 đêm
                                        <br>
                                        Giặt là
                                        <br>
                                        Trang trí phòng ngủ
                                        <br>
                                        Ngủ ngoài trời với trăng sao tại Yolo mount
                                        <br>
                                        Xem Phim ngoài trời
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Kính thiên văn ngắm sao đêm
                                        <br>
                                        Ống nhòm ngắm cảnh
                                        <br>
                                        Xông hơi khô
                                        <br>
                                        Tắm lá thơm
                                        <br>
                                        Tắm bể sục treo ngoài trời
                                        <br>
                                        Massage chân
                                        <br>
                                        Quà tặng Papiu
                                        <br>
                                        Lưu giữ kỷ niệm trong lòng đất tại Layla Qays
                                        <br>
                                        Tham quan con đường thổ cẩm
                                        <br>
                                        Thăm quan khu trưng bày vẽ tranh vùng cao
                                        <br>
                                        Đi bộ trong rừng
                                        <br>
                                        Thực hiện ảnh ngoài trời hoặc tour thăm quan trải nghiệm bản
                                        <br>
                                        Zipline
                                        <br>
                                        Phòng thể thao giải trí trong nhà
                                        <br>
                                        Chơi trò chơi dân gian với người bản địa (Ném còn, cầu mây, kéo co…)
                                        <br>
                                        Internet có dây/Wifi miễn phí
                                        <br>
                                        Đồ ăn nhẹ mang theo xe
                                    </p>
                                </li>
                            </ul>
                            <button type="button" class="btn-primary-book">{{ __('frontpage::message.form_signup_title') }}</button>
                        </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="gift">
                            <div class="imgHome">
                                <img src="{{ theme_url('images/nhaham.png') }}" alt="" />
                            </div>
                            <div class="overView">
                                <div class="leftOver">
                                    <h1 class="gift">{{ __('frontpage::message.gift_title') }}</h1>
                                </div><!-- End .leftOver -->
                                <div class="rightOver">
                                    <span>Không chỉ là nơi để các cặp đôi có thể bỏ quên thời gian, tận hưởng không gian lãng mạn, thăng hoa và riêng tư đặc biệt. P'apiu cho phép du khách đặt trước quà tặng người thân với chi phí từ 20 triệu, giúp du khách có thể mang hơi thở của Hà Giang, đặc trưng của P'apiu dành tặng người thân, bạn bè!</span>
                                    <button type="button" class="btn-primary-book">{{ __('frontpage::message.form_signup_title') }}</button>
                                </div><!-- End .rightOver -->
                            </div><!-- End .overView -->
                        </div>
                        </div>
                    </div>
                </div><!-- End .content_home -->
            </div>
        </div><!-- End .optionHome -->
    </div><!-- End .main -->
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/category.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/services.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ theme_url('css/detail.css') }}">
@endsection
