<?php
session_start();
?>
<!doctype html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chill Coffee</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
    rel="stylesheet" />
  <style>
    html {
      user-select: none;
      scroll-behavior: smooth;
    }

    body {
      width: 100%;
      height: 100%;
      position: relative;
      font-family: "montserrat", serif;
      margin: auto;
      transition: all 0.3s;
    }

    .head a {
      text-decoration: none;
      color: rgb(255, 255, 255);
      opacity: 1;
    }

    .head a:hover {
      transition: all 0.4s;
      opacity: 0.5;
    }

    .head {
      width: 100%;
      height: 60px;
      position: absolute;
      background-color: rgba(0, 0, 0, 0.3);
      z-index: 10;
      top: 0;
      display: flex;
      font-size: 13px;
      align-items: center;
      justify-content: right;
      gap: 30px;
    }

    #menu-icon.active div:nth-child(1) {
      transform: translateY(-3px);
      transition: all 0.4s;
    }

    #menu-icon.active div:nth-child(2) {
      transform: translateY(-3px);
      transition: all 0.4s;
    }

    #menu-icon {
      position: relative;
      width: 40px;
      height: 40px;
      cursor: pointer;
      margin-right: 5%;
      margin-left: 5%;
    }

    .cup {
      background-color: rgb(219, 218, 218);
      width: 25px;
      height: 25px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      position: absolute;
      top: 12%;
      transition: all 0.4s;
      box-shadow: inset 3px -3px 5px rgba(0, 0, 0, 0.5);
      z-index: 2;
    }

    .cup:hover {
      transition: all 0.4s;
      box-shadow: inset -3px 3px 5px rgba(0, 0, 0, 0.5);
    }

    .handle {
      width: 20px;
      height: 20px;
      background: transparent;
      border-radius: 50%;
      border: 5px solid rgb(219, 218, 218);
      position: absolute;
      left: 36%;
      top: 6px;
      transition: all 0.4s;
    }

    .stand {
      background-color: rgb(219, 218, 218);
      width: 27px;
      height: 5px;
      border-radius: 40px;
      margin-top: 3px;
      position: absolute;
      top: 28px;
    }

    .popup_menu.action {
      position: fixed;
      transition: 0.4s ease-in-out;
      right: 0;
      z-index: 1000;
    }

    .popup_menu {
      position: fixed;
      font-family: "Montserrat", sans-serif;
      top: 15%;
      right: -260px;
      width: 220px;
      max-height: 80%;
      max-height: 500px;
      padding: 40px 20px;
      display: flex;
      flex-direction: column;
      transition: 0.4s ease-in-out;
      z-index: 2000;
      text-align: center;
      border-radius: 20px;
      gap: 80px;
      box-shadow: 0px 0px 30px black;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }

    .popup_menu a {
      text-decoration: none;
      color: black;
    }

    .popup_menu a:hover {
      transition: all 0.3s;
      opacity: 0.5;
    }

    .banner_text {
      width: 500px;
      height: 400px;
      color: white;
      margin-left: auto;
      margin-right: auto;
      justify-content: center;
      align-items: center;
      display: flex;
      text-align: center;
      text-wrap: nowrap;
      flex-direction: column;
    }

    .banner_text h1 {
      font-size: 50px;
      margin-top: 40%;
    }

    .banner_text button {
      width: 120px;
      min-height: 40px;
      border-radius: 15px;
      background-color: transparent;
      color: white;
      transition: all 0.4s;
      outline: none;
      border: 1px solid white;
      font-weight: bold;
      cursor: pointer;
    }

    .banner_text button:hover {
      background-color: white;
      color: black;
      transition: all 0.4s;
    }

    .hero {
      background-image: url("picture/banner-img.jpeg");
      background-size: cover;
      max-width: 100%;
      height: 800px;
    }

    * {
      box-sizing: border-box;
      transition: all 0.4s;
    }

    body {
      margin: 0;
      background: #f6f6f6;
      color: #111;
    }

    .product-section {
      max-width: 1200px;
      margin: 60px auto;
      display: grid;
      grid-template-columns: 260px 1fr;
      gap: 30px;
      padding: 0 20px;
    }

    .filter-box {
      background: #fff;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      height: fit-content;
    }

    .filter-box h3 {
      margin: 0 0 20px;
      font-size: 20px;
    }

    .filter-group {
      margin-bottom: 22px;
    }

    .filter-group label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .filter-box input[type="text"],
    .filter-box select {
      width: 100%;
      padding: 10px 12px;
      border-radius: 10px;
      border: 1px solid #ddd;
      outline: none;
    }

    .filter-box input[type="checkbox"] {
      margin-right: 8px;
    }

    .filter-option {
      margin-bottom: 8px;
      font-size: 14px;
    }

    .product-area {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 24px;
    }

    .product-card {
      background: #fff;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
      transition: 0.35s;
    }

    .product-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .product-info {
      padding: 16px;
    }

    .product-info h4 {
      margin: 0 0 6px;
    }

    .product-info p {
      margin: 0;
      color: #666;
      font-size: 14px;
    }

    .product-info .price {
      margin-top: 10px;
      font-weight: 700;
    }

    @media (max-width: 900px) {
      .product-section {
        grid-template-columns: 1fr;
      }
    }

    .footer {
      background: #0f0f0f;
      color: #eaeaea;
      padding: 70px 20px 30px;
    }

    .footer-container {
      max-width: 1200px;
      margin: auto;
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 40px;
    }

    .footer-brand h2 {
      font-size: 28px;
      margin: 0 0 12px;
      letter-spacing: 1px;
    }

    .footer-brand p {
      color: #aaa;
      font-size: 14px;
      line-height: 1.7;
    }

    .footer-col h4 {
      margin-bottom: 16px;
      font-size: 16px;
      position: relative;
    }

    .footer-col h4::after {
      content: "";
      width: 30px;
      height: 2px;
      background: #c7a17a;
      position: absolute;
      left: 0;
      bottom: -6px;
    }

    .footer-col ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-col ul li {
      margin-bottom: 10px;
    }

    .footer-col ul li a {
      color: #aaa;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .footer-col ul li a:hover {
      color: #fff;
      padding-left: 6px;
    }

    .footer-social {
      display: flex;
      gap: 12px;
      margin-top: 16px;
    }

    .footer-social a {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: 1px solid #333;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }

    .footer-social a:hover {
      background: #c7a17a;
      border-color: #c7a17a;
    }

    .footer-bottom {
      border-top: 1px solid #222;
      margin-top: 50px;
      padding-top: 20px;
      text-align: center;
      font-size: 13px;
      color: #777;
    }

    @media (max-width: 900px) {
      .footer-container {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 520px) {
      .footer-container {
        grid-template-columns: 1fr;
      }
    }

    .buy-btn {
      background-color: burlywood;
      color: black;
      font-family: 'montserrat', serif;
      font-size: 15px;
      border-collapse: collapse;
      border: 1px solid black;
      width: 80px;
      height: 30px;
      cursor: pointer;
      border-radius: 7px;
      margin-left: 0;
      transition: all .4s;
      transform: translateY(200%);
    }

    .buy-btn:hover {
      background-color: rgb(232, 185, 124);
      color: rgb(0, 0, 0);
      scale: 1.1;
    }

    .checkout-section {
      background-color: #fdfaf5;
      padding: 50px 0;
      font-family: 'Arial', sans-serif;
      color: #332d2d;
    }

    .checkout-container {
      display: flex;
      max-width: 1300px;
      margin: 0 auto;
      gap: 40px;
      padding: 0 20px;
    }

    .order-summary-aside {
      flex: 0 0 350px;
    }

    .summary-sticky {
      position: sticky;
      top: 20px;
      background: #ffffff;
      border: 1px solid #e8e2d6;
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
    }

    .aside-title {
      margin-top: 0;
      border-bottom: 2px solid #f1c40f;
      padding-bottom: 10px;
      font-size: 1.2rem;
    }

    .info-group {
      margin-bottom: 15px;
    }

    .info-group label {
      display: block;
      font-size: 0.9rem;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .info-group textarea,
    .info-group input,
    .info-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #fafafa;
      box-sizing: border-box;
    }

    .total-price-box {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px 0;
      padding: 15px 0;
      border-top: 1px dashed #ccc;
    }

    .total-price-box strong {
      font-size: 1.4rem;
      color: #d35400;
    }

    .btn-main-pay {
      width: 100%;
      background: #d35400;
      color: white;
      border: none;
      padding: 15px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      margin-bottom: 10px;
    }

    .btn-buy-more {
      width: 100%;
      background: transparent;
      color: #666;
      border: 1px solid #999;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
    }

    .cart-content-main {
      flex: 1;
    }

    .section-title {
      font-size: 1.5rem;
      margin-bottom: 25px;
    }

    .items-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
    }

    .food-card {
      background: #fff;
      padding: 15px;
      border-radius: 12px;
      text-align: center;
      transition: transform 0.2s;
    }

    .food-card:hover {
      transform: translateY(-5px);
    }

    .img-placeholder {
      width: 100%;
      height: 150px;
      background: #eee;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #888;
      margin-bottom: 15px;
    }

    .food-info h4 {
      margin: 10px 0 5px;
      font-size: 1.1rem;
    }

    .food-info p {
      color: #d35400;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .qty-control {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 15px;
    }

    .qty-control button {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      border: 1px solid #ddd;
      background: white;
      cursor: pointer;
    }

    .btn-add-quick {
      background: #27ae60;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 20px;
      font-size: 0.8rem;
      cursor: pointer;
    }

    .btn-add-quick:hover {
      transition: .4s;
      scale: 1.1;
    }

    @media (max-width: 900px) {
      .checkout-container {
        flex-direction: column;
      }

      .order-summary-aside {
        flex: none;
        width: 100%;
      }
    }

    .logo {
      width: 60px;
      height: 60px;
      position: absolute;
      left: 2%;
      overflow: hidden;

    }

    .logo img {
      background-position: center;
      border-radius: 50%;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    #btn-view-products {
      width: 130px;
      min-height: 40px;
      border-radius: 15px;
      background-color: transparent;
      color: white;
      transition: all 0.4s;
      outline: none;
      border: 1px solid white;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #btn-view-products:hover {
      background-color: white;
      color: black;
      transition: all 0.4s;
    }
  </style>
</head>

<body>
  <section class="hero">
    <div class="head">
      <div class="logo">
        <img src="picture/logo.PNG">
      </div>
      <a href="index.php">Trang Chủ</a>
      <a href="#">Giới Thiệu</a>
      <a href="#">Đánh Giá</a>
      <div id="menu-icon" onclick="mo()">
        <div class="cup"></div>
        <div class="handle"></div>
        <div class="stand"></div>
      </div>
    </div>
    <div class="popup_menu" id="popup_menu">
      <a href="index.html" class="trangchu2" style="text-decoration: none">Trang Chủ
      </a>

      <a href="#" class="gioithieu2" style="text-decoration: none">Giới Thiệu</a>

      <a href="#" class="danhgia2" style="text-decoration: none">Đánh Giá</a>

      <a href="#" class="giohang2" style="text-decoration: none">Giỏ Hàng</a>

      <form action="/GRADUATION-PROJECT/dk_dn/createdatabase.php" method="post">
        <?php if (isset($_SESSION['username'])): ?>
          <div class="menu-op-section">
            👤Welcome, <?= htmlspecialchars($_SESSION['username']) ?>
          </div>
          <div class="menu-op-section">
            <a href="/Graduation-Project/dk_dn/logout.php">Đăng xuất</a>
          </div>
        <?php else: ?>
          <div class="menu-op-section">
            <input style="background-color: transparent; border: none; font-weight: bold; font-size: 17px;" type="submit" value="Tài khoản">
          </div>
        <?php endif; ?>
      </form>
    </div>
    <div class="banner_text">
      <h1>
        Mang đến trải nghiệm chân thật <br />
        trong từng khoảnh khắc
      </h1>
      <p>Cho bạn cảm giác mê ly khi trải nghiệm</p>
      <a id="btn-view-products" href="#checkout-section">Xem Giỏ Hàng</a>
    </div>
  </section>
  <section class="checkout-section" id="checkout-section">
    <div class="checkout-container">

      <aside class="order-summary-aside">
        <div class="summary-sticky">
          <h3 class="aside-title">Thông tin đơn hàng</h3>

          <div class="info-group">
            <label>Địa chỉ giao hàng</label>
            <textarea placeholder="Nhập địa chỉ của bạn..."></textarea>
          </div>

          <div class="info-group">
            <label>Thông tin liên lạc</label>
            <input type="text" placeholder="Số điện thoại">
          </div>

          <div class="info-group">
            <label>Phương thức thanh toán</label>
            <select>
              <option>Tiền mặt khi nhận hàng</option>
              <option>Chuyển khoản ngân hàng</option>
              <option>Ví điện tử (Momo/ZaloPay)</option>
            </select>
          </div>

          <div class="total-price-box">
            <span>Tổng tiền:</span>
            <strong>125.000đ</strong>
          </div>

          <div class="aside-buttons">
            <button class="btn-main-pay">XÁC NHẬN THANH TOÁN</button>
            <button class="btn-buy-more">TIẾP TỤC MUA THÊM</button>
          </div>
        </div>
      </aside>

      <main class="cart-content-main">
        <h2 class="section-title">Sản phẩm đã chọn</h2>

        <div class="items-grid">
          <div class="food-card">
            <div class="img-placeholder"> [ICON/IMG TẠI ĐÂY] </div>
            <div class="food-info">
              <h4>Cà Phê Muối</h4>
              <p>45.000đ</p>
              <div class="qty-control">
                <button>-</button><span>01</span><button>+</button>
              </div>
            </div>
          </div>
          <div class="food-card">
            <div class="img-placeholder"> [ICON/IMG TẠI ĐÂY] </div>
            <div class="food-info">
              <h4>Espresso Đá</h4>
              <p>35.000đ</p>
              <div class="qty-control">
                <button>-</button><span>02</span><button>+</button>
              </div>
            </div>
          </div>
          <div class="food-card">
            <div class="img-placeholder"> [ICON/IMG TẠI ĐÂY] </div>
            <div class="food-info">
              <h4>Latte nóng</h4>
              <p>45.000đ</p>
              <div class="qty-control">
                <button>-</button><span>01</span><button>+</button>
              </div>
            </div>
          </div>
          <div class="food-card">
            <div class="img-placeholder"> [ICON/IMG TẠI ĐÂY] </div>
            <div class="food-info">
              <h4>Trà Đào Cam Sả</h4>
              <p>40.000đ</p>
              <div class="qty-control">
                <button>-</button><span>01</span><button>+</button>
              </div>
            </div>
          </div>
        </div>

        <h2 class="section-title" style="margin-top: 50px;">Gợi ý món kèm</h2>
        <div class="items-grid">
          <div class="food-card suggestion">
            <div class="img-placeholder"> [ICON/IMG TẠI ĐÂY] </div>
            <div class="food-info">
              <h4>Bánh Sừng Bò</h4>
              <p>25.000đ</p>
              <button class="btn-add-quick">+ Thêm món</button>
            </div>
          </div>
          <div class="food-card suggestion">
            <div class="img-placeholder"> [ICON/IMG TẠI ĐÂY] </div>
            <div class="food-info">
              <h4>Donut Socola</h4>
              <p>20.000đ</p>
              <button class="btn-add-quick">+ Thêm món</button>
            </div>
          </div>
        </div>
      </main>

    </div>
  </section>
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-brand">
        <h2>CHILL COFFEE</h2>
        <p>
          Chill Coffee mang đến trải nghiệm cà phê nguyên bản, không gian thư
          giãn và hương vị được chọn lọc kỹ lưỡng.
        </p>
        <div class="footer-social">
          <a href="#">F</a>
          <a href="#">I</a>
          <a href="#">Y</a>
        </div>
      </div>

      <div class="footer-col">
        <h4>Sản phẩm</h4>
        <ul>
          <li><a href="#">Cà phê truyền thống</a></li>
          <li><a href="#">Cold Brew</a></li>
          <li><a href="#">Signature Drinks</a></li>
          <li><a href="#">Hạt rang xay</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Về chúng tôi</h4>
        <ul>
          <li><a href="#">Câu chuyện thương hiệu</a></li>
          <li><a href="#">Cửa hàng</a></li>
          <li><a href="#">Tuyển dụng</a></li>
          <li><a href="#">Liên hệ</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Hỗ trợ</h4>
        <ul>
          <li><a href="#">Chính sách mua hàng</a></li>
          <li><a href="#">Giao hàng</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">© 2025 Chill Coffee. All rights reserved.</div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@formkit/auto-animate/index.min.js"></script>
  <script>
    const popupMenu = document.querySelector(".popup_menu");
    const menuIcon = document.getElementById("menu-icon");
    const vungCha = document.querySelector('.luoi-san-pham');
    autoAnimate(vungCha);

    menuIcon.addEventListener("click", () => {
      menuIcon.classList.toggle("active");
    });
    menuIcon.addEventListener("click", () => {
      document.getElementById("popup_menu").classList.toggle("action");
    });

    document
      .getElementById("btn-view-products")
      .addEventListener("click", () => {
        document.querySelector(".checkout-section").scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      });

    const head = document.querySelector(".head");
    const observe = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          head.style.position = "fixed";
          head.style.transition = "all .4s";
          head.style.top = "0";
        }
      });

    }, {
      threshold: 0.1
    });
    observe.observe(document.querySelector("#menu"));

    const observe2 = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) {
          head.style.top = "-100px";
        }
      });

    }, {
      threshold: 0.1
    });
    observe2.observe(document.querySelector(".head"));
  </script>
</body>

</html>