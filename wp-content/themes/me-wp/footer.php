<?php if(is_home() || is_tag() || is_404() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_attachment()){
    $select_footer_type = me_wp_option('select_footer_type');
} else {
    $select_footer_type = me_wp_get_field('select_footer_type');
}
if($select_footer_type == 'footer-diagonal' || $select_footer_type == 'footer-plain'){
    get_template_part('includes/footers/footer','contact-form');
} else {
    get_template_part('includes/footers/footer','default');
}
?>
<!-- GO TO TOP  -->
<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
<!-- GO TO TOP End -->
</div>
<!-- End Page Wrapper -->
<?php wp_footer(); ?>
</body>
</html>