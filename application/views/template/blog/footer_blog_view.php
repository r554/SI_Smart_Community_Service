<!-- Footer -->
<footer id="footer">
            <div id="footer-widgets" class="wprt-container">
                <div class="wprt-row gutter-30">
                    <div class="span_1_of_3 col">
                        <div class="widget widget_text">
                            <div class="textwidget">
                                <!-- <img src="<?= base_url("assets/images/others/step-a.png"); ?>" id="footer-logo" alt="logo"> -->
                                <h2 class="widget-title"><span><?= $site['short_title']; ?></span></h2>
                            </div>
                        </div>

                        <div class="widget widget_information">
                            <ul class="clearfix">                                
                                <li class="address">
                                    <i class="fa fa-map-marker" style="top: 40%;"></i>
                                    <p style="line-height: 25px;"><?= $site['address']; ?></p>
                                </li>
                                <li class="email">
                                    <i class="fa fa-envelope-o"></i>
                                    <span><?= $site['email']; ?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="widget widget_socials">
                            <div class="socials clearfix">
                                <div class="icon">
                                    <a target="_blank" href="<?= $site['twitter']; ?>">
                                        <i class="fa fa-twitter"></i></a>
                                </div>

                                <div class="icon">
                                    <a target="_blank" href="<?= $site['facebook']; ?>">
                                        <i class="fa fa-facebook"></i></a>
                                </div>

                                <div class="icon">
                                    <a target="_blank" href="<?= $site['linkedin']; ?>"><i class="fa fa-linkedin"></i></a>
                                </div>

                                <div class="icon">
                                    <a target="_blank" href="<?= $site['instagram']; ?>"><i class="fa fa-instagram"></i></a>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.span_1_of_3 -->

                    <div class="span_1_of_3 col">
                        <div class="widget widget_links">
                            <h2 class="widget-title"><span>Maps</span></h2>
                            <div class="col clearfix">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.3591776005701!2d113.7216729008865!3d-8.158679325612205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b6701119b7%3A0x48b11dbdd7f0b910!2sGedung%20Kesehatan%20Politeknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1594869516465!5m2!1sid!2sid" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>                            
                        </div>
                    </div><!-- /.span_1_of_3 -->

                    <div class="span_1_of_3 col">
                        <div class="widget widget_recent_news">
                            <h2 class="widget-title"><span>Recent Posts</span></h2>

                            <ul class="recent-news clearfix">

                                <?php foreach ($recent_posts as $post) : ?>
                                    <li class="clearfix">
                                        <div class="thumb">
                                            <img src="<?= base_url("assets/images/posts/") . $post['image']; ?>" alt="image">
                                        </div>

                                        <?php
                                        $post_date = date_create($post['date_published']);
                                        $date = date_format($post_date, 'd M, Y');
                                        ?>

                                        <div class="texts">
                                            <h3><a href="<?= base_url('post/') . $post['slug']; ?>"><?= $post['title']; ?></a></h3>
                                            <span class="post-date">
                                                <span class="entry-date"><?= $date; ?></span>
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div><!-- /.span_1_of_3 -->
                </div>
            </div><!-- /#footer-widgets -->
        </footer><!-- /#footer -->

<!-- Bottom -->
<div id="bottom">
    <div id="bottom-bar-inner" class="wprt-container">
        <div class="bottom-bar-inner-wrap">
            <div class="bottom-bar-content">
                <div id="copyright">
                    &copy; <?= date("Y", time()); ?> STEP-A, All rights reserved
                </div><!-- /#copyright -->
            </div><!-- /.bottom-bar-content -->

            <div class="bottom-bar-menu">
                <ul class="bottom-nav">
                    <li class="menu-item"><a href="#">Home</a></li>
                    <li class="menu-item"><a href="#">About</a></li>
                    <li class="menu-item"><a href="#">Contact</a></li>
                </ul>
            </div><!-- /.bottom-bar-menu -->
        </div>
    </div>
</div><!-- /#bottom -->

</div><!-- /#page -->
</div><!-- /#wrapper -->

<!-- Scroll Top -->
<a id="scroll-top"></a>

<!-- Javascript -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/main.js"></script>

</body>

</html>