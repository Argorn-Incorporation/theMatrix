<?php  
	if (!(($this->pageName === "login") or ($this->pageName === "register"))) {
?>

	</div>
	<footer id="footer">
		<div id="copyright">
			<span class="blck bold font15">
				P2P (5gh) Recycler
			</span>
			Copyright &copy; <?=date("Y")?>. All rights reserved
		</div>
	</footer>

<?php  
	}
?>

</body>
</html>