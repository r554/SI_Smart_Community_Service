<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://fanlika.my.id/" target="_blank">DeraOfficial</a> 2021</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= base_url('assets/admin/'); ?>vendor/global/global.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/deznav-init.js"></script>

<!-- Counter Up -->
<script src="<?= base_url('assets/admin/'); ?>vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url('assets/admin/'); ?>vendor/apexchart/apexchart.js"></script>

<!-- Chart piety plugin files -->
<script src="<?= base_url('assets/admin/'); ?>vendor/peity/jquery.peity.min.js"></script>

<!-- Dashboard 1 -->
<script src="<?= base_url('assets/admin/'); ?>js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url('assets/admin/'); ?>vendor/owl-carousel/owl.carousel.js"></script>

<script>
    function widgetCarousel() {

        /*  testimonial one function by = owl.carousel.js */
        jQuery('.widget-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            autoplaySpeed: 3000,
            navSpeed: 3000,
            paginationSpeed: 3000,
            slideSpeed: 3000,
            smartSpeed: 3000,
            autoplay: false,
            dots: false,
            navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },

                480: {
                    items: 2
                },

                1200: {
                    items: 3
                },
                1750: {
                    items: 4
                }
            }
        })
    }

    function carouselReview() {
        /*  testimonial one function by = owl.carousel.js */
        jQuery('.testimonial-one').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 0,
            nav: false,
            dots: false,
            navText: [''],
            responsive: {
                0: {
                    items: 1
                },

                480: {
                    items: 1
                },

                767: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        /*Custom Navigation work*/
        jQuery('#next-slide').on('click', function() {
            $('.testimonial-one').trigger('next.owl.carousel');
        });

        jQuery('#prev-slide').on('click', function() {
            $('.testimonial-one').trigger('prev.owl.carousel');
        });
        /*Custom Navigation work*/
    }

    jQuery(window).on('load', function() {
        setTimeout(function() {
            widgetCarousel();
            carouselReview();
        }, 1000);
    });
</script>

<!-- Datatable -->
<script src="<?= base_url('assets/admin/'); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/datatables.init.js"></script>

<!-- Jquery Validation -->
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Form validate init -->
<script src="<?= base_url('assets/admin/'); ?>js/plugins-init/jquery.validate-init.js"></script>

</body>

</html>