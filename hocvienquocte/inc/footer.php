    
    <footer class="revealed">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-6">
                    <h3 data-target="#collapse_1">Thông Tin</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul>
                            <li><a href="about.php">Giới thiệu</a></li>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="login.php">Tài khoản</a></li>
                            <li><a href="contacts.php">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_2">Categories</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <li><a href="listing-grid-1-full.html">Clothes</a></li>
                            <li><a href="listing-grid-2-full.html">Electronics</a></li>
                            <li><a href="listing-grid-1-full.html">Furniture</a></li>
                            <li><a href="listing-grid-3.html">Glasses</a></li>
                            <li><a href="listing-grid-1-full.html">Shoes</a></li>
                            <li><a href="listing-grid-1-full.html">Watches</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-6">
                        <h3 data-target="#collapse_3">Liên Hệ</h3>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="ti-home"></i>75 Xuân Hồng<br>P.12 - Q.Tân Bình - TP.HCM</li>
                            <li><i class="ti-headphone-alt"></i>+84 869-321-727</li>
                            <li><i class="ti-email"></i><a href="#0">hhthanh031@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                        <!-- <h3 data-target="#collapse_4">Keep in touch</h3> -->
                    <div class="collapse dont-collapse-sm" id="collapse_4">
                        <!-- <div id="newsletter">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                            </div>
                        </div> -->
                        <div class="follow_us">
                            <h5 style="margin-top: 0px !important;">Theo Dõi Chúng Tôi</h5>
                            <ul>
                                <li><a href="https://twitter.com/"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="https://facebook.com/"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="https://www.instagram.com/"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="https://www.youtube.com/"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <hr>

            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <!-- <ul class="footer-selector clearfix">
                        <li>
                            <div class="styled-select lang-selector">
                                <select>
                                    <option value="English" selected>English</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Russian">Russian</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="styled-select currency-selector">
                                <select>
                                    <option value="US Dollars" selected>US Dollars</option>
                                    <option value="Euro">Euro</option>
                                </select>
                            </div>
                        </li>
                        <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                    </ul> -->
                </div>
                <div class="col-lg-6">
                    <ul class="additional_links">
                        <li><a href="#0">Huỳnh Hữu Thành</a></li>
                        <li><a href="#0">0750080031</a></li>
                        <li><span>07 - CNTT01</span></li>
                        <!-- <li><span>© 2020 Allaia</span></li> -->
                    </ul>
                </div>
            </div>

        </div>
    </footer>
    <!--/footer-->
    </div>
    <!-- page -->
    
    <div id="toTop"></div><!-- Back to top button -->

    <!-- LẤY DANH SÁCH TỈNH THÀNH & QUẬN HUYỆN -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>//<![CDATA[
    if (address_2 = localStorage.getItem('address_2_saved')) {
      $('select[name="calc_shipping_district"] option').each(function() {
        if ($(this).text() == address_2) {
          $(this).attr('selected', '')
        }
      })
      $('input.billing_address_2').attr('value', address_2)
    }
    if (district = localStorage.getItem('district')) {
      $('select[name="calc_shipping_district"]').html(district)
      $('select[name="calc_shipping_district"]').on('change', function() {
        var target = $(this).children('option:selected')
        target.attr('selected', '')
        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
        address_2 = target.text()
        $('input.billing_address_2').attr('value', address_2)
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.setItem('address_2_saved', address_2)
      })
    }
    $('select[name="calc_shipping_provinces"]').each(function() {
      var $this = $(this),
        stc = ''
      c.forEach(function(i, e) {
        e += +1
        stc += '<option value=' + e + '>' + i + '</option>'
        $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
        if (address_1 = localStorage.getItem('address_1_saved')) {
          $('select[name="calc_shipping_provinces"] option').each(function() {
            if ($(this).text() == address_1) {
              $(this).attr('selected', '')
            }
          })
          $('input.billing_address_1').attr('value', address_1)
        }
        $this.on('change', function(i) {
          i = $this.children('option:selected').index() - 1
          var str = '',
            r = $this.val()
          if (r != '') {
            arr[i].forEach(function(el) {
              str += '<option value="' + el + '">' + el + '</option>'
              $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
            })
            var address_1 = $this.children('option:selected').text()
            var district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('address_1_saved', address_1)
            localStorage.setItem('district', district)
            $('select[name="calc_shipping_district"]').on('change', function() {
              var target = $(this).children('option:selected')
              target.attr('selected', '')
              $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
              var address_2 = target.text()
              $('input.billing_address_2').attr('value', address_2)
              district = $('select[name="calc_shipping_district"]').html()
              localStorage.setItem('district', district)
              localStorage.setItem('address_2_saved', address_2)
            })
          } else {
            $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
            district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('district', district)
            localStorage.removeItem('address_1_saved', address_1)
          }
        })
      })
    })
    //]]></script>
    
    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
    
    <!-- SPECIFIC SCRIPTS -->
    <script src="js/carousel-home.min.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <script src="js/sticky_sidebar.min.js"></script>
    <!-- <script src="js/specific_listing.js"></script> -->
    
    <script>
        // Sticky sidebar
        $('#sidebar_fixed').theiaStickySidebar({
            minWidth: 991,
            updateSidebarHeight: false,
            additionalMarginTop: 90
        });
    </script>

</body>
</html>