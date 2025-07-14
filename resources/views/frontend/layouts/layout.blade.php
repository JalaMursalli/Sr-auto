<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/jquery-nice-select-1.1.0/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/select2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/swiper/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/index.css') }}">

     <link rel="shortcut icon" type="image/png" href="{{asset($logo->fav_icon)}}">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>

    @include('frontend.layouts.navbar')
    @yield('content')
    @if (Route::getCurrentRoute()->getName() != 'success' && Route::getCurrentRoute()->getName() != 'contact.us')
        @include('frontend.layouts.banner')
    @endif
    @include('frontend.layouts.footer')
    @include('frontend.layouts.test-drive')
    @include('frontend.layouts.mobile-menu')

    <script src="{{ asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/select2/select.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select.nice-select').niceSelect();
            $('select.select2').select2();
        });
    </script>
    <script src="{{ asset('frontend/assets/swiper/swiper.js') }}"></script>
    <script src="{{ asset('frontend/assets/index.js') }}"></script>




     <script>
        $(function(){

             $("#testDrive").on("submit", function(e){
                e.preventDefault();
                let formdata = new FormData(this);
                formdata.append("_token",'{{ csrf_token() }}')
                formdata.append('brend_id',$("#testDrive").find('[name="brend_id"]').siblings('.nice-select').find('.selected').attr('data-value'))
                formdata.append('model_id',$("#testDrive").find('[name="model_id"]').siblings('.nice-select').find('.selected').attr('data-value'))
                var _form = this;
                $.ajax({
                    url:"{{ route('testDrive', ['language'=>app()->getLocale()])}}",
                    type:"post",
                    data:formdata,
                    processData:false,
                    contentType:false,
                    success:function(e){
                        $(".errorAlert").remove()
                        toastr.success(e.message)
                        _form.reset();
                        window.location.href="/{{app()->getLocale()}}/success"
                    },
                    error:function(e){
                       var errors = e.responseJSON.errors;
                        console.log(errors)
                        $(".errorAlert").remove()

                        for ( a in errors){
                            for (b in errors[a]){
                                 toastr.error(errors[a][b])
                                 $("#testDrive").find("[name='"+a+"']").after("<p class='errorAlert' style='color:red;'>"+errors[a][b]+"</p>")
                            }
                        }



                    }
                })
            })
        })
    </script>


</body>

</html>
