@foreach ($nongsans as $nongsan)
    <div class="col-4 card_product">
        <div class="card">
            <img class="card-img-top" src="{{ asset($nongsan->hinhanh[0]->src) }}" alt="Card image cap">
            <div class="middle d-flex">
                <button onclick="addNongSan({{ $nongsan->id }})" class="middle_cart mx-3"><span class="iconify"
                        data-icon="fa-solid:cart-plus" style="color: #216e38;  font-size: 35px"></span></button>
                <input class="middle_cart mx-3" type="radio"><label class="fas fa-2x fa-heart mt-2">
                    </lable>
                    </input>
            </div>
            <div class="card-body text-center">
                <p class="card-text name_product"> <a
                        href="{{ route('nongsan', ['idNongSan' => $nongsan->id]) }}">{{ $nongsan->tenNongSan }}</a>
                </p>
                <div class="text_price"><span
                        class="mx-4"><b>{{ number_format($nongsan->gia, 0, ',', '.') }}đ</b></span>
                </div>
            </div>
        </div>
    </div>

@endforeach
<script>
    var soLuongNongSan = document.getElementById('soLuongNongSan');
    soLuongNongSan.innerHTML = "{{ count($nongsans) }}"
</script>
