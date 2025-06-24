<div class="contact-suggest-complains">
        <div class="suggest-complains-content">
            <h2>{{$contact_info->title}}</h2>
            <div class="desc">
                <p>{{$contact_info->description}}</p>
            </div>
        </div>
        <form class="contact-form" action="" method="POST" id="contactForm">
             @csrf
            <div class="form-items">
                <div class="form-item">
                    <label for="">{{$settings['name']}} <sup>*</sup></label>
                    <input type="text" name = 'name' placeholder="{{$settings['name']}}">
                    @error('name')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
                </div>
                <div class="form-item">
                    <label for="">{{$settings['surname']}} <sup>*</sup></label>
                    <input type="text" name = 'surname' placeholder="{{$settings['surname']}}">
                     @error('surname')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
                </div>
            </div>
            <div class="form-items">
                <div class="form-item">
                    <label for="">{{$settings['email']}} <sup>*</sup></label>
                    <input type="text" name = 'email' placeholder="{{$settings['email']}}">
                     @error('email')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
                </div>
                <div class="form-item">
                    <label for="">{{$settings['application.type']}} <sup>*</sup></label>
                    <select name="application_type" id="" class="nice-select">
                        <option value="">{{$settings['choose']}}</option>
                        <option value="offer">{{$settings['offer']}}</option>
                        <option value="complain">{{$settings['complain']}}</option>
                    </select>
                </div>
            </div>
            <div class="form-item">
                <label for="">{{$settings['note']}} <sup>*</sup></label>
                <textarea name="text" id="" placeholder="{{$settings['note']}}"></textarea>
                  @error('text')
                    <div class="error-message"><p style="color: red">{{ $message }}</p></div>
                @enderror
            </div>
            <button class="submitContact" type="submit">{{$settings['send']}}</button>
        </form>
    </div>
    <script>
        $(function(){

            $("#contactForm").on("submit", function(e){
                e.preventDefault();
                let formdata = new FormData(this);
                formdata.append("_token",'{{ csrf_token() }}')

                  formdata.append('application_type',$("#contactForm").find('[name="application_type"]').siblings('.nice-select').find('.selected').attr('data-value'))


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
                        $(".errorAlert").remove()
                        for ( a in errors){
                            for (b in errors[a]){
                                   toastr.error(errors[a][b])
                                 $("#contactForm").find("[name='"+a+"']").after("<p class='errorAlert' style='color:red;'>"+errors[a][b]+"</p>")
                            }
                        }

                    }
                })
            })
        })
    </script>
