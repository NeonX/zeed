<?php
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>S022 : ZIP CODE</h1>

<div class="cleaner"></div>
<?php
$display = 'none';
if ($ref) {
    echo '<script type="text/javascript" src="../../libs/jquery/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../../libs/jquery/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="../../libs/jqgrid/i18n/grid.locale-th.js"></script>
    <script type="text/javascript" src="../../libs/jqgrid/jquery.jqGrid.min.js"></script>
    <script type="text/javascript" src="../../libs/fancyBox/source/jquery.fancybox.js"></script>


    <link rel="stylesheet" href="../../libs/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../libs/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../libs/jquery/ui-lightness/jquery-ui-1.8.21.custom.css" type="text/css" />
    <link rel="stylesheet" href="../../libs/jqgrid/jqgrid/ui.jqgrid.css" type="text/css" />

    <link href="../css/default.css" rel="stylesheet" type="text/css" />
    <link href="../css/leftmenu_orange.css" rel="stylesheet" type="text/css" />
    <link href="../css/form.css" rel="stylesheet" type="text/css" media="screen" />';

    $display = 'block';
}
?>
<script type="text/javascript">
    var self = this;
    $(function () {
        self.table = { main: 'province', sub: 'zipcode' };
        self.caption = { main: 'Province List:', sub: 'Zipcode List:' } ;

        self.columns = {
            main: [
                'province_id', 'zone_id', 'province_no', 'province_eng', 'province_th', 
                'deleteflag', 'action'
            ], 
            sub: [
                'zipcode_id', 'province_id','district', 'subdistrict', 'village_no',
                'ems_time', 'ems_fee', 'ems_currencyid', 'norm_time', 'norm_fee',
                'norm_currencyid', 'deleteflag', 'table', 'action'
            ]
        };

        self.colNames = {
            main: [
                'Province ID', 'Zone ID', 'Province Code', 'Province Name (ENG)', 'Province Name (TH)', 
                'Status', 'Action'
            ], 
            sub: [
                'Zip Code ID', 'Province ID','District', 'Sub District', 'Village No',
                'Est Day', 'Charge', 'Cur', 'Est Day', 'Charge', 'Cur',
                'Status', 'Table', 'Mode'
            ]
        };
        
        self.colModel = {
            main: [
                {name: 'province_id', index:'province_id', hidden: true},
                {name: 'zone_id', index:'zone_id', hidden: true},
                {name: 'province_no', index: 'province_no', width: 100, align: 'center'},
                {name: 'province_eng', index: 'province_eng', width: 200, align: 'center'},
                {name: 'province_th', index: 'province_th', width:200, align: 'center'},
                {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
                {name: 'action',index: 'action', width:80, align: 'center'}
            ],
            sub: [
                {name: 'zipcode_id', index:'zipcode_id', width: 65, align: 'center'},
                {name: 'province_id', index:'province_id', editable: true, hidden: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).val(formData.goods_id);
                        }
                    }
                },
                                
                {name: 'district', index:'district', width: 110, editable: true},
                {name: 'subdistrict', index: 'subdistrict', width: 110, editable: true},
                {name: 'village_no', index: 'village_no', width: 107, editable: true},
                {name: 'ems_time', index:'ems_time', width: 50, editable: true, align: 'right'},
                {name: 'ems_fee', index:'ems_fee', width: 50, editable: true, align: 'right'},
                {name: 'ems_currencyid', index:'ems_currencyid', width: 50, editable: true, align: 'center'},
                {name: 'norm_time', index:'norm_time', width: 50, editable: true, align: 'right'},
                {name: 'norm_fee', index:'norm_fee', width: 50, editable: true, align: 'right'},
                {name: 'norm_currencyid', index:'norm_currencyid', width: 50, editable: true, align: 'center'},
                {name: 'deleteflag', index: 'deleteflag', width: 70, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
                {name: 'table', index:'table', editable: true, hidden: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).val(self.table.sub);
                        }
                    }
                },
                {name: 'mode', index:'mode', editable: true, hidden: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).val(self.smode);
                        }
                    }
                }
                //                ,
                //                {name: 'action',index: 'action', width:90, align: 'center'}
            ]
        };
    });

</script>
<script type="text/javascript" src="../<?php echo!$ref ? 'page/' : ''; ?>js/com_type2.js?_=<?php echo time(); ?>"></script>
<style type="text/css">

    select.editable {
        width: 90px;
        margin: 4px;
    }
    input.editable {
        width: 80px;
    }
    .col1 {
        width: 400px;
        float: left;
    }
    .col2 {
        width: 400px;
        float: left;
    }

    .grid {
        clear: both;
        width: 820px;
        float: left;
        margin-top: -30px;
    }
</style>

<table id="list-province"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S022 : ZIP CODE (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="province_no">Province Code: </label>
                <input id="provinceNo" name="province_no" type="text" />
            </p>
            <p>
                <label for="province_eng">Province Name (ENG): </label>
                <input id="provinceEng" name="province_eng" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body col2">
            <p>
                <label for="zone_id">Zone: </label>
                <input id="zoneId" name="zone_id" type="text" />
            </p>
            <p>
                <label for="province_th">Province Name (TH): </label>
                <input id="provinceTh" name="province_th" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-zipcode"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;"></fieldset>
    </form>
</div>