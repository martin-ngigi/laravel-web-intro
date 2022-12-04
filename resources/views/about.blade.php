<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>About</h1>

    <!-- Ancho tags -->
    <a href="/about"> About</a> <br>
    <a href="/contact"> Contact</a> <br>

    <p>Current Page Url:</p>
    {{URL::current()}}


    <p>URL Generation Url</p>
    <a href="/url-gen">Url generation</a>

    <p>Previous Page Url</p>
    {{URL::previous()}}
</body>
</html>
