<script src="{{ asset('admin/js/jquery.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('admin/js/owl.carousel.js') }}" ></script>
<script src="{{ asset('admin/js/jquery.customSelect.min.js') }}" ></script>
<script src="{{ asset('admin/js/respond.min.js') }}" ></script>

<!--right slidebar-->
<script src="{{ asset('admin/js/slidebars.min.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('admin/js/common-scripts.js') }}"></script>

<!--script for this page-->
<script src="{{ asset('admin/js/sparkline-chart.js') }}"></script>
<script src="{{ asset('admin/js/easy-pie-chart.js') }}"></script>
<script src="{{ asset('admin/js/count.js') }}"></script>
<!--Toastr Notification -->
<script type="text/javascript" src="{{asset('admin/js/toastr.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
<script>

  $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true,
          autoPlay:true

      });
  });

  //custom select box

  $(function(){
      $('select.styled').customSelect();
  });

  $(window).on("resize",function(){
      var owl = $("#owl-demo").data("owlCarousel");
      owl.reinit();
  });

</script>
