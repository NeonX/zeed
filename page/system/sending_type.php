<?php
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>S030 : SENDING TYPE & STATUS</h1>

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
        self.table = { main: 'sendingtype', sub: 'sendstatus' };
        self.caption = { main: 'Sending Type List:', sub: 'Send Status List:' } ;

        self.columns = {
            main: [
                'sendingtype_id', 'sendtype_code', 'sendtype_eng', 'sendtype_th', 'sendtype_desc', 
                'deleteflag', 'action'
            ], 
            sub: [
                'sendstatus_id', 'sendingtype_id','sendstatus_seq', 'sendstatus_eng', 
                'sendstatus_th',  'deleteflag', 'table', 'action'
            ]
        };

        self.colNames = {
            main: [
                'Sending Type ID', 'Sendtype Code', 'Sendtype (ENG)', 'sendtype (TH)', 'Send Type Desc', 
                'Status', 'Action'
            ], 
            sub: [
                'Send Status ID', 'Sending Type ID','Send Status Seq', 'Send Status (ENG)', 'Send Status (TH)',
                'Status', 'Table', 'Mode'
            ]
        };

        self.colModel = {
            main: [
                {name: 'sendingtype_id', index:'sendingtype_id', hidden: true},
                {name: 'sendtype_code', index:'sendtype_code', align: 'center'},
                {name: 'sendtype_eng', index:'sendtype_eng', width: 180, align: 'center'},
                {name: 'sendtype_th', index: 'sendtype_th', width: 180, align: 'center'},
                {name: 'sendtype_desc', index: 'sendtype_desc', hidden: true},
                {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
                {name: 'action',index: 'action', width:80, align: 'center'}
            ],
            sub: [
                {name: 'sendstatus_id', index:'sendstatus_id', hidden: true},
                {name: 'sendingtype_id', index:'sendingtype_id', editable: true, hidden: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).val(formData.goods_id);
                        }
                    }
                },
                {name: 'sendstatus_seq', index:'sendstatus_seq', width: 177, editable: true, edittype:"select", editoptions: {},editrules: { required: true }, align: 'center'},
                {name: 'sendstatus_eng', index: 'sendstatus_eng', width: 250, editable: true, align: 'center' },
                {name: 'sendstatus_th', index: 'sendstatus_th', width: 250, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
                {name: 'deleteflag', index: 'deleteflag', width: 120, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
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

<table id="list-sendingtype"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">S030 : SENDING TYPE & STATUS (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="sendtype_code">Send Type Code: </label>
                <input id="SendTypeCode" name="sendtype_code" type="text" />
            </p>
            <p>
                <label for="sendtype_eng">Send Type (ENG): </label>
                <input id="SendTypeEng" name="sendtype_eng" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body col2">
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
            </p>
            <p>
                <label for="sendtype_th">Send Type (TH): </label>
                <input id="SendTypeTh" name="sendtype_th" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-sendstatus"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;"></fieldset>
    </form>
</div>