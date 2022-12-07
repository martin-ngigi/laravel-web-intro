<h1>Upload file</h1>
<!-- "/my-upload" is the url that will be called after Upload button is clicked.
check in web.php -->
<form action="/my-upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"><br><br>
    <button type="submit"> Upload</button>

</form>

