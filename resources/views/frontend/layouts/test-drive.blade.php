
<style>
    .alert.alert-danger{
        color:red;
    }
</style>

<div class="test_drive_modal">
    <div class="test_drive">
        <div class="test_drive_head">
            <a href="/{{app()->getLocale()}}" class="test_drive_logo">
                <img class="logoDark" src="./assets/images/logo-dark.svg" alt="">
                <img class="logoWhite" src="./assets/images/logo-white.svg" alt="">
            </a>
            <button class="close_testDrive" type="button">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.5 20L4.5 4M20.5 4L4.5 20" stroke="black" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <h2>{{ $settings['test.drive'] }}</h2>
        <div class="short-desc">
            <p>{{ $settings['test.title'] }}</p>
        </div>

        <form action="{{ route('brend', ['language'=>app()->getLocale()]) }}" method="POST" id="testDrive" class="contact-form">
            <div class="form-items">

                @csrf
                <div class="form-item">
                    <label for="">{{ $settings['name'] }} <sup>*</sup></label>
                    <input name="name" type="text" placeholder="{{ $settings['name'] }}">
                     @error('name')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
                </div>
                <div class="form-item">
                    <label for="">{{ $settings['surname'] }} <sup>*</sup></label>
                    <input name="surname" type="text" placeholder="{{ $settings['surname'] }}">
                     @error('surname')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
                </div>
            </div>
            <div class="form-items">
                <div class="form-item">
                    <label for="">{{ $settings['brand'] }} <sup>*</sup></label>
                    <select name="brend_id" id="brand_id" class="nice-select">
                        <option value="">{{ $settings['brand'] }}</option>
                        @foreach ($brends as $brend)
                        <option @selected(request()->brend_id==$brend->id or (isset($productDetail) and  $productDetail->brend_id==$brend->id)) value="{{ $brend->id }}">{{$brend->name }}</option>
                        @endforeach

                            @error('name')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror


                    </select>

                </div>
                <div class="form-item">
                    <label for="">{{ $settings['model'] }} <sup>*</sup></label>
                    <select name="model_id" id="marka_id" class="nice-select">
                        <option value="">{{ $settings['model'] }}</option>
                        @foreach ($models as $model )
                        <option @selected((isset($productDetail) and  $productDetail->model_id==$model->id)) value="{{ $model->id }}">{{ $model->name_az }}</option>
                        @endforeach
                    </select>
                     @error('model_id')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
                </div>
            </div>
            <div class="form-item">
                <label for="">{{ $settings['contact.number'] }} <sup>*</sup></label>
                <input name="phone" type="text" placeholder="{{ $settings['contact.number'] }}">
                 @error('phone')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
            </div>
            <button class="submitTestDrive" type="submit">{{ $settings['send'] }}</button>
        </form>
    </div>
</div>

    <script>
        $(function(){

            $("#brend").on("submit", function(e){
                e.preventDefault();
                let formdata = new FormData(this);
                formdata.append("_token",'{{ csrf_token() }}')
                var _form = this;
                $.ajax({
                    type:"post",
                    data:formdata,
                    processData:false,
                    contentType:false,
                    success:function(e){
                        $(".errorAlert").remove()
                        toastr.success(e.message)
                        _form.reset()
                    },
                    error:function(e){
                       var errors = e.responseJSON.errors;
                        console.log(errors)

                        $(".errorAlert").remove()
                        for ( a in errors){
                            for (b in errors[a]){

                                 $("#testDrive").find("[name='"+a+"']").after("<p class='errorAlert' style='color:red;'>"+errors[a][b]+"</p>")
                            }
                        }

                    }
                })
            })
        })
    </script>



