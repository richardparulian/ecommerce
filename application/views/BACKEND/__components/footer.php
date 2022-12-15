<!-- /.content-wrapper -->
<footer class="main-footer text-sm no-print" >
    <strong>Copyright &copy; 2022 Triquetra</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('@static_backend/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('@static_backend/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('@static_backend/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('@static_backend/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('@static_backend/plugins/select2/js/select2.full.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('@static_backend/plugins/sparklines/sparkline.js'); ?>"></script>

<!-- JQVMap -->
<!-- <script src="<?php echo base_url('@static_backend/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('@static_backend/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script> -->

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('@static_backend/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('@static_backend/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('@static_backend/plugins/daterangepicker/daterangepicker.js'); ?>"></script>

<!-- Summernote -->
<script src="<?php echo base_url('@static_backend/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('@static_backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('@static_backend/js/adminlte.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('@static_backend/js/demo.js'); ?>"></script>


<!-- <script src="<?php echo base_url('@static_backend/js/pages/dashboard.js'); ?>"></script> -->

<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url('@static_backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>">
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>



<!-- DataTables -->
<script src="<?php echo base_url('@static_backend/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('@static_backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('@static_backend/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('@static_backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url('@static_backend/plugins/dropzone/min/dropzone.min.js'); ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('@static_backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url('@static_backend/plugins/bs-stepper/js/bs-stepper.min.js'); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('@static_backend/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('@static_backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'); ?>">
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Page specific script -->
<script>

    Dropzone.autoDiscover = false;
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;    
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Product_controller/store_pic')?>',
                    data: {name: name,request: 2},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });

$('.summernote').summernote({height: 300},'code');
$(function() {
$('#category').change(function () {
 var idcat =  $('#category').val();

     $.ajax({
         type: "POST",
         url: '<?php echo base_url('Product/get_subcategory')?>', 
         data: {idcat : idcat},
         dataType: 'json',
         cache:false,
         success: 
         function(response){
            var len = response.length;

            $("#subcategory").empty();
      
            for( var i = 0; i < len; i++){
                var id = response[i]['SubCategoryID'];
                var name = response[i]['SubCategoryName'];

                $("#subcategory").append("<option value='"+id+"'>"+name+"</option>");

            }
          }
      })


})
    
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
        "stateSave": true,
        "paging": true,
        
    });

    $("#exampleScroll").DataTable({
        "responsive": false,
        "autoWidth": true,
        "stateSave": true,
        "paging": true,
        "scrollX": true,
        
    });



    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });


});

$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>

<script>
$(function() {
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf(
                        'month')
                ]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )



    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('#my-colorpicker1').colorpicker()
    //color picker with addon
    $('#my-colorpicker2').colorpicker()

    $('#my-colorpicker2').on('colorpickerChange', function(event) {
        $('#my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });



    $('#memTable').DataTable({
      "stateSave": true,
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
         'url':'<?php echo base_url()?>Member/get'
      },
      'columns': [

       {
            data : 'CustomerID',
            render:function(data, type, row)
            {
                return '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_show" onclick="look('+data+')" >History</button';
            },
       },
         { data : 'created_at',
         render: function(data){
            return moment(data).format('D MMMM YYYY','Do MMM YYY','fr');
         }
        },
         { data: 'CustomerName' },
         { data: 'Email' },
         { data: 'NoHp' },
         { data: 'BirthDate',
           render: function(data){
            return moment(data).format('D MMMM YYYY','Do MMM YYY','fr');
         }

          },
         { data : 'TotalPoin',render: $.fn.dataTable.render.number( ',' ) }
      ]
    });

})


</script>

<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
        Toast.fire({
            title: 'Congratulation! ',
            text: flashData,
            icon: 'success'
        });
    }

    const flashError = $('.flash-error').data('flashdata');

    if (flashError) {
        Toast.fire({
            title: 'Sorry!',
            text: flashError,
            icon: 'error'
        });
    }

    $('.swt').on('click', function(e) {

        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to end session!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'black',
            cancelButtonColor: 'black',
            confirmButtonText: 'Yes, sign out!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })

    $('.swalDefaultInfo').click(function() {
        Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });


    $('.swalDefaultWarning').click(function() {
        Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultQuestion').click(function() {
        Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
})
</script>

<script type="text/javascript">
function readURL(image) {
    if (image.files && image.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.img-thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(image.files[0]);
    }
}

$("input[name='image']").change(function() {
    readURL(this);
});

function goBack() {
    window.history.back();
}


</script>

</body>

</html>