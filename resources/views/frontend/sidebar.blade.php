<div class="widget block" style="margin-top:5% ;">
    <h2 class="widget-title btn-primary" style="padding:10px;">Notice Board</h2>
    <div class="categories">
      <?php
        $notices = DB::table('new_activity')->where('category_id',3)->orderby('id','DESC')->limit(5)->get();
      ?>
        <ul class="list-border">
          @foreach ($notices as $item)
           <li><a href="{{ ($item->attachment)?asset($item->attachment):route('get_information_details',['infotype'=>$item->category,'slug'=>$item->slug]) }}" style="color:#337ab7 !important;">{{ $item->title }}</a></li>
          @endforeach
        </ul>
    </div>
  </div>
  <div class="widget block">
    <h2 class="widget-title btn-success" style="padding:10px;">Quicklinks</h2>
    <div class="categories">
      <?php
      $quicklinks = DB::table('ict_quicklinks')->get();
      ?>
      <ul class="list-border">
        @foreach ($quicklinks as $item)
        <li><a href="{{ $item->link }}">{{ $item->title }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
