<?php
  session_start();

  if(isset($_SESSION['error'])) {
    $msg = $_SESSION['error'];
    echo '<script>alert("'.$msg.'");</script>';
    unset($_SESSION['error']);
  }

  if(isset($_SESSION['alert'])) {
    $msg = $_SESSION['alert'];
    echo '<script>alert("'.$msg.'");</script>';
    unset($_SESSION['alert']);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="auto">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Library</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Side Bar Menu -->
    <div id="sidemenu" class="sidemenu">
      <div class="sidemenu__top" onclick="toggleSideMenu()">
        <img
          class="sidemenu__icon"
          src="./assets/images/icons/close.svg"
          alt="Close Icon"
        />
      </div>

      <div class="sidemenu__bottom">
        <div class="sidemenu__holder">
          <a class="sidemenu__item" aria-label="Home" href="#"
            ><p class="active">Home</p></a
          >
        </div>
        <div class="sidemenu__holder">
          <a class="sidemenu__item" aria-label="Our Screens" href="#"
            ><p>Our Screens</p></a
          >
        </div>
        <div class="sidemenu__holder">
          <a class="sidemenu__item" aria-label="Schedule" href="#"
            ><p>Schedule</p></a
          >
        </div>
        <div class="sidemenu__holder">
          <a class="sidemenu__item" aria-label="Movie Library" href="#"
            ><p>Movie Library</p></a
          >
        </div>
        <div class="sidemenu__holder">
          <a class="sidemenu__item" aria-label="Location & Contact" href="#"
            ><p>Location & Contact</p></a
          >
        </div>
      </div>
    </div>

    <header class="header">
      <div class="navbar-top">
        <div class="navbar max-screen-width">
          <div class="logo">
            <a href="#" aria-label="Home"
              ><img src="./assets/images/logo/Logo.svg" alt="Logo"
            /></a>
          </div>
          <nav>
            <a aria-label="Home" href="#"><p class="active">Home</p></a>
            <a aria-label="Our Screens" href="#"><p>Our Screens</p></a>
            <a aria-label="Schedule" href="#"><p>Schedule</p></a>
            <a aria-label="Movie Library" href="#"><p>Movie Library</p></a>
            <a aria-label="Location & Contact" href="#"
              ><p>Location & Contact</p></a
            >
            <img
              onclick="toggleSideMenu()"
              src="./assets/images/icons/burger_menu.svg"
              alt="Burger Menu"
            />
          </nav>
        </div>
      </div>
    </header>
    <main>
      <div class="image-holder">
        <img src="./assets/images/banner/banner.png" alt="Main Banner" />
      </div>
      <!-- Intro Section -->
      <div class="intro-holder">
        <div class="max-screen-width intro">
          <h3 class="intro-title">Movie Library</h3>
          <p class="intro-desc">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
            erat, sed diam voluptua.
          </p>
        </div>
      </div>

      <!-- Movies Section -->
      <div class="movies-holder">
        <div class="max-screen-width">
          <div class="movies-topbar">
            <h3 class="topbar-title">Collect your favorites</h3>
            <div class="search-box">
              <img
                src="./assets/images/icons/search.svg"
                alt="Search Icon"
                class="search-icon"
              />
              <div class="search-bar">
                <input
                  type="text"
                  placeholder="Search title and add to grid"
                  onkeydown="onSearch(this.value)"
                />
              </div>
            </div>
          </div>
          <div class="movies-result-box" id="movies-result-box"></div>
          <div class="movies-card-holder" id="movies-card-holder">
            <div
              data-aos="fade-up"
              data-aos-duration="2000"
              class="movies-card"
            >
              <div class="movies-image-holder">
                <img src="./assets/images/movies/1.png" alt="Movie Banner" />
                <div class="movies-close-btn" onclick="removeMovieCard(this)">
                  <img src="./assets/images/icons/close.svg" alt="Close Icon" />
                </div>
              </div>
              <div class="movies-info">
                <h6 class="movies-title">Batman Returns</h6>
                <p class="movies-desc">
                  The evil Penguin wants to take control of Gotham City and uses
                  Max Shreck to reach his goal. Meanwhile, Batman does
                  everything in his power to stop the Penguin while Catwoman has
                  an agenda of her own.
                </p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="2000"
              class="movies-card"
            >
              <div class="movies-image-holder">
                <img src="./assets/images/movies/2.png" alt="Movie Banner" />
                <div class="movies-close-btn" onclick="removeMovieCard(this)">
                  <img src="./assets/images/icons/close.svg" alt="Close Icon" />
                </div>
              </div>
              <div class="movies-info">
                <h6 class="movies-title">Wild Wild West</h6>
                <p class="movies-desc">
                  Special Agent Jim West and inventive US Marshal Artemus Gordon
                  are ordered by President Ulysses Grant to team up to save the
                  world from Dr Arliss Loveless's enormous steam-powered
                  tarantula.
                </p>
              </div>
            </div>
            <div
              data-aos="fade-up"
              data-aos-duration="2000"
              class="movies-card"
            >
              <div class="movies-image-holder">
                <img src="./assets/images/movies/3.png" alt="Movie Banner" />
                <div class="movies-close-btn" onclick="removeMovieCard(this)">
                  <img src="./assets/images/icons/close.svg" alt="Close Icon" />
                </div>
              </div>
              <div class="movies-info">
                <h6 class="movies-title">The Amazing Spiderman</h6>
                <p class="movies-desc">
                  Peter Parker, an outcast high school student, gets bitten by a
                  radioactive spider and attains superpowers. While unraveling
                  his parents' disappearance, he must fight against the Lizard.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Section -->
      <div class="contact-holder">
        <div class="max-screen-width">
          <div class="contact-topbar">
            <h3 class="contact-title">How to reach us</h3>
            <p class="contact-desc">Lorem ipsum dolor sit amet.</p>
          </div>
          <div class="contact-secondbar">
            <div
              data-aos="zoom-in"
              data-aos-duration="1500"
              class="contact-form"
            >
              <form method="post" action="./server/mail.php">
                <span class="contact-form-input-box-top contact-form-input-box">
                  <span>
                    <label for="first_name" class="contact-form-label"
                      >First Name *</label
                    >
                    <input
                      id="first_name"
                      name="first_name"
                      class="contact-form-input"
                      type="text"
                      required
                    />
                  </span>
                  <span>
                    <label for="last_name" class="contact-form-label"
                      >Last Name *</label
                    >
                    <input
                      id="last_name"
                      name="last_name"
                      class="contact-form-input"
                      type="text"
                      required
                    />
                  </span>
                </span>
                <span class="contact-form-input-box">
                  <label for="email" class="contact-form-label">Email *</label>
                  <input
                    id="email"
                    name="email"
                    class="contact-form-input"
                    type="email"
                    required
                  />
                </span>
                <span class="contact-form-input-box">
                  <label for="telephone" class="contact-form-label"
                    >Telephone</label
                  >
                  <input
                    name="telephone"
                    id="telephone"
                    class="contact-form-input"
                    type="tel"
                  />
                </span>
                <span class="contact-form-input-box">
                  <label for="message" class="contact-form-label"
                    >Message</label
                  >
                  <textarea
                    id="message"
                    name="message"
                    class="contact-form-input"
                  ></textarea>
                  <p class="contact-form-label">*required fields</p>
                </span>
                <span class="contact-form-check-box">
                  <input type="checkbox" id="checkbox" name="checkbox" required/>
                  <span class="check-mark"></span>
                  <label for="checkbox" class="contact-form-label">
                    I agree to the
                    <span class="text-white">Terms & Conditions</span></label
                  >
                </span>
                <span class="contact-form-button-box">
                  <input class="contact-button" type="submit" value="submit" />
                </span>
              </form>
            </div>
            <div
              data-aos="zoom-in"
              data-aos-duration="1500"
              class="contact-map"
            >
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe
                    title="Google Map"
                    class="gmap_iframe"
                    width="100%"
                    frameborder="0"
                    scrolling="no"
                    marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?width=600&amp;height=600&amp;hl=en&amp;q=eBEYONDS eBusiness & Digital Solutions&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer Section -->
      <footer class="footer">
        <div class="max-screen-width">
          <div class="footer-top-box">
            <div class="footer-address-box">
              <p><b>IT Group</b></p>
              <p>C. Salvador de Madariaga, 1</p>
              <p>28027 Madrid</p>
              <p>Spain</p>
            </div>
            <div class="footer-icon-box">
              <p>Follow us on</p>
              <img src="./assets/images/icons/twitter.svg" alt="Twitter Logo" />
              <img src="./assets/images/icons/youtube.svg" alt="Youtube Logo" />
            </div>
          </div>
          <div class="footer-bottom-box">
            <span>Copyright © 2022 IT Hotels. All rights reserved.</span>
            <span
              >Photos by Felix Mooneeram &
              <span class="text-white">Serge Kutuzov</span> on
              <span class="text-white">Unsplash</span></span
            >
          </div>
        </div>
      </footer>
    </main>
    <script src="./assets/js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
