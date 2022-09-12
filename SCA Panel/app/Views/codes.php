`<style type="text/css">
.copyclipicon {
    cursor: pointer;
    position: relative;
    top: 10px;
    right: 15px;
}
.breadcrumb-header {
    margin-bottom: 0px!important;
}

.customanchor
{
    color: #0d6efd !important;
    text-decoration: underline;
}
.customanchor:hover
{
    color: #fff !important;
    text-decoration: none;
}

.nopaadding 
{
    padding: 0px !important;
}
.nopaadding a 
{
        padding: 25px;
}

</style>

<!-- main-content -->
<div class="main-content app-content">

    <!-- container -->
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between" >
            <div class="left-content">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="<?php echo base_url("dashboard"); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">M3U Files</li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
            <div class="justify-content-center mb-2">
                    <a href="<?php echo base_url('geneartenewcodes');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <!-- /breadcrumb -->

            <!-- Row -->
            <div class="row">                          
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-xxl-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div class="table-responsive  deleted-table">
                                <table id="listcodesdata" class="listcodesdata dataTables_wrapper dt-bootstrap5 no-footer table-bordered text-nowrap key-buttons border-bottom" style="width:100%">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Group</th>
                                            <th>File Path</th>
                                            <th >Status</th>
                                            <th>EPG Link</th> 
                                            <th>Total Codes</th>               
                                            <th>Expiry Date</th>                
                                            <th>Created On</th>             
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
    </div>
    <!-- /Container -->
</div>
<!-- /main-content -->



    <?php 
        $siteURL = site_url();
        $bar = "/";
        if(substr($siteURL, -1) == "/")
        {
        $bar =  "";
        }
        $siteURL = $siteURL.$bar;
    ?>

<script>

    var site_url = "<?php echo $siteURL; ?>";

    $(document).ready( function () {

    $('#listcodesdata').DataTable({
        lengthMenu: [[ 10, 30, 50,100], [ 10, 30,50,100]], // page length options
        bProcessing: true,
        serverSide: true,
        "order": [[ 0, 'desc' ]],
        /* dom: 'Bfrtip',*/
        
    
        scrollCollapse: false,
        ajax: {
        url: site_url + "load-data-for-list", // json datasource
        type: "post",
        data: {
            //orderby: "desc"
        }
        },
        columns: [
        { data: "id" },
        { data: "title" },
        { data: "groupname"},
        { data: "filepath" },
        { data: "status" },
        { data: "totalcodes" },
        { data: "exformatted_date" },
        { data: "formatted_date" },

        ],
        columnDefs: [
        
        { 
            targets:0,
            className:"nopaadding",
            render: function ( data, type, row, meta ) {

                data = '<a href="<?php echo base_url('/managerecords'); ?>/'+row.id+'" class="customanchor" data-toggle="tooltip" data-placement="top" title="View Codes">'+row.id+'</a>';
                return data;
            }

        }, 

        {
                orderable: false,
                targets:1,
                render: function ( data, type, row, meta ) {

                    
                  
                    let result = make_firstlettercapital(row.title);//.toUpperCase();
                    
                    return  result;
                }
            },
        { 
            orderable: false,
            targets:2,
            render: function ( data, type, row, meta ) {
                if(row.title === ''){
                    data = "n/A";
                }
                
                return data;
            }

        },
        {
            targets:3,
            render: function ( data, type, row, meta ) {
            linkwillbe = row.filepath;
            if(row.filetype == 0)
            {
                linkwillbe = "<?php echo base_url("public/uploads/M3U"); ?>/"+row.filepath;
            }

            data = '<div class="row">';
            data+= '<div class="col-md-11 col-xl-11 col-lg-10 col-sm-12">';
            data+= '<input id="path'+row.id+'" type="text" class="form-control" style="width: 17pc;" name="filepath" value="'+linkwillbe+'" readonly>';
            data+= '</div>';
            data+= '<div class="col-md-1 col-xl-1 col-lg-2 col-sm-12">';
            data+= '<span id="path'+row.id+'-holder"><i class="fas fa-copy copyclipicon" style="font-size: 20px; " data-bs-original-title="Copy Link" aria-label="Copy Link" onclick="copyToClipboard(\'#path'+row.id+'\')"></i></span>';
            data+= '</div>';
            data+= '</div>';
            $(".copyclipicon").attr('data-bs-original-title', "Copy Link").attr('aria-label', "Copy Link").tooltip("hide");

            return data;
            }


        },
        { 
            orderable: false,
            targets:4,
            render: function ( data, type, row, meta ) {
                
                custstatus = "";
                if(row.expiry_date != "")
                {
                        x = new Date();
                        y = new Date(row.expiry_date);  
                        curentdatetime = x.getFullYear()+"/"+(x.getMonth() + 1)+"/"+x.getDate();
                        storedtime = y.getFullYear()+"/"+(y.getMonth() + 1)+"/"+y.getDate();
                        curtimestamp = new Date(curentdatetime).getTime();
                        storetimestamp = new Date(storedtime).getTime();

                    if(curtimestamp > storetimestamp)
                    {

                        custstatus = "y";
                    }
                }
                

                linkclass = "primary";
                if(data === 'inactive'){
                    linkclass = "secondary";
                }

                if(custstatus == "y")
                {
                    linkclass = "danger";
                    data = "expired";
                }

                data = '<span class="badge badge-pill bg-'+linkclass+' me-1 my-2">'+data+'</span>';
                
                return data;
            }

        },


        { 
            orderable: false,
            targets:5,
            render: function ( data, type, row, meta ) {
                data ="";
                if(row.epglink !='' && row.epglink !=null){
                    data = '<input type="text" value="'+row.epglink+'" class="form-control" style="width:14pc;" readonly>';
                }
                return data;
            }

        },

        { 
            orderable: false,
            className:"nopaadding",
            targets:6,
            render: function ( data, type, row, meta ) {
                data = '<a href="<?php echo base_url('/managerecords'); ?>/'+row.id+'" class="customanchor" data-toggle="tooltip" data-placement="top" title="View Codes">'+row.totalcodes+'</a>';
                return data;
            }

        },


        { 
            orderable: false,
            targets:7,
            render: function ( data, type, row, meta ) {
                data = row.exformatted_date;
                return data;
            }

        },

        { 
            orderable: false,
            targets:8,
            render: function ( data, type, row, meta ) {
                data = row.formatted_date;
                return data;
            }

        },

        { 
            orderable: false,
            targets:9,
            render: function ( data, type, row, meta ) {
                data ='<a href="<?php echo base_url('/managerecords'); ?>/'+row.id+'"class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View Codes"><i class="fas fa-external-link-alt"></i></a>';
                data+='&nbsp;&nbsp;<a href="<?php echo base_url('editfile/');?>/'+row.id+'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                data+='&nbsp;&nbsp;<a href="#" class="btn btn-danger btn-sm" data-fileid="'+row.id+'" onclick="fun_deletefiledata(event,'+row.id+');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" ></i></a>';
                
                return data;
            }

        },
        { 
        orderable: false,
        targets:[1,2,3,4,5,6,7,8,9],

        },
        
        ],
        
        bFilter: true, // to display datatable search
    });

    function make_firstlettercapital(str) {
      strVal = '';
      str = str.split(' ');
      for (var chr = 0; chr < str.length; chr++) {
        strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' '
      }
      return strVal
    }

});


function copyToClipboard(element) {

    var $temp = $("<input>");
    $("body").append($temp);
    console.log(element);                       
    $temp.val($(element).attr('value')).select();
    document.execCommand("copy");
    $temp.remove();
    $(element+"-holder .copyclipicon").removeClass("fa-copy");
    $(element+"-holder .copyclipicon").addClass("fa-check-circle");
    $(element+"-holder .copyclipicon").attr('data-bs-original-title', "Copied").attr('aria-label', "Copied").tooltip('show');
    setTimeout(function(){
    $(element+"-holder .copyclipicon").removeClass("fa-check-circle");
    $(element+"-holder .copyclipicon").addClass("fa-copy");
    $(element+"-holder .copyclipicon").attr('data-bs-original-title', "Copy Link").attr('aria-label', "Copy Link");
    }, 1000);   
}


function fun_deletefiledata(e,fileid)
{
    e.preventDefault();

    swal({
        title: "Are you sure you want to delete?",
        text: "Note: Once it's deleted, all related codes will be delete too",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => 
    {
        if (willDelete) 
        {
            swal.close();

            swal({
                text: 'Processing....',
                showCancelButton: false,
                showConfirmButton: false,
                buttons: false

            });

            jQuery.ajax({
                type:"POST",
                url:'<?php echo base_url("/deletefiledata"); ?>',
                data:
                {
                    action:"deletefiledata",
                    fileid:fileid,
                },
                success:function(response)
                {
                    swal.close();
                    if(response != "")
                    {
                        var obj = $.parseJSON(response);  
                        if(obj.result == "error")
                        {
                            swal({
                                title: "Error",
                                text: obj.message,
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            });
                        }
                        else
                        {
/*                                  setTimeout(function(){*/
                            swal({
                            title: "Success!",
                            text: obj.message,
                            type: "success"
                            }).then(function() {
                            window.location = "<?php echo base_url('/codes'); ?>";
                            });
/*                                           }, 1000);*/
                        }
                    }
                },
            });  
        }
    });
}   
</script>
