        {{-- <div class="container list">
            @php
                $image = DB::table('announcement')
                    ->where('id', $announcement->id)
                    ->first();
                $images = explode('|', $image->images);
            @endphp
            @foreach ($images as $image)
                <img src={{ URL::to($image) }} style="height:100px;width:100px;" />
@php
    dd($announcements)
@endphp
                <br />
            @endforeach
        </div>
    </body>

    </html> --}}


        @php
             $image = DB::table('announcement')->where('id', $announcement->id)->first();
            $images = explode('|', $image->image);
        @endphp
        @foreach ($images as $image)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ URL::to($image) }}" style="display: block; width:100%; max-height: 300px;" alt="images">
            </div>
        @endforeach
