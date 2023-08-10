<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    <title>Famms</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    {{-- javascript cdn  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')

    <!-- end why section -->

    <!-- arrival section -->
    @include('home.arrival')

    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->
    <!-- Start Comment section -->
    <div class="py-5 bg-white ">
        <h1 class="pb-5 text-center" style="font-size: 40px; font-weight:bold;">Comment</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 ">
                <form action="{{ route('add.comment') }}" method="POST">
                    @csrf
                    <textarea name="comment" id="" cols="30" rows="5" placeholder="Please input your comment Here!"></textarea>
                    <input type="submit" value="Comment">
                </form>
            </div>
        </div>
        <h2 class="py-5 text-center" style="font-size: 20px; font-weight:bold;">All Comments here!</h2>
        @foreach ($comments as $comment)
            <div class="py-2 row d-flex justify-content-center">
                <div class="col-md-4 ">
                    <b>{{ $comment->name }}</b>
                    <p class="m-0">{{ $comment->comment }}</p>
                    <a href="javascript::void(0)" class="text-primary" onclick="reply(this)"
                        data-CommentId="{{ $comment->id }}">Reply</a>
                    @foreach ($reply as $rep)
                        @if ($rep->comment_id == $comment->id)
                            <div class="p-3 ml-3 bg-light">
                                <b>{{ $rep->name }}</b>
                                <p>{{ $rep->reply }} </p>
                                <a href="javascript::void(0)" class="text-primary" onclick="reply(this)"
                                    data-CommentId="{{ $comment->id }}">Reply</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach


        {{-- reply start --}}
        <div class="row d-flex justify-content-center">
            <div class="p-0 col-md-6 ">
                <div class="replyDiv" style="display: none;">
                    <form action="{{ route('add.reply') }}" method="POST">
                        @csrf
                        <input type="text" name="commentId" id="commentId" hidden>
                        <textarea name="reply" id="" cols="20" rows="5" placeholder="Reply Here..............!"
                            class="m-0"></textarea>
                        <br>
                        <button class="btn btn-sm btn-primary">Reply</button>
                        <a href="javascript::void(0)" class="btn btn-danger btn-sm"
                            onclick="reply_close(this)">Close</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Comment section -->

    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-CommentId');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>

    <!-- SSL COMMERZE SCRIPT -->

</body>

</html>
