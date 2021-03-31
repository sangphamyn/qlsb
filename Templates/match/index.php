<?php include "Templates/partials/header.php" ?>


	 <div class="container">
	 	<!-- Swiper -->
		  <div class="swiper-container">
		    <div class="swiper-wrapper">
		      <div class="swiper-slide"><img src="img/1a.jpg" alt=""></div>
		      <div class="swiper-slide"><img src="img/1b.jpg" alt=""></div>
		      <div class="swiper-slide"><img src="img/1c.jpg" alt=""></div>
		      <div class="swiper-slide"><img src="img/1d.jpg" alt=""></div>
		    </div>
		    <!-- Add Arrows -->
		    <div class="swiper-button-next"></div>
		    <div class="swiper-button-prev"></div>
		    <!-- Add Pagination -->
    		<div class="swiper-pagination"></div>
		  </div>

		  <div class="section-3">
        <div class="wrap">
            <div class="col col-1">
                <i class="pegk pe-7s-car"></i>
                <h5>CHẤT LƯỢNG</h5>
                <h6>Mặt sân nhân tạo với chất lượng hoàn hảo</h6>
            </div>
            <div class="col col-2">
                <i class="pegk pe-7s-help2"></i>
                <h5>DỊCH VỤ</h5>
                <h6>Nước, bóng và áo đấu kèm theo</h6>
            </div>
            <div class="col col-3">
                <i class="pegk pe-7s-refresh"></i>
                <h5>GIÁ</h5>
                <h6>Giá phù hợp với sinh viên</h6>
            </div>
            <div class="col col-4">
                <i class="pegk pe-7s-door-lock"></i>
                <h5>ĐẶT SÂN</h5>
                <h6>Nhân viên phục vụ 24/24</h6>
            </div>
        </div>
    </div>
	 </div>
<script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
<?php include "Templates/partials/footer.php" ?>