<div id="footer">

  <div class="footer_links">
    <div class="privacy">
	<?php echo '<a href=' .DIR. 'privacy>Privacy </a> | '; ?>
	<?php echo '<a href=' .DIR. 'eula>End User Licence Agreement </a> | '; ?>
	<a href="http://preview.responsivedeveloper.com/bill-it-mate/">About</a>
    </div>
  </div>
	<div class="copy">
		<p>Bill it mate &copy; James Mcavady the </p> <a href="http://www.responsivedeveloper.com/" target="_blank">
		<div class="footer-copy-logo">
			<img height="50" width="154" src="images/logo_banner-footer.png" alt="Responsive Developer">
		</div>
		</a>
	</div>
</div><!-- end footer -->
<div id="cookieInfo">
	<div class="cookie_accept_button">
	<p>This site uses cookies<?php echo '<a href=' .DIR. 'privacy> Read More</a>'; ?>
		or accept the use of cookies
		<input type="button" id="cookieButtonAccept" value="yes" onclick="cookietoggle(this);">
	</p>
	</div>
</div>
<!--scripts defered -->
<script>
checkCookie();
</script>

</body>
</html>
