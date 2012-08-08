<div class="h_line"></div>
<h1>M010 : COUNT UNIT</h1>
<div style="float: right;"> <a class="goods" href="#customForm"><img type="image" src="../page/images/icons/new-form-24x24.png" title="new" alt="new" value="0" /></a></div>

<div class="cleaner"></div>
<link rel="stylesheet" href="../page/css/form.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../page/js/fancyBox/source/jquery.fancybox.css" type="text/css" media="screen" />

<script type="text/javascript" src="../page/js/fancyBox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="../page/js/goods.js"></script>

<table id="list-goods"></table>
<div id="pager"></div>

<div id="container" style="display:none">
    <form method="post" id="customForm" action="">
        <fieldset>
            <h1>0M10 : COUNT UNIT</h1>
            <p>
                <label for="goodscode">Goods Code: </label>
                <input id="goodscode" name="goodscode" type="text" />
                <span id="goodscode_info">Goods Code is require!</span>
            </p>
            <p>
                <label for="goodsname_eng">Goods Name (ENG): </label>
                <input id="goodsname_eng" name="goodsname_eng" type="text" />
                <span id="goodsname_eng_info">Goods Name (ENG) is require!</span>
            </p>
            <p>
                <label for="goodsname_th">Goods Name (TH): </label>
                <input id="goodsname_th" name="goodsname_th" type="text" />
                <span id="goodsname_th_info">Goods Name (TH) is require!</span>
            </p>
            <p>
                <label for="goodstype_id">Good Type ID: </label>
                <select id="goodstype_id" name="goodstype_id">
                    <option value="-1"> -- Please Select -- </option>
                </select>
                <span id="deleteflag_info">Good Type ID require!</span>
            </p>
            <p>
                <label for="deleteflag">Use Status: </label>
                <select id="deleteflag" name="deleteflag">
                    <option value="-1"> -- Please Select -- </option>
                    <option value="0">Used</option>
                    <option value="1">Unuse</option>
                </select>
                <span id="deleteflag_info">Use Status is require!</span>
            </p>
            <p>
                <label for="goodsdesc">Descrition: </label>
                <textarea id="goodsdesc" name="goodsdesc" cols="" rows=""></textarea>
            </p>
            <p class="btn">
                <input id="table" name="table" type="hidden" value="goods" />
                <input id="goods_id" name="goods_id" type="hidden" value="0" />
                <input id="mode" name="mode" type="hidden" value="insert" />
                <input id="save" name="save" type="submit" value="Save" />
                <input id="cancle" name="cancle" type="reset" value="Cancle" />
                <input id="delete" name="delete" type="button" value="Delete" />
                <input id="recovery" name="recovery" type="button" value="Recovery" />
            </p>
        </fieldset>
    </form>
</div>