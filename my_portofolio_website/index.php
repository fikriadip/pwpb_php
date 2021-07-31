<?php
session_start();
include_once("Admin/dist/includes/connection.php");
include_once("Admin/dist/includes/function.php");
// include_once("Admin/dist/gallery.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Muhammad Fikri Adi</title>
    <link rel="stylesheet" href="Admin/dist/assets/css/style_portfolio.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="icon" href="Admin/dist/assets/img/content/aurora.png">
</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <a href="#">Fikri<span>Adi</span></a>
            </div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#skills" class="menu-btn">Skills</a></li>
                <li><a href="#gallery" class="menu-btn">Gallery</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- HOME -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <?php
                    $stmt = $conn->prepare('SELECT * FROM home');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($home = $result->fetch_assoc()):
                ?>
                <div class="text-1"><?= $home['title']; ?></div>
                <div class="text-2"><?= $home['my_name']; ?></div>
                <div class="text-3"><?= $home['my_description']; ?>&nbsp;<span><?= $home['my_job']; ?></span></div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About Me</h2>
            <div class="about-content">
                <?php
                    $stmt = $conn->prepare('SELECT * FROM about');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($about = $result->fetch_assoc()):
                ?>
                <div class="column left">
                    <img src="Admin/dist/assets/img/content/<?= $about['profile_image']; ?>" alt="" />
                </div>
                <div class="column right">
                    <div class="text"><?= $about['profile_title']; ?> <span><?= $about['profile_name']; ?></span></div>
                    <p>
                        <?= $about['profile_description']; ?>
                    </p>
                    <!-- <a href="#">Download Resume</a> -->
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>


    <!-- SERVICES -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">My Services</h2>
            <div class="services-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">Web Design</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur labore nemo voluptatem ab
                            hic! Libero.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <i class="fa fa-leaf"></i>
                        <div class="text">UI/UX Design</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur labore nemo voluptatem ab
                            hic! Libero.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">Development</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur labore nemo voluptatem ab
                            hic! Libero.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SKILLS -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">My Skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">My Creative Skills</div>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa aperiam sequi ea explicabo
                        maiores cum incidunt, provident eligendi, voluptas unde inventore fugiat quas doloribus autem
                        temporibus veritatis illum alias delectus
                        laboriosam voluptatem dolore. Ex optio, earum suscipit quo accusantium odio officia eius
                        reiciendis accusamus molestias corporis aperiam. Doloribus delectus ipsum dolore accusamus
                        ducimus dicta, inventore voluptates? Aperiam
                        quae sequi obcaecati!
                    </p>
                    <!-- <a href="#">Read More</a> -->
                </div>
                <div class="column right">
                    <div class="skills-data">
                        <div class="skills-names">
                            <i class="fab fa-html5 skills-icon"></i>
                            <span class="skills-name">HTML</span>
                        </div>

                        <div>
                            <span class="skills-percentase">85%</span>
                        </div>

                        <div class="skills-bar skills-html"></div>
                    </div>

                    <div class="skills-data">
                        <div class="skills-names">
                            <i class="fab fa-css3-alt skills-icon"></i>
                            <span class="skills-name">CSS</span>
                        </div>

                        <div>
                            <span class="skills-percentase">60%</span>
                        </div>

                        <div class="skills-bar skills-css"></div>
                    </div>

                    <div class="skills-data">
                        <div class="skills-names">
                            <i class="fab fa-js-square skills-icon"></i>
                            <span class="skills-name">JAVASCRIPT</span>
                        </div>

                        <div>
                            <span class="skills-percentase">30%</span>
                        </div>

                        <div class="skills-bar skills-js"></div>
                    </div>

                    <div class="skills-data">
                        <div class="skills-names">
                            <img src="Admin/dist/assets/img/content/iconsphp.png" alt="" class="skills-icon"
                                width="32px" style="border-radius: 3.5px" />
                            <span class="skills-name">PHP</span>
                        </div>

                        <div>
                            <span class="skills-percentase">40%</span>
                        </div>

                        <div class="skills-bar skills-php"></div>
                    </div>

                    <div class="skills-data">
                        <div class="skills-names">
                            <i class="fa fa-database skills-icon"></i>
                            <span class="skills-name">MYSQL</span>
                        </div>

                        <div>
                            <span class="skills-percentase">45%</span>
                        </div>

                        <div class="skills-bar skills-mysql"></div>
                    </div>

                    <div class="skills-data">
                        <div class="skills-names">
                            <i class="fas fa-paint-brush skills-icon"></i>
                            <span class="skills-name">UI/UX</span>
                        </div>

                        <div>
                            <span class="skills-percentase">55%</span>
                        </div>

                        <div class="skills-bar skills-uiux"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- GALLERY -->
    <section class="gallery" id="gallery">
        <div class="max-width">
            <h2 class="title">My Gallery</h2>
            <div class="gallery_content">
                <?php
                    $stmt = $conn->prepare('SELECT * FROM gallery');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()):
                ?>
                <div class="card_project">
                    <div class="imgBox">
                        <img src="Admin/dist/assets/img/content/<?= $row['image_gallery']; ?>" alt="images">
                    </div>
                    <div class="details">
                        <h2><?= $row['description']; ?><br><span><?= $row['created_at']; ?></span></h2>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga
                        corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Muhammad Fikri Adi Prasetyo</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Depok, Indonesia</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">adifikri91@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form class="contact-form" id="form-message" onsubmit="event.preventDefault()">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" class="fullname" placeholder="Your Name" id="name" required />
                            </div>
                            <div class="field email">
                                <input type="email" class="email-input" placeholder="Your Email" id="email"
                                    autocomplete="email" required auto />
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" class="subject" placeholder="Subject" id="subject" required />
                        </div>
                        <div class="field textarea">
                            <textarea class="message" cols="30" rows="10" placeholder="Message..." id="message"
                                required></textarea>
                        </div>
                        <div class="button-area">
                            <button class="send-msg" type="submit" name="send" id="btn_send">Send Message</button>
                            <h3 id="message_input"></h3>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p class="footer-title">Muhammad Fikri</p>
        <!-- <p class="footer-subtitle">Your Complete Web Solution</p> -->

        <div class="footer-social">
            <a href="#" class="footer-icon" title="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/fiikriadi_/?hl=id" class="footer-icon" title="instagram"
                target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/fikriiadii" class="footer-icon" title="twitter" target="_blank"><i
                    class="fab fa-twitter"></i></a>
        </div>
        <p>&#169; 2021 Muhammad Fikri - All Rights Reserved
        </p>
        <a href="Admin/Login/login.php" target="_blank"
            style="float: left; margin-left: 2%; color: #818181;"><small>Login</small></a>
    </footer>

    <script src="Admin/dist/assets/js/script.js"></script>
    <script src="Admin/js/myjs.js"></script>
</body>

</html>