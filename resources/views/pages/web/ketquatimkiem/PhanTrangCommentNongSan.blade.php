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
