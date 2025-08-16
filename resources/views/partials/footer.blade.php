<footer id="footer" class="footer">
    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2>Kết nối với chúng tôi</h2>
                    <p>Đăng ký nhận ưu đãi đặc biệt, miễn phí vận chuyển, và những ưu đãi dành riêng cho bạn.</p>
                    <form action="{{ url('forms/newsletter') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="newsletter-form d-flex">
                            <input type="email" name="email" placeholder="Email của bạn" required>
                            <button type="submit">Đăng ký ngay</button>
                        </div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-main">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget footer-about">
                        <a href="{{ url('/') }}" class="logo">
                            <span class="sitename">ViStar</span>
                        </a>
                        <p>Cửa hàng Vistar chuyên cung cấp các thiết bị điện tử hiện đại, uy tín và chất lượng, đáp ứng nhu cầu học tập, làm việc và giải trí của mọi khách hàng.</p>
                        <div class="footer-contact mt-4">
                            <div class="contact-item">
                                <i class="bi bi-geo-alt"></i>
                                <span>Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</span>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-telephone"></i>
                                <span>0338.134.988</span>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-envelope"></i>
                                <span>vistar@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Mua sắm</h4>
                        <ul class="footer-links">
                            <li><a href="{{ url('category') }}">Sản phẩm mới</a></li>
                            <li><a href="{{ url('category') }}">Sản phẩm bán chạy</a></li>
                            <li><a href="{{ url('category') }}">Sản phẩm yêu thích</a></li>
                            <li><a href="{{ url('category') }}">Âm thanh</a></li>
                            <li><a href="{{ url('category') }}">Phụ kiện điện thoại</a></li>
                            <li><a href="{{ url('category') }}">Giảm giá</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Hỗ trợ khách hàng</h4>
                        <ul class="footer-links">
                            <li><a href="{{ url('support') }}">Trung tâm hỗ trợ</a></li>
                            <li><a href="{{ url('account') }}">Trạng thái đơn hàng</a></li>
                            <li><a href="{{ url('shipping-info') }}">Thông tin giao hàng</a></li>
                            <li><a href="{{ url('return-policy') }}">Đổi trả sản phẩm</a></li>
                            <li><a href="#">Tư vấn sản phẩm</a></li>
                            <li><a href="{{ url('contact') }}">Liên hệ với chúng tôi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Công ty</h4>
                        <ul class="footer-links">
                            <li><a href="{{ url('about') }}">Về chúng tôi</a></li>
                            <li><a href="{{ url('about') }}">Đội ngũ</a></li>
                            <li><a href="{{ url('about') }}">Đối tác</a></li>
                            <li><a href="{{ url('about') }}">Tiếp thị sản phẩm</a></li>
                            <li><a href="{{ url('about') }}">Trách nhiệm</a></li>
                            <li><a href="{{ url('about') }}">Hóa đơn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Tải ứng dụng của chúng tôi</h4>
                        <p>Mua sắm với ứng dụng của chúng tôi</p>
                        <div class="app-buttons">
                            <a href="#" class="app-btn">
                                <i class="bi bi-apple"></i>
                                <span>App Store</span>
                            </a>
                            <a href="#" class="app-btn">
                                <i class="bi bi-google-play"></i>
                                <span>Google Play</span>
                            </a>
                        </div>
                        <div class="social-links mt-4">
                            <h5>Theo dõi chúng tôi</h5>
                            <div class="social-icons">
                                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                                <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                                <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="payment-methods d-flex align-items-center justify-content-center">
                <span>Thanh toán:</span>
                <div class="payment-icons">
                    <i class="bi bi-credit-card" aria-label="Credit Card"></i>
                    <i class="bi bi-paypal" aria-label="PayPal"></i>
                    <i class="bi bi-apple" aria-label="Apple Pay"></i>
                    <i class="bi bi-google" aria-label="Google Pay"></i>
                    <i class="bi bi-shop" aria-label="Shop Pay"></i>
                    <i class="bi bi-cash" aria-label="Cash on Delivery"></i>
                </div>
            </div>
            <div class="legal-links">
                <a href="{{ url('tos') }}">Điều khoản dịch vụ</a>
                <a href="{{ url('privacy') }}">Chính sách bảo mậy</a>
                <a href="{{ url('tos') }}">Cài đặt cookie</a>
            </div>
            <div class="copyright text-center">
                <p>© <span>Copyright</span> <strong class="sitename">doantotnghiep_su25</strong>. All Rights Reserved.</p>
            </div>
            {{-- <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> --}}
        </div>
    </div>
</footer>