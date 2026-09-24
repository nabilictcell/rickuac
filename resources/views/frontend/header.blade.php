<div class="header-top bg-theme-color-2 sm-text-center p-0" style="background-color: #921A40 !important;">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="widget no-border m-0">
          <ul class="list-inline font-13 sm-text-center mt-5">
            <li>
              <a class="text-white" href="#">FAQ</a>
            </li>
            <li class="text-white">|</li>
            <li>
              <a class="text-white" href="#">Help Desk</a>
            </li>
            <li class="text-white">|</li>
            <li>
              <a class="text-white" href="{{ route('login') }}">Login</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="widget m-0 pull-right sm-pull-none sm-text-center">
          <ul class="list-inline pull-right">
            <li class="mb-0 pb-0">
              <div class="top-dropdown-outer pt-5 pb-10">
                <a class="top-cart-link has-dropdown text-white text-hover-theme-colored"><i
                    class="fa fa-book font-13"></i></a>

              </div>
            </li>

          </ul>
        </div>
        <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
          <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
            <li><a href="https://www.facebook.com/ku.ac.bd.official/"><i class="fa fa-facebook text-white"></i></a></li>
            {{-- <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li> --}}
            <li><a href="https://www.linkedin.com/school/khulna-university/"><i
                  class="fa fa-linkedin text-white"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="header-middle p-0 bg-lightest xs-text-center">
  <div class="container pt-0 pb-0">
    <div class="row">
      {{-- <div class="col-xs-12 col-sm-4 col-md-5">
        <div class="widget no-border m-0">
          <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="javascript:void(0)">
            <img src="{{ asset('frontend/images/FinalDSA1.jpg') }}" alt="">
          </a>
        </div>
      </div> --}}
      <div class="col-xs-12 col-sm-4 col-md-5">
        <div class="widget no-border m-0" style="display: flex; align-items: center; padding: 10px 0;">
          <a href="{{ route('ict') }}"
            style="display: inline-block; margin-right: 12px; margin-left: 0; padding: 0; flex-shrink: 0;">
            <img src="{{ asset('frontend/images/ku.png') }}" alt="Khulna University"
              style="height: 64px; width: auto; display: block;">
          </a>
          <div style="display: inline-block;">
            <a href="{{ route('ict') }}"
              style="font-weight: bold; font-size: 20px; color: #e41a1a; display: block; line-height: 1.2; text-decoration: none;">𝐑𝐄𝐒𝐄𝐀𝐑𝐂𝐇
              & 𝐈𝐍𝐍𝐎𝐕𝐀𝐓𝐈𝐎𝐍</a>
            <h6 class="font-18"
              style="color: #f4a024; font-family: 'Times New Roman', Times, serif; margin: 3px 0 0 0; line-height: 1.2;">
              Khulna University</h6>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
          <ul class="list-inline">
            <li><i class="fa fa-phone-square text-theme-colored font-36 mt-5 sm-display-block"></i></li>
            <li>
              <a href="#" class="font-12 text-gray text-uppercase">Call us today!</a>
              <h5 class="font-14 m-0"> 02-477734139</h5>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-3">
        <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
          <ul class="list-inline">
            <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>
            <li>
              <a href="#" class="font-12 text-gray text-uppercase">We are open!</a>
              <h5 class="font-13 text-black m-0"> Sun-Thur 9:00 AM -5:00 PM</h5>
            </li>
          </ul>
        </div>
      </div>
      {{-- <div class="col-xs-12 col-sm-4 col-md-3">
        <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
          <ul class="list-inline">
            <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>
            <li>
              <a href="#" class="font-12 text-gray text-uppercase">Address</a>
              <h5 class="font-13 text-black m-0"> ICT CELL, Shahid Taj Uddin Ahmad Administrative Building, (3rd
                Floor),Khulna University, Khulna-9208</h5>
            </li>
          </ul>
        </div>
      </div>
    </div> --}}
  </div>
