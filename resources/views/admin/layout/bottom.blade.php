
<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/plugins.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{ asset('admin/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/assets/js/widgets.js') }}"></script>
<script src="{{ asset('admin/assets/js/lib/vector-map/jquery.vmap.js') }}"></script>
<script src="{{ asset('admin/assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ asset('admin/assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>

<script src="{{ asset('admin/assets/js/popper.min.js')}}"></script>


<script src="{{ asset('admin/assets/js/plugins.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>



<!-- js for chosen file -->
<script src="{{ asset('admin/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

<!-- js for chosen file -->
<script>
    jQuery(document).ready(function() {
        jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Nothing Found!!",
            width: "100%"
        });
    });
</script>

<!-- js for ckeditor -->
<script>
    ClassicEditor
        .create( document.querySelector( '.ckeditor5' ))
        .catch( error => {
            console.error( error );
        } );
</script>


<!-- js for notification  -->
<script>
  const toggleBtn = document.getElementById('toggleBtn');
  const notificationArea = document.getElementById('notificationArea');

  toggleBtn.addEventListener('click', () => {
    if (notificationArea.style.display === 'none') {
      notificationArea.style.display = 'block';
    } else {
      notificationArea.style.display = 'none';
    }
  });
</script>