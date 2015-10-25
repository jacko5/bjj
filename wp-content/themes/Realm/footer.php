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
            
            <?php 
                // This theme is released free for use under creative commons licence. http://creativecommons.org/licenses/by/3.0/
                // All links in the footer should remain intact. 
                // Warning! Your site may stop working if these links are edited or deleted
                //
                // You can buy the link free version of this theme online from http://fthemes.com/buy/
            ?>
            
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