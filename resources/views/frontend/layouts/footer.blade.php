<footer>
    <div class="footer-container">
        <div class="reserved">
            <p>{{ $settings['copy.right'] }} © 2024</p>
            <a href="">166Tech</a>
        </div>
        <a href="{{route('contact.us')}}" class="footer-link">
            {{ $settings['contact.us'] }}
        </a>
        {{--<div class="footer-right">
            <div class="socials">
                @foreach ($socials as $social)
                <a href="{{$social->url}}" class="social-item">
                    <img src="{{asset($social->icon)}}" alt="">
                </a>
                @endforeach
            </div>
            <a href="" class="footer-phone">
                *{{$logo->phone_title}}
            </a>
        </div>--}}
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
            let notFoundText = "{{ $settings['not_found_model'] }}";
            let locale = "{{ app()->getLocale() }}";

            $('#brand_id').change(function() {
                let modelSelect = $('#marka_id');
                modelSelect.empty();

                $.ajax({
                    type: "GET",
                    url: '/get-models/' + this.value,
                    success: function(data) {
                        if (data.length > 0) {
                            $.map(data, function(a) {
                                modelSelect.append(
                                    '<option value="' + a.id + '">' + a['name_' +
                                        locale] + '</option>'
                                );
                            });
                        } else {
                            modelSelect.append('<option>' + notFoundText + '</option>');
                        }

                        modelSelect.niceSelect('update');
                    }
                });
            });
        });
</script>
