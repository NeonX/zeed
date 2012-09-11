<?php
$ref = $_SERVER['HTTP_REFERER'] == 'http://' . $_SERVER['HTTP_HOST'] . '/zeed/page/master/';
?>

<div class="h_line"></div>
<h1>M035 : GOODS PRIZE</h1>

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
        self.table = { main: 'goods', sub: 'goodsprize' };
        self.caption = { main: 'Goods Type List:', sub: 'Goods Prize List:' } ;

        self.columns = {
            main: [
                'goods_id', 'goodstype_id', 'goodstype_th', 'goodscode', 'goodsname_eng', 
                'goodsname_th', 'goodsdesc', 'goodspicture', 'deleteflag', 'action'
            ], 
            sub: [
                'goodsprize_id', 'goods_id', 'prize_id', 'need_point', 
                'prize_qty', 'expire_flag', 'expire_date',  'deleteflag', 'table', 'action'
            ]
        };

        self.colNames = {
            main: [
                'Goods ID', 'Goods Type ID', 'Goods Type Name', 'Goods Code', 'Goods Name (ENG)', 
                'Goods Name (TH)', 'Description', 'Picture', 'Status', 'Action'
            ], 
            sub: [
                'Goods Prize ID', 'Goods ID', 'Prize Id', 'Need Point', 'Prize Qty',
                'Expire Flag', 'Expire Date' , 'Status', 'Table', 'Mode', 'Action'
            ]
        };

        self.colModel = {
            main: [
                {name: 'goods_id', index:'goods_id', hidden: true},
                {name: 'goodstype_id', index:'goodstype_id', hidden: true},
                {name: 'goodstype_th', index:'goodstype_th', hidden: true},
                {name: 'goodscode', index: 'goodscode', width: 100, align: 'center'},
                {name: 'goodsname_eng', index: 'goodsname_eng', width: 200, align: 'center'},
                {name: 'goodsname_th', index: 'goodsname_th', width:200, align: 'center'},
                {name: 'goodsdesc', index:'goodsdesc', hidden: true},
                {name: 'goodspicture', index:'goodspicture', hidden: true},
                {name: 'deleteflag', index: 'deleteflag', width: 60, align: 'center'},
                {name: 'action',index: 'action', width:80, align: 'center'}
            ],
            sub: [
                {name: 'goodsprize_id', index:'goodsprize_id', hidden: true},
                {name: 'goods_id', index:'goods_id', editable: true, hidden: true,
                    editoptions: {
                        dataInit: function(element) {
                            $(element).val(formData.goods_id);
                        }
                    }
                },
                {name: 'prize_id', index:'prize_id', width: 145, editable: true, edittype:"select", editoptions: {},editrules: { required: true }, align: 'center'},
                {name: 'need_point', index: 'need_point', width: 145, editable: true, align: 'center' },
                {name: 'prize_qty', index: 'prize_qty', width: 150, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
                {name: 'expire_flag', index: 'expire_flag', width: 150, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
                {name: 'expire_date', index:'expire_date', width: 105, editable: true,  sorttype:"date", align: 'center'},                
                {name: 'deleteflag', index: 'deleteflag', width: 100, align: 'center', editable: true, edittype:"select", editoptions: {value: "0:Use;1:Not use"}},
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
                },
                {name: 'action',index: 'action', width:90, align: 'center'}
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

<table id="list-goods"></table>
<div id="pager"></div>

<div id="container" style="display:<?php echo $display; ?>">
    <form method="post" id="customForm" action="">
        <fieldset class="modal-header">
            <h3 class="modal-title">M035 : GOODS PRIZE (ADD &amp; EDIT)</h1>
        </fieldset>
        <fieldset class="modal-body col1">
            <p>
                <label for="goods_code">Goods Code: </label>
                <input id="goods_code" name="goods_code" type="text" />
            </p>
            <p>
                <label for="goods_name_eng">Goods Name (ENG): </label>
                <input id="goods_name_eng" name="goods_name_eng" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body col2">
            <p>
                <label for="goods_type">Goods Type: </label>
                <input id="goods_type" name="goods_type" type="text" />
            </p>
            <p>
                <label for="goods_name_th">Goods Name (TH): </label>
                <input id="goods_name_th" name="goods_name_th" type="text" />
            </p>
        </fieldset>
        <fieldset class="modal-body grid">
            <div style="float: right;"><input style="height:24px;width:24px;" id="record_add" type="image" src="../page/images/icons/record-add-24x24.png" /></div>
            <div style="clear:both;"></div>
            <table id="list-goodsprize"></table>
        </fieldset>
        <fieldset class="modal-footer" style="clear:both;"></fieldset>
    </form>
</div>