<script>
    $(document).ready(function() {
        $('.ratings_stars').hover(
            function () {
                $(this).prevAll().addBack().addClass('ratings_hover');
            },

            function() {
                $(this).prevAll().addBack().removeClass('ratings_hover');
            }
        );

        $('.ratings_stars').click(function() {
            var checkLogin = '{{ Auth::check() }}';
            if(checkLogin == true) {
                var ratingVal = $(this).find('input').val();
                alert('Cám ơn bạn đã đánh giá bài viết!');
    
                if($(this).hasClass('ratings_over')) {
                    $('.ratings_stars').removeClass('ratings_over');
                    $(this).prevAll().addBack().addClass('ratings_over');
                } else {
                    $(this).prevAll().addBack().addClass('ratings_over');
                }
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
        
                $.ajax({
                    type: 'POST',
                    url: '{{ url('/blog/rate') }}',
                    data: {
                        ratingVal: ratingVal,
                        id_blog: '{{$post->id}}',
                    },
        
                    success: function(res) {
                        console.log(res.message);
                    },
                    error: function () {
                        console.error('Yeu cau that bai.');
                    }
                });
            } else {
                alert('Bạn chưa đăng nhập!');
            }
        });
    });

    var avgRate = '{{ $avgRate ?? 0}}';
    var rounded = Math.round(avgRate);
   
    $('.ratings_stars').each(function(index) {
            if (index < rounded) {
                $(this).addClass('ratings_over');
            }
        });
             
                    



  
</script>