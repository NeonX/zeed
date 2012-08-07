<div class="h_line"></div>
<h1>Welcome to "SmartOrder" </h1>

<div class="cleaner"></div>

<table id="list1"></table>
<div id="pager1"></div>

<script type="text/javascript">

    jQuery("#list1").jqGrid({ 
        url:'../page/sample.php',
        datatype: "xml",
        height:220,
        colNames:['Id','Product Name', 'Price', 'Amount','Date'],
        colModel:[ {name:'id',index:'id', width:83},
            {name:'pname',index:'pname', width:200},
            {name:'price',index:'price', width:120},
            {name:'amt',index:'amt', width:120, align:"right"},
            {name:'date',index:'date', width:120, align:"right"} ],
        rowNum:10,
        autowidth: true,
        shrinkToFit:false,
        rowList:[10,20,30],
        pager: jQuery('#pager1'),
        sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"XML Example"
    })
    .navGrid('#pager1',{edit:false,add:false,del:false,search:true,refresh:true}); 
</script>




