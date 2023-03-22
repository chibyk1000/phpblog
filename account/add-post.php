<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './includes/links.php'
    ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>Add-post</title>
</head>

<body>
    <div class="flex min-h-screen">
        <?php include './includes/sidenav.php' ?>
        <div class="w-full grid place-items-center min-h-screen">

            <div class="bg-white shadow-md w-2/3 mx-auto p-3 border">
                <form action="" class="frm">
                    <h1 class="text-center font-bold text-3xl">ADD POSTS</h1>
                    <div>
                        <label for="" class="font-bold">Title</label>
                        <input type="text" placeholder="Title" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 block w-full" id="title" required>
                    </div>
                    <input type="hidden" value="<?php echo $id ?>">

                    <div>
                        <label for="" class="font-bold">Image:</label>
                        <input type="file" class=" my-3 h-12 focus:outline-none  pl-2 block w-full" id="file" required>
                    </div>

                    <div id="editor">

                    </div>

                    <button class="bg-rose-500 my-2 px-5 py-1 text-white rounded">submit</button>

                    <p class="message text-blue-300"></p>
                </form>
            </div>



        </div>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });


        $(document).ready(function() {
            $('.frm').submit(function(e) {

                e.preventDefault();
                let title = $('#title').val()
                let content = $('#editor').html()
                let files = $('#file')[0].files[0]
                const formdata = new FormData()
                formdata.append('title', title)
                formdata.append('content', content)
                formdata.append('image', files)
                // $.ajax({
                //     type: "POST",
                //     url: "./includes/add-post.php",
                //     data: {
                //         title: $('#title').val(),
                //         content: $('#editor').html()
                //     },
                //     dataType: "json ",
                //     success: function(resp) {
                //         console.log(resp)
                //     },
                //     error: function(err) {

                //     }
                // });
                fetch('./includes/add-post.php', {
                    method: 'POST',
                    body: formdata
                }).then(function(res) {

                    return res.text()
                }).then(function(data) {

                    if (data !== 'success') {
                        $('.message').text(data)
                        $('.message').addClass('text-red-500')
                        return
                    }
                    $('.message').text(data)
                    $('.message').addClass('text-green-500')

                }).catch(function(err) {
                    console.log(err.message)

                })


            });
        });
    </script>

</body>

</html>