<!DOCTYPE html>
<html lang="ru-RU">

<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta charset="UTF-8" />
  <title>POSIE CITY ROLE PLAY</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link href="css/animate.min.css" rel="stylesheet" />
  <link href="css/reset.css" rel="stylesheet" />
  <link href="css/style.css?time=2" rel="stylesheet" />
  <link href="css/responsive.v3.css" rel="stylesheet" />


</head>

<body>
  <div class="modal-window successRegistration" id="successRegistration">
    <div class="modal-box no-bg">
      <p class="modal-box-header">
        Bạn đã đăng ký thành công<br /><span>Chúng tôi đang chờ bạn trong trò chơi!</span>
      </p>
      <div class="modal-box-buttons">
        <a href="#" class="button-modal-box">XÁC NHẬN</a>
      </div>
    </div>
  </div>
  <div class="modal-window successDonate" id="successDonate">
    <div class="modal-box no-bg" style="transform: skewY(0deg)">
      <p class="modal-box-header">
        QUÉT MÃ QR ĐỂ THANH TOÁN<br />
        <img id="qr_donate" style="margin-bottom: 15px">
        <span class="modal-small-header">Sau khi thanh toán thành công. Nhấp vào nút "Kiểm tra giao dịch"
          tại cửa hàng nếu bạn đang trong
          trò chơi.
        </span>
      </p>
      <div class="modal-box-buttons">
        <a href="#" class="button-modal-box">XÁC NHẬN</a>
      </div>
    </div>
  </div>
  <div class="modal-window question" id="question">
    <div class="modal-box">
      <a href="#" class="modal-box-close" onclick="$('#question').attr('style','')"></a>
      <p class="modal-box-header">
        Tham gia<br />trò chơi<span>Bạn đã có GTA 5 Bản quyền chưa?</span>
      </p>
      <div class="modal-box-buttons">
        <a href="#registration" class="button-modal-box small">ĐÃ CÓ</a>
        <a href="https://store.steampowered.com/app/271590/Grand_Theft_Auto_V/" class="button-modal-box small red"
          target="_blank">CHƯA CÓ</a>
      </div>
    </div>
  </div>
  <div class="modal-window register" id="registration">
    <div class="modal-box">
      <a href="#" class="modal-box-close"></a>
      <p class="modal-box-header">
        Đăng ký<span>Tài khoản trò chơi</span>
      </p>
      <form method="post" id="registrationForm">
        <div class="modal-box-content">
          <!-- <div class="modal-box-input">
            <div class="modal-box-change-server">
              <p>Chọn máy chủ</p>
              <div>
                <input class="radio-server" name="server" type="radio" value="one_reg" id="one_reg" />
                <label for="one_reg"><img src="images/svg/one1.svg" /></label>
                <input class="radio-server" name="server" type="radio" value="two_reg" id="two_reg" />
                <label for="two_reg"><img src="images/svg/two1.svg" /></label>
              </div>
            </div>
          </div> -->
          <input type="text" class="modal-box-input" placeholder="Tên nhân vật (Ví dụ: Long)" name="firstName" required />
          <input type="text" class="modal-box-input" placeholder="Họ nhân vật (Ví dụ: Nguyễn)" name="lastName" required />
          <input type="email" class="modal-box-input" placeholder="Email đăng nhập" name="email" required />
          <input type="text" class="modal-box-input" placeholder="Mật khẩu" name="password" required />
          <input type="text" class="modal-box-input" placeholder="Xác nhận mật khẩu" name="repeatPassword" required />
          <input type="text" class="modal-box-input" placeholder="Mã giới thiệu (nếu có)" name="refCode" />
          <label for="username" name="captcha" required></label>
          <div class="g-recaptcha" data-sitekey="6LdKT5gqAAAAAOXNsc56ywIKg6ceav2FfgkK_bAN"></div>
        </div>
        <div class="modal-box-buttons">
          <button class="button-modal-box" type="submit">
            ĐĂNG KÝ
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-window donate" id="donate">
    <div class="modal-box">
      <a href="#" class="modal-box-close"></a>
      <form method="post" id="donateForm">
        <p class="modal-box-header">Nạp Coin<span>vào tài khoản</span></p>
        <div class="modal-box-content">
          <!-- <div class="modal-box-input">
            <div class="modal-box-change-server">
              <p>CHỌN MÁY CHỦ</p>
              <div>
                <input class="radio-server" name="server" type="radio" value="one_donate" id="one_donate" />
                <label for="one_donate"><img src="images/svg/one1.svg" /></label>
                <input class="radio-server" name="server" type="radio" value="two_donate" id="two_donate" />
                <label for="two_donate"><img src="images/svg/two1.svg" /></label>
              </div>
            </div>
          </div> -->
          <input type="text" class="modal-box-input" placeholder="ID NHÂN VẬT" name="donate_id" required />
          <input type="text" class="modal-box-input" placeholder="SỐ COIN MUỐN NẠP (1 COIN = 10K VND)" name="donate_value"
            required />
        </div>
        <div class="modal-box-buttons">
          <button class="button-modal-box" type="submit">XÁC NHẬN</button>
        </div>
      </form>
    </div>
  </div>
  <header>
    <div class="topline">
      <div class="container">
        <div class="topline-wrap">
          <a href="#" class="logo-wrap">
            <div class="logo">
              <img src="images/logo.png" alt="" />
            </div>
            <p class="desc">
              DỰ ÁN MÁY CHỦ<br />GTA 5 <span>NHẬP VAI</span>
            </p>
          </a>
          <ul class="header-menu">
            <li class="active"><a href="index.html">TRANG CHỦ</a></li>
            <li><a href="#staps">THAM GIA NGAY</a></li>
            <li>
              <a href="#donate"><i class="donate"></i>NẠP COIN</a>
            </li>
            <li>
              <a href="https://discord.gg/posie" target="_blank"><i class="discord"></i>DISCORD</a>
            </li>
            <li>
              <a href="https://www.youtube.com/@Posie-Rp" target="_blank"><i class="youtube"></i>Youtube</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <i class="girl-header"></i>
    <div class="container">
      <div class="info-server">
        <p>GTA 5 NHẬP VAI ĐỜI SỐNG THẬT</p>
        <p class="small">
          POSIE RP không có hạn chế và cho phép bạn toàn quyền kiểm soát
          thế giới. Giới hạn duy nhất là trí tưởng tượng của bạn!
        </p>
        <div class="quality-server">
          <div>
            9+ <span>tổ chức<br />và băng đảng</span>
          </div>
          <div>
            99+ <span>tính năng<br />hoạt động</span>
          </div>
          <div>
            100% <span>tự do<br />sáng tạo</span>
          </div>
        </div>
        <div class="buttons-info-server">
          <a href="#question" class="main-button">đăng ký tài khoản<span>Sẽ mất không quá 5 phút</span></a>
          <a href="https://www.youtube.com/@Posie-Rp" class="main-button youtube" target="_blank">
            <div>về chúng tôi<span>xem ngay</span></div>
          </a>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div class="game-servers">
      <div class="container small">
        <div class="header-text">
          <p>MÁY CHỦ <span class="big">CHƠI GAME</span></p>
        </div>
        <div class="server one">
          <p>Máy chủ<br />POSIE</p>
          <a class="main-button copy">KẾT NỐI</a>
          <div class="online">online <span>ĐANG CẬP NHẬT</span></div>
        </div>
        <div class="server two">
          <p>Máy chủ<br />POSIE DEV</p>
          <a class="main-button copy">KẾT NỐI</a>
          <div class="online">online <span>ĐANG CẬP NHẬT</span></div>
        </div>
      </div>
    </div>
    <div class="how-start-game">
      <div class="container small staps" id="staps">
        <p class="title">Làm sao để tham gia<span>???????</span></p>
        <div class="guide-staps">
          <div class="stap-1">
            <i class="lines-stap-1"></i>
            <span>BƯỚC 1</span>
            <p class="title-stap">MUA GAME<br />GTA V<br />BẢN QUYỀN</p>
            <p class="description-stap">
              Nếu đã có game, vui lòng chuyển sang bước tiếp theo
            </p>
            <a href="https://store.steampowered.com/app/271590/Grand_Theft_Auto_V/" class="main-button guide steam"
              target="_blank">Mua game GTA 5</a>
          </div>
          <div class="stap-2">
            <i class="lines-stap-2"></i>
            <span>BƯỚC 2</span>
            <p class="title-stap">Cài đặt<br />và khởi chạy<br />FIVEM</p>
            <a href="https://content.cfx.re/mirrors/client_download/FiveM.exe" class="main-button guide ragemp">TẢI VỀ
              FIVEM</a>
          </div>
          <div class="stap-3">
            <span>BƯỚC 3</span>
            <p class="title-stap">
              Đăng ký<br />tài khoản<br />trên máy chủ
            </p>
            <a href="#question" class="main-button guide grp">Đăng ký tài khoản</a>
          </div>
          <div class="stap-4">
            <i class="lines-stap-4"></i>
            <p class="title-stap">TRẢI NGHIỆM POSIE<br />Role Play</p>
            <p class="description-stap">
              Sau khi hoàn thành các bước trên, bạn chỉ cần chọn KẾT NỐI và tham gia vào thế
              giới nhập vai
            </p>
            <span>BƯỚC 4</span>
            <a href="connectfivem" class="main-button guide play" target="_blank">KẾT NỐI MÁY CHỦ</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="container small">
      <div class="social-links">
        <a href="https://www.facebook.com/posie.city" class="link public" target="_blank">
          <p>FANPAGE<br />FACEBOOK</p>
          <div class="side-box">
            <ul class="people">
              <li class="active"></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
            <div class="count">1 500+</div>
          </div>
        </a>
        <a href="https://www.youtube.com/channel/" class="link youtube" target="_blank">
          <p>Kênh<br />Youtube</p>
          <div class="side-box">
            <ul class="people">
              <li class="active"></li>
              <li class="active"></li>
              <li class="active"></li>
              <li class="active"></li>
              <li></li>
              <li></li>
            </ul>
            <div class="count">1 000+</div>
          </div>
        </a>
        <a href="https://fb.cm" class="link public" target="_blank">
          <p>group<br />facebook</p>
          <div class="side-box">
            <ul class="people">
              <li class="active"></li>
              <li class="active"></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
            <div class="count">1 000+</div>
          </div>
        </a>
        <a href="https://discord.gg/posie" target="_blank" class="link discord">
          <p>máy chủ<br />discord</p>
          <div class="side-box">
            <ul class="people">
              <li class="active"></li>
              <li class="active"></li>
              <li class="active"></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
            <div class="count">1 500+</div>
          </div>
        </a>
      </div>
      <div class="copyright">
        <div class="logo-wrap">
          <div class="logo">
            <img src="images/logo.png" alt="" />
          </div>
          <p class="desc">
            DỰ ÁN MÁY CHỦ<br />GTA 5 <span>NHẬP VAI</span>
          </p>
        </div>
        <p class="protection">
          © POSIE 2024<br />
          DEV BY CJ
        </p>
      </div>
    </div>
  </footer>
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/jquery.form.js" type="text/javascript"></script>
  <script src="js/clipboard.min.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"
    type="text/javascript"></script>
  <script src="js/push.js" type="text/javascript"></script>

  <script type="text/javascript">
      $('#registrationForm').submit(function(e) {
        e.preventDefault(); // Ngừng hành động mặc định của form

        // Lấy token từ reCAPTCHA
        var recaptchaResponse = grecaptcha.getResponse();

        if (recaptchaResponse.length === 0) {
          swal("Lỗi", "Vui lòng xác minh bạn không phải robot", "error");
        } else {
          // Gửi form nếu reCAPTCHA hợp lệ
          $(this).ajaxSubmit({
            url: 'process_reg.php',
            dataType: 'json',
            success: function(data) {
              switch(data.status) {
                case 'error':
                  swal("Lỗi", data.message, "error");
                  grecaptcha.reset(); // Reset reCAPTCHA nếu có lỗi
                  break;
                case 'success':
                  location.href = '/#successRegistration';
                  break;
              }
            }
          });
        }
      });
      $('#donateForm').ajaxForm({
        url: 'process_donate.php',
        dataType: 'text',
        success: function(data) {
          data = $.parseJSON(data);
          switch(data.status) {
            case 'error':
              swal("Lỗi" ,  data.message ,  "error");
              break;
            case 'success':
              $('#qr_donate').attr('src', data.qr);
              location.href = '/#successDonate';
              break;
          }
        },
      });
    </script>

  <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="|49" defer=""></script>
</body>

</html>