<?php global $theme; ?>

    <div id="footer-wrap" class="span-24">
        
        <div id="footer">
        
            <div id="copyrights">
                <?php
                    if($theme->display('footer_custom_text')) {
                        $theme->option('footer_custom_text');
                    } else { 
                        ?> &copy; <?php echo date('Y'); ?>  <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>. <?php _e('All Rights Reserved.', 'themater');
                    }
                ?> 
            </div>
            
            <?php /* 
                    All links in the footer should remain intact. 
                    These links are all family friendly and will not hurt your site in any way. 
                    Warning! Your site may stop working if these links are edited or deleted 
                    
                    You can buy this theme without footer links online at http://fthemes.com/buy/?theme=realm 
                */ ?>
            
            <div id="credits">
                Powered by <a href="http://wordpress.org/">WordPress</a> | Designed by: <a href="http://www.hairdressingjobs.net">hair dressing jobs</a> | Thanks to <a href="http://www.brisbanejobs.org">brisbane jobs</a>, <a href="http://www.blackpersonals.co.za">black personals</a> and <a href="http://www.eventplanningjobs.net">event planning jobs</a>
            </div><!-- #credits -->
            
        </div><!-- #footer -->
        
    </div><!-- #wrap-footer -->

</div><!-- #container -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>
<?php $theme->hook('html_after'); ?>
</body>
</html>