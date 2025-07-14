<div class="product-calculator">
    <h2 class="product-calculator-title">{{ $settings['installment_purchase_calculator'] }}</h2>
    <form class="product-calculator-box" id="installmentCalculator">
            <div class="initial_payment">
                <label for="initial_payment">{{ $settings['initial.payment'] }}</label>
                <select name="initial_payment" id="initial_payment" class="nice-select">
                    <option value="0">0%</option>
                    <option value="10">10%</option>
                    <option value="15">15%</option>
                    <option value="20">20%</option>
                </select>
            </div>
            <div class="calculator-months">
                <div class="month-item">
                    <label for="">6%</label>
                    <div class="month-count">
                        <input type="radio" name="month" value="6">
                        <p>6 {{ $settings['month'] }}</p>
                    </div>
                </div>
                <div class="month-item">
                    <label for="">9%</label>
                    <div class="month-count">
                        <input type="radio" name="month" value="9">
                        <p>9 {{ $settings['month'] }}</p>
                    </div>
                </div>
                <div class="month-item">
                    <label for="">12%</label>
                    <div class="month-count">
                        <input type="radio" name="month" value="12">
                        <p>12 {{ $settings['month'] }}</p>
                    </div>
                </div>
                <div class="month-item">
                    <label for="">15%</label>
                    <div class="month-count">
                        <input type="radio" name="month" value="15">
                        <p>15 {{ $settings['month'] }}</p>
                    </div>
                </div>
                <div class="month-item">
                    <label for="">18%</label>
                    <div class="month-count">
                        <input type="radio" name="month" value="18">
                        <p>18 {{ $settings['month'] }}</p>
                    </div>
                </div>
            </div>
            <div class="monthly_payment">
                <span>{{ $settings['monthly'] }}</span>
                <p id="monthly_amount">0 {{ $settings['azn'] }}</p>
            </div>
    </form>
    <div class="calculator-notification">
        <p>{{ $settings['order.commission'] }}</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


    $(function(){

        $('#installmentCalculator').on('change', 'select, input', function () {

        let initialPayment = $('#initial_payment').val();
        let month = $('input[name="month"]:checked').val();

        if (!month || !initialPayment) return;

        $.ajax({
            url: "{{ route('calculate.installment', ['id'=>$productDetail->id]) }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                initial_payment: initialPayment,
                month: month
            },
            success: function (response) {
                $('#monthly_amount').text(response.monthly_payment + ' AZN');
            }
        });
        });



        const $firstCheckbox = $('.month-item:first-child input[name="month"]');
        $firstCheckbox.prop('checked', true).trigger('change');

    })




</script>





