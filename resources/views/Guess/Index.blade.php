@include('Guess.Template.Navbar')

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-content">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
              <div class="content">
                <h1 class="hero-title mb-4">Ningrat Resto</h1>
                <p class="hero-subtitle mb-4">Restoran dengan Citarasa Otantilk Nusantara, Temukan Makanan Nusantara Favorit Kamu di Ningrat Resto.</p>

                <div class="hero-actions d-flex flex-wrap gap-3 mb-4">
                  <a href="#book-a-table" class="btn btn-primary">Reservasi</a>
                  <a href="#menu" class="btn btn-outline">Menu</a>
                </div>

                <div class="hero-info d-flex flex-wrap align-items-center gap-4">
                  <div class="info-item d-flex align-items-center">
                    <i class="bi bi-clock me-2"></i>
                    <div>
                      <small class="text-muted">Setiap Hari</small>
                      <div class="fw-medium" id="jam-operational">Loading...</div>
                    </div>
                  </div>
                  <div class="info-item d-flex align-items-center">
                    <i class="bi bi-geo-alt me-2"></i>
                    <div>
                      <small class="text-muted">Alamat</small>
                      <div class="fw-medium" id="alamat">Loading...</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
              <div class="hero-images">
                <div class="main-image">
                  <img src="{{ asset('Guess/assets/img/restaurant/showcase-2.webp') }}" alt="Signature Mediterranean Dish" class="img-fluid">
                </div>
                <div class="floating-images">
                  <div class="floating-image floating-image-1">
                    <img src="{{ asset('Guess/assets/img/restaurant/main-4.webp')}}" alt="Grilled Seafood" class="img-fluid">
                  </div>
                  <div class="floating-image floating-image-2">
                    <img src="{{ asset('Guess/assets/img/restaurant/main-2.webp')}}" alt="Mediterranean Dessert" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Signature Menu</h2>
        <p>Signature Menu yang kita Miliki</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-12">
            <div class="menu-filters">
              <ul class="nav nav-pills justify-content-center" id="menuTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="menu-starters-tab" data-bs-toggle="pill" data-bs-target="#menu-starters" type="button" role="tab">
                    <i class="bi bi-egg-fried me-2"></i>Makanan
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="menu-mains-tab" data-bs-toggle="pill" data-bs-target="#menu-mains" type="button" role="tab">
                    <i class="bi bi-cup-hot me-2"></i>Minuman
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="menu-desserts-tab" data-bs-toggle="pill" data-bs-target="#menu-desserts" type="button" role="tab">
                    <i class="bi bi-cake2 me-2"></i>Snack
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="tab-content" id="menuTabContent">
          <!-- Starters Tab -->
          <div class="tab-pane fade show active" id="menu-starters" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="{{ asset('Guess/assets/img/restaurant/starter-6.webp') }}" class="img-fluid" alt="Starter">
                    <div class="special-badge">Best Seller</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Crispy Calamari Rings</h4>
                      <div class="dietary-tags">
                        <span class="tag spicy"><i class="bi bi-fire"></i></span>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore</p>
                    <div class="menu-item-footer">
                      <span class="price">$18</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-3.webp" class="img-fluid" alt="Starter">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Truffle Arancini</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="menu-item-footer">
                      <span class="price">$16</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-5.webp" class="img-fluid" alt="Starter">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Salmon Ceviche</h4>
                      <div class="dietary-tags">
                        <span class="tag gluten-free"><i class="bi bi-check-circle"></i></span>
                      </div>
                    </div>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
                    <div class="menu-item-footer">
                      <span class="price">$22</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/starter-7.webp" class="img-fluid" alt="Starter">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Beef Tartare</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim</p>
                    <div class="menu-item-footer">
                      <span class="price">$28</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Main Courses Tab -->
          <div class="tab-pane fade" id="menu-mains" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-2.webp" class="img-fluid" alt="Main Course">
                    <div class="special-badge">Signature</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Grilled Ribeye Steak</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                    <div class="menu-item-footer">
                      <span class="price">$45</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-4.webp" class="img-fluid" alt="Main Course">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Pan-Seared Salmon</h4>
                      <div class="dietary-tags">
                        <span class="tag gluten-free"><i class="bi bi-check-circle"></i></span>
                      </div>
                    </div>
                    <p>Totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae</p>
                    <div class="menu-item-footer">
                      <span class="price">$38</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-6.webp" class="img-fluid" alt="Main Course">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Lobster Ravioli</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur</p>
                    <div class="menu-item-footer">
                      <span class="price">$42</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/main-8.webp" class="img-fluid" alt="Main Course">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Mushroom Risotto</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam est qui dolorem</p>
                    <div class="menu-item-footer">
                      <span class="price">$32</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Desserts Tab -->
          <div class="tab-pane fade" id="menu-desserts" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-2.webp" class="img-fluid" alt="Dessert">
                    <div class="special-badge">Popular</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Chocolate Lava Cake</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Ipsum quia dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt</p>
                    <div class="menu-item-footer">
                      <span class="price">$14</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-5.webp" class="img-fluid" alt="Dessert">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Crème Brûlée</h4>
                      <div class="dietary-tags">
                        <span class="tag gluten-free"><i class="bi bi-check-circle"></i></span>
                      </div>
                    </div>
                    <p>Ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco</p>
                    <div class="menu-item-footer">
                      <span class="price">$12</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-7.webp" class="img-fluid" alt="Dessert">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Tiramisu</h4>
                      <div class="dietary-tags">
                        <span class="tag vegetarian"><i class="bi bi-leaf"></i></span>
                      </div>
                    </div>
                    <p>Laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit</p>
                    <div class="menu-item-footer">
                      <span class="price">$13</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/dessert-9.webp" class="img-fluid" alt="Dessert">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Seasonal Fruit Tart</h4>
                      <div class="dietary-tags">
                        <span class="tag vegan"><i class="bi bi-flower1"></i></span>
                      </div>
                    </div>
                    <p>In voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat</p>
                    <div class="menu-item-footer">
                      <span class="price">$11</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Beverages Tab -->
          <div class="tab-pane fade" id="menu-drinks" role="tabpanel">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-3.webp" class="img-fluid" alt="Beverage">
                    <div class="special-badge">House Special</div>
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Signature Cocktail</h4>
                      <div class="dietary-tags">
                        <span class="tag spicy"><i class="bi bi-fire"></i></span>
                      </div>
                    </div>
                    <p>Cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <div class="menu-item-footer">
                      <span class="price">$16</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-6.webp" class="img-fluid" alt="Beverage">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Fresh Fruit Smoothie</h4>
                      <div class="dietary-tags">
                        <span class="tag vegan"><i class="bi bi-flower1"></i></span>
                      </div>
                    </div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                    <div class="menu-item-footer">
                      <span class="price">$8</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-8.webp" class="img-fluid" alt="Beverage">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Premium Wine Selection</h4>
                      <div class="dietary-tags">
                        <span class="tag premium"><i class="bi bi-star-fill"></i></span>
                      </div>
                    </div>
                    <p>Laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi</p>
                    <div class="menu-item-footer">
                      <span class="price">$35</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="menu-item">
                  <div class="menu-item-image">
                    <img src="assets/img/restaurant/drink-10.webp" class="img-fluid" alt="Beverage">
                  </div>
                  <div class="menu-item-content">
                    <div class="menu-item-header">
                      <h4>Artisan Coffee</h4>
                      <div class="dietary-tags">
                        <span class="tag vegan"><i class="bi bi-flower1"></i></span>
                      </div>
                    </div>
                    <p>Architecto beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas</p>
                    <div class="menu-item-footer">
                      <span class="price">$6</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="300">
            <a href="#" class="btn btn-download">
              <i class="bi bi-download me-2"></i>Download Full Menu (PDF)
            </a>
          </div>
        </div>

      </div>

    </section><!-- /Menu Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Review Customer</h2>
        <p>Review Our Customer</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="testimonial-grid">

          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="100">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-f-5.webp" class="img-fluid" alt="Testimonial 1">
                </div>
                <div class="testimonial-meta">
                  <h3>Sophia Martinez</h3>
                  <h4>Creative Director</h4>
                  <div class="company-logo">
                    <i class="bi bi-building"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Leveraging cutting-edge design principles to create immersive brand experiences that resonate with modern audiences.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-item featured" data-aos="zoom-in" data-aos-delay="200">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-m-5.webp" class="img-fluid" alt="Testimonial 2">
                </div>
                <div class="testimonial-meta">
                  <h3>Alexander Wright</h3>
                  <h4>CEO &amp; Founder</h4>
                  <div class="company-logo">
                    <i class="bi bi-buildings"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Revolutionary solutions have transformed our business landscape, driving unprecedented growth and market leadership position.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-f-6.webp" class="img-fluid" alt="Testimonial 3">
                </div>
                <div class="testimonial-meta">
                  <h3>Isabella Kim</h3>
                  <h4>Product Strategist</h4>
                  <div class="company-logo">
                    <i class="bi bi-building-check"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Strategic implementation of innovative technologies has elevated our product development and market penetration.</p>
              </div>
            </div>
          </div>

          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
            <div class="testimonial-card">
              <div class="testimonial-header">
                <div class="testimonial-image">
                  <img src="assets/img/person/person-m-6.webp" class="img-fluid" alt="Testimonial 4">
                </div>
                <div class="testimonial-meta">
                  <h3>James Cooper</h3>
                  <h4>Tech Lead</h4>
                  <div class="company-logo">
                    <i class="bi bi-building-gear"></i>
                  </div>
                </div>
              </div>
              <div class="testimonial-body">
                <i class="bi bi-chat-quote-fill quote-icon"></i>
                <p>Exceptional technical expertise and innovative solutions have streamlined our development processes significantly.</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Location Section -->
    <section id="location" class="location section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="location-content">
              <div class="content-header">
                <h2>Visit Our Establishment</h2>
                <p class="subtitle">Located in the heart of Manhattan's culinary district</p>
              </div>

              <div class="map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d5479.479283559122!2d106.8256547!3d-6.224643100000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e2!4m3!3m2!1d-6.2246454!2d106.8256409!4m3!3m2!1d-6.2246486!2d106.8256279!5e1!3m2!1sen!2sid!4v1768899009778!5m2!1sen!2sid" width="100" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-overlay">
                  <div class="location-badge">
                    <i class="bi bi-geo-alt"></i>
                    <span>We're Here</span>
                  </div>
                </div>
              </div>

              <div class="transportation-info" data-aos="fade-up" data-aos-delay="300">
                <h4>Transportation &amp; Parking</h4>
                <div class="transport-grid">
                  <div class="transport-item">
                    <i class="bi bi-train-front"></i>
                    <div class="details">
                      <strong>Subway</strong>
                      <p>Union Square Station (4, 5, 6, L, N, Q, R, W)</p>
                    </div>
                  </div>
                  <div class="transport-item">
                    <i class="bi bi-p-square"></i>
                    <div class="details">
                      <strong>Valet Parking</strong>
                      <p>Available daily from 5:00 PM</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="250">
            <div class="contact-sidebar">
              <div class="contact-card">
                <div class="card-icon">
                  <i class="bi bi-building"></i>
                </div>
                <h3>Address</h3>
                <p>847 Broadway Avenue<br>New York, NY 10003</p>
              </div>

              <div class="contact-card" data-aos="fade-up" data-aos-delay="350">
                <div class="card-icon">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <h3>Reservations</h3>
                <p class="phone">+1 (555) 234-5678</p>
                <p class="note">Recommended 24-48 hours advance booking</p>
              </div>

              <div class="contact-card" data-aos="fade-up" data-aos-delay="450">
                <div class="card-icon">
                  <i class="bi bi-clock-fill"></i>
                </div>
                <h3>Operating Hours</h3>
                <div class="hours-list">
                  <div class="hour-item">
                    <span class="day">Tuesday - Thursday</span>
                    <span class="time">5:00 PM - 10:00 PM</span>
                  </div>
                  <div class="hour-item">
                    <span class="day">Friday - Saturday</span>
                    <span class="time">5:00 PM - 11:00 PM</span>
                  </div>
                  <div class="hour-item">
                    <span class="day">Sunday</span>
                    <span class="time">4:00 PM - 9:00 PM</span>
                  </div>
                  <div class="hour-item closed">
                    <span class="day">Monday</span>
                    <span class="time">Closed</span>
                  </div>
                </div>
              </div>

              <div class="action-buttons" data-aos="fade-up" data-aos-delay="550">
                <a href="#book-a-table" class="btn-primary">Book a Table</a>
                <a href="#" class="btn-secondary">Get Directions</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Location Section -->


  </main>

  @include('Guess.Template.Footer')

  <script>
    fetch('/api/param?nama_param=Alamat')
        .then(response => response.json())
        .then(data => {
            document.getElementById('alamat').innerText = data.data.param_value;
        })
        .catch(() => {
            document.getElementById('alamat').innerText = 'Gagal ambil data';
        });

    fetch('/api/param?nama_param=Jam Operational')
        .then(response => response.json())
        .then(data => {
            document.getElementById('jam-operational').innerText = data.data.param_value;
        })
        .catch(() => {
            document.getElementById('jam-operational').innerText = 'Gagal ambil data';
        });
  </script>
    
    