  <!-- ======= Footer ======= -->
  <footer id="footer">

      <div class="footer-newsletter">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-3">
                      <h4>Aplikasi Lelang ThomAuction</h4>
                      <p class="text-primary">http://AuctionThom.com</p>
                  </div>
                  <div class="col-lg-3">
                      <h4>Kontak dan <br>No telfon</br></h4>
                      <p class="text-primary bi bi-whatsapp"><span class="ms-2">0895384133157</span></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-top">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Useful Links</h4>
                      <ul>
                          <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#footer">About us</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#home">Services</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Our Services</h4>
                      <ul>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Auction</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Best Minimum Bit </a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Best Product</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Our Social Networks</h4>
                      <p>Social Media and Contact Developer</p>
                      <div class="social-links mt-3">
                          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
  </footer><!-- End Footer -->


  <!-- Vendor JS Files -->
  <script src="https://kit.fontawesome.com/f7c9e46b56.js" crossorigin="anonymous"></script> 
  <script src="{{ url('Assets/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('Assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('Assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('Assets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('Assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('Assets/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ url('Assets/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('Assets/assets/js/main.js') }}"></script>
  @include('template.js')
  <script src="{{ url('Assets/assets/js/sweetalert2@11.js') }}"></script>
  <!-- script sweetalert -->
  <script src="{{ url('Assets/assets/js/sweetalert2@11.js') }}"></script>
  @if(session('alertSuccess'))
  <script>
        Swal.fire(`Berhasil!`, `{{ session('alertSuccess') }}`, `success`);
  </script>
  @php session()->forget('alertSuccess'); @endphp

  @elseif(session('alertFailed'))
  <script>
         Swal.fire(`Gagal`, `{{ session('alertFailed') }}`, `error`);
  </script>
    @php session()->forget('alertFailed'); @endphp
  @endif
  </body>

  </html>
