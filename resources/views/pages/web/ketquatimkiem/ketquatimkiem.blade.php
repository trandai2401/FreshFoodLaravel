<div class="row product">
@foreach ($nongsans as $nongsan)
    <div class="col-4 card_product">
        <div class="card">
            <img class="card-img-top" src="{{ asset($nongsan->sr) }}" alt="Card image cap">
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
</div>
<div class="container pagination  d-flex">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php $soLuongTrang = ceil($solUongNongSanLocDuoc / 6); ?>
            @for ($i = 1; $i <= $soLuongTrang; $i++)
                <li onclick="loc('{{$idDanhMuc}}',{{$i}})"  class="page-item @if ($trangDuocChon == $i)phantrang_nongsan @endif"><a id="page-item-{{$i}}" class="page-link"
                        >{{ $i }}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>