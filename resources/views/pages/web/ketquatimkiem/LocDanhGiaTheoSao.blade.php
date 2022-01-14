<div class="title_BL mx-5">
    <label for="" style="font-size: 15px; font-weight: 800;">Danh sách người đánh giá
        ( {{ count($soBinhLuan) }} đánh giá )</label>
</div>
<div class="nguoi_binhLuan mx-5">

    @foreach ($binhLuans as $item)
        <div class="mx-3 my-2">
            <div class="d-flex user_comment">
                <span class="iconify" data-icon="carbon:user-avatar-filled-alt"
                    style="color: #ffbf00; font-size: 30px;"></span>
                <strong><label class="mx-3" style="position: relative; top: 5px;"
                        for="">{{ $item->user->name }}</label></strong>
                <span for="" style="font-size: 20px;" id="sao_rate">{{ $item->sosao }}</span>
                <span class="iconify mx-1" data-icon="bi:star-fill"
                    style="color: #ffb416; font-size: 17px; position: relative; top: 5px;"></span>
                <label class="mx-3" style="position: relative; top: 5px;"
                    for="">{{ substr($item->created_at, 0, 10) }}</label>
            </div>

            <div class="noidungBL">
                <p id="noidung_BL_text">{{ $item->noidung }}</p>
            </div>
        </div>
    @endforeach
</div>
<!-- Pagination // phân trang button -->
<div class="container pagination  d-flex">
    <nav aria-label="Page navigation example" style="margin: auto;">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php $soLuongTrang = ceil(count($soBinhLuan) / 3); ?>
            <a href=""></a>
            @for ($i = 1; $i <= $soLuongTrang; $i++)

                <li class="page-item "><a id="page-item-{{ $i }}"
                        onclick="callPhanTrang({{ $idNongSan }}, {{ $i }})"
                        class="page-link">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
<!-- Phân trang -->
