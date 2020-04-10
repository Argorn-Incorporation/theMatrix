<?php  
	if (!(($this->pageName === "login") or ($this->pageName === "register"))) {
?>

	</div>
	<footer id="footer">
		<div id="copyright">
			<span class="blck bold font15">
				<?=APP_NAME?>
			</span>
			Copyright &copy; <?=date("Y")?>. All rights reserved
		</div>
	</footer>

<?php  
	}
?>

</body>
</html>