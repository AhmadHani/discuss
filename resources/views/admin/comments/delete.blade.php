@foreach($post->comments as $comments)

        {{$comments->comment}}
    <button class="btn btn-danger" onclick="deleteComment('{{$comments->id}}')">Delete</button>
        <button class="btn btn-primary"  data-commentt='{{$comments->getComment($comments)}}' data-target="#editComment" id="edit_button" onclick="hide()" data-toggle="modal"  >Edit</button><br />
        <!-- Button trigger modal -->


        <script>
            function hide(){
                $('#myModal').modal('hide')
                $('#myModal').on('hidden', function () {
                    // Load up a new modal...
                    $('#editComment').modal('show')
                })
            }

            function deleteComment(id){


                $.ajax({
                    url: '/admin/delete/comments/'+id,
                    data: { "_token": "{{ csrf_token() }}" },
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                    }
                });
            }
        </script>
    @endforeach