</div>
</div>
</div>
<a href="#" id="back-to-top" title="Back to top">&uarr;</a>
<script>
// back-to-top button
(function() {
	var btn = document.getElementById('back-to-top');
	window.addEventListener('scroll', function() {
		btn.style.display = window.scrollY > 300 ? 'block' : 'none';
	});
})();
// exclusive-open js to auto-close all other menu pop-ups
// purely addon, still lets menus accessible under noscript situations
(function() {
	var menus = document.querySelectorAll('.menubar > details.menu');
	menus.forEach(function(menu) {
		menu.addEventListener('toggle', function() {
			if (menu.open === false) return;
			menus.forEach(function(other) {
				if (other !== menu) other.removeAttribute('open');
			});
		});
	});
	document.addEventListener('click', function(event) {
		menus.forEach(function(menu) {
			if (menu.contains(event.target) === false) menu.removeAttribute('open');
		});
	});
})();
</script>
<?php wp_footer(); ?>
</body>
</html>