<!DOCTYPE html>
<html lang="en">
<head>
    <title>CKEditor Classic Editing Sample</title>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="/Javascript/ckeditor/ckeditor.js"></script>
</head>
<body>
    <form method="post">
        <p>
            My Editor:<br>
            <textarea name="editor1" id="editor1">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
        </p>
        <p>
            <input type="submit">
        </p>
    </form>
</body>
</html>