</div>
<div class="header-nav" style="background-color: #C75B7A !important;">
  <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px"
    style="background-color: #C75B7A !important;">
    <div class="container" style="background-color: #C75B7A !important;">
      <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive"
        style="background-color: #C75B7A !important;">
        <ul class="menuzord-menu">
          <li class="active"><a href="{{ route('ict') }}">Home</a></li>
          <li><a href="#">About Us</a>
            <ul class="dropdown">
              <li><a href="{{ route('get_all_about_us', ['category' => 'vision-and-mission']) }}">Vision and Mission</a>
              </li>
              <li><a href="{{ route('get_all_about_us', ['category' => 'objectives']) }}">Objectives</a></li>
              {{-- <li><a href="{{ route('get_all_about_us',['category'=>'organogram']) }}">Organogram</a></li> --}}
            </ul>
          </li>

          <li><a href="#">Team</a>
            <ul class="dropdown">
              <li><a href="{{ route('get_director_details') }}">Director</a></li>
              <li><a href="{{ route('get_all_team_member', ['type' => 'Joint Director']) }}">Joint Director</a></li>
              <li><a href="{{ route('get_all_team_member', ['type' => 'officer']) }}">Officer</a></li>
              <li><a href="{{ route('get_all_team_member', ['type' => 'staff']) }}">Staff</a></li>
              <li><a href="{{ route('get_all_former_personnel') }}">Honor Board</a></li>
            </ul>
          </li>
          <li><a href="#">Activity</a>
            <ul class="dropdown">
              <li><a href="{{ route('new_activity', ['id' => 1]) }}">News</a></li>
              <li><a href="{{ route('new_activity', ['id' => 2]) }}">Event</a></li>
              <li><a href="{{ route('new_activity', ['id' => 3]) }}">Notice</a></li>
              {{-- <li><a href="{{ route('get_all_activity',['id'=>4]) }}">Hardware</a></li> --}}
            </ul>
          </li>

          <li><a href="#home">Information</a>
            <ul class="dropdown">
              <li><a href="{{ route('get_all_information', ['type' => 'forms']) }}">Forms</a></li>
              {{-- <li><a href="{{ route('get_all_information',['type'=>'event']) }}">Event</a></li>
              <li><a href="{{ route('get_all_information',['type'=>'notice']) }}">Notice</a></li> --}}
              {{-- <li><a href="#">Laws & Rules</a></li> --}}
            </ul>
          </li>
          {{-- <li><a href="citizen/ict-cell">Citizen Charter</a></li> --}}

          {{-- <li><a href="#">Support</a>
            <ul class="dropdown">
              <li><a href="#">Maintenance</a>
                <ul class="dropdown">
                  <li><a href="{{ route('get_all_activity',['id'=>1]) }}">Bug Report</a></li>
                  <li><a href="{{ route('get_all_activity',['id'=>2]) }}">Software</a></li>
                  <li><a href="{{ route('get_all_activity',['id'=>3]) }}">Network</a></li>
                  <li><a href="{{ route('get_all_activity',['id'=>4]) }}">Hardware</a></li>
                </ul>
              </li>

              <li><a href="#">Requests</a>
                <ul class="dropdown">
                  <li><a href="{{ route('get_all_activity',['id'=>5]) }}">New Webmail</a></li>
                  <li><a href="{{ route('get_all_activity',['id'=>6]) }}">New Webprofile</a></li>
                  <li><a href="{{ route('get_all_activity',['id'=>7]) }}">Web Mail Reset</a></li>
                </ul>
              </li>

            </ul>
          </li> --}}
          <li><a href="{{ route('get_all_gallery') }}">Gallery</a></li>
        </ul>
        <ul class="pull-right flip hidden-sm hidden-xs">
          <li>
            <!-- Modal: Book Now Starts -->
            <a class="btn btn-colored btn-flat bg-theme-color-2 text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"
              data-toggle="modal" data-target="#BSParentModal" href="http://ku.ac.bd/"
              style="background-color: #f2184f !important;">Khulna University</a>
            <!-- Modal: Book Now End -->
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>