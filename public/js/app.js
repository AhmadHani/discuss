$(document).ready(function() {
    $('#showPostsUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var user = button.data('user');// Extract info from data-* attributes
        var modal = $(this);
        modal.find('.modal-body').html(recipient);
        modal.find('.modal-title').html("Posted By " + user);

    });

    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var post_name = button.data("post_name");
        var comment = button.data('comment');
        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-body').html(comment);

        modal.find('.modal-title').html("Comments Post :" + post_name);

    });
    $('#showCommentsUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever');
        var user = button.data('user');// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-body').html(recipient);
        modal.find('.modal-title').html("Comments By " + user);
    });


    $('#editCategory').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var category_name = button.data('name');
        var category_slug = button.data('slug');

        var modal = $(this);
        modal.find('.input_text').val(category_name);
        modal.find(".slug").val(category_slug);

    });


    $('#editPost').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var post_title = button.data('title');
        var post_body = button.data('body');

        var post_slug = button.data('slug');
        var modal = $(this);
        modal.find('.title').val(post_title);
        modal.find(".body").val(post_body);
        modal.find(".slug").val(post_slug);


    });
    $('#editComment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var comment = button.data('commentt');

        var modal = $(this);
        modal.find('.modal-body').html(comment);


    });
    $('#editUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var user = button.data('user');

        var modal = $(this);
        modal.find('.modal-body').html(user);


    });




    $("#edituser").submit(function (e) {

        e.preventDefault();
        var formData = new FormData();
        formData.append("name", $("#_name").val())
        $.ajax({
            url: "/admin/update/user",
            method: "post",
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            data: formData,
            success: function (data) {
                return false;
            },
            error: function () {
                return false;
            }

        });

    });
    $("#editpost").submit(function (e) {


        var formData = new FormData();
        formData.append("title", $("#_title").val());
        $.ajax({
            url: "/admin/edit/posts",
            method: "post",
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            data: formData,
            success: function (data) {

            },
            error: function () {
            }

        });

    });
    $("#editcomment").submit(function (e) {


        var formData = new FormData();
        formData.append("title", $("#_title").val());
        $.ajax({
            url: "/admin/update/comment",
            method: "post",
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            data: formData,
            success: function (data) {

            },
            error: function () {
            }

        });

    });
    $('#replyComment').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var comment_user = button.data('comment_user');
        var _comment = button.data("_comment");
        var comment_id = button.data("comment_id");
        var post_id = button.data("post_id");
        var modal = $(this);
        modal.find('.modal-title').html("Reply to comment written by "+comment_user);
        modal.find(".comment").html('"'+ _comment +'"');
        modal.find(".id").val(comment_id);
        modal.find(".post_id").val(post_id);


    });

    $('#showFollowers').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var followers = button.data('whatever');

        var modal = $(this);
        modal.find('.modal-body').html(followers);


    });
    $('#showLikesPost').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var likes = button.data('likes');

        var modal = $(this);
        modal.find('.modal-body').html(likes);


    });
    $('#editProfile').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var user = button.data('user');

        var modal = $(this);
        modal.find('.modal-body').html(user);


    });
});
$(document).ready(function(){
    $('[data-toggle="offcanvas"]').click(function(){
        $("#navigation").toggleClass("hidden-xs");
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    });
});


