<?php
include('../../../inc/includes.php');
Session::checkLoginUser();
?><!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body>
<a id="l" href="yourLink" target="_blank" rel="noopener noreferrer"></a>
<script>
document.getElementById('l').click();
setTimeout(function () { history.back(); }, 100);
</script>
</body>
</html>
