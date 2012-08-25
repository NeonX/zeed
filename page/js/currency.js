/**
 * javacript file com_type2.js
 * Narong Rammanee
 * ranarong@gmail.com
 *
 * Latest Release: Aug 2012
 * 
 */
$(function () {
    self.getAllURL    =  '../page/common/getDataAll.php',
    self.saveURL      =  '../page/common/saveData.php',
    self.getAllT2URL  =  '../page/common/getDataAllT2.php',
    self.getByIdT2URL =  '../page/common/getDataByIdT2.php',
    self.saveT2URL    =  '../page/common/saveDataT2.php',
    self.mColId      = self.table.main + '_id',
    self.sColId      = self.table.sub + '_id',
    self.mGrid       = $('#list-' + self.table.main),
    self.sGrid       = $('#list-' + self.table.sub),
    self.mData       = null,
    self.formData    = null,

    self.mode       = $('#mode'),
    self.anchor     = $('a[class^="' + self.table.main + '"]'),
    self.form       = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete'),
    self.date       = $('#date'),
    self.by         = $('#by'),
    self.options    = $('<option />'),
    self.lastsel2   = null,
    self.rowCounter = 0;

    self.mGrid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : { columns : function () { return self.columns.main }, table: function () { return self.table.main } },
        height      : 350,
        colNames    : self.colNames.main,
        colModel    : self.colModel.main,
        gridComplete: function () {
            self.mData = self.mGrid.getRowData();
        },
        rowNum      : 15,
        autowidth   : true,
        shrinkToFit : false,
        rowList     : [10, 20, 30],

        pager       : $('#pager'),
        sortname    : self.mColId,
        viewrecords : true,
        sortorder   : 'asc',
        caption     : self.caption.main
    })
    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });

    self.anchor.fancybox({
        title: 'Registration process',
        helpers:  {
            title:  null
        },
        beforeLoad: function () {
            var _self = this,
             _id = $(_self.element.innerHTML).get(0).getAttribute('value');

            $.ajax({
                type        : 'GET',
                cache       : false,
                datatype    : 'json',
                url         : self.getByIdT2URL,
                data        : { table: self.table.sub, id: _id,  columns: self.columns.sub },
                success     : function (data) {
                    rec = data;

                    $.each(self.mData, function (index, obj) {
                        if (_id == obj.currency_id) {
                            self.formData = self.mData[index];
                        }
                    });

                    self.rowCounter = rec.last_row + 1;

                    $('#currcode').val(self.formData.currcode);
                    $('#currdesceng').val(self.formData.currdesceng);
                    $('#currabbveng').val(self.formData.currabbveng);
                    $('#deleteflag').val(self.formData.deleteflag);
                    $('#currdescth').val(self.formData.currdescth);
                    $('#currabbvth').val(self.formData.currabbvth);

                    self.sGrid.jqGrid('setGridParam', {
                        url         : self.getAllT2URL,
                        postData    : { columns : function () { return self.columns.sub }, id: function () { return _id}, table: function () { return self.table.sub } }
                    }).trigger("reloadGrid");

                    self.sGrid.jqGrid({
                        url         : self.getAllT2URL,
                        datatype    : 'json',
                        postData    : { columns : function () { return self.columns.sub }, id: function () { return _id}, table: function () { return self.table.sub } },
                        height      : 250,
                        colNames    : self.colNames.sub,
                        colModel    : self.colModel.sub,
                        gridComplete: function () {
                            var ids = self.sGrid.jqGrid('getDataIDs');
                            for(var i=0;i < ids.length;i++){
                                var cl = ids[i];
                                be = "<input class='row-edit' style='height:16px;width:16px;' type='image' src='../page/images/icons/form-edit-16x16.png' onclick=\"jQuery('#list-" + self.table.sub + "').editRow('"+cl+"');\"  />"; 
                                se = "<input style='margin-left: 5px;height:16px;width:16px;' type='image' src='../page/images/icons/disk-16x16.png' onclick=\"jQuery('#list-" + self.table.sub + "').saveRow('"+cl+"');\"  />"; 
                                ce = "<input style='margin-left: 5px;height:16px;width:16px;' type='image' src='../page/images/icons/cancel-16x16.png' onclick=\"jQuery('#list-" + self.table.sub + "').restoreRow('"+cl+"');\" />";
                                self.sGrid.jqGrid('setRowData',ids[i],{action:be+se+ce});
                            }

                            $('.row-edit').bind('click', function () {
                                self.smode = 'update';
                            });

                        },
                        editurl     : self.saveT2URL,
                        rowNum      : 10,
                        autowidth   : true,
                        shrinkToFit : false,
                        rowList     : [10, 20, 30],
                        pager       : $('#pager'),
                        sortname    : self.sColId,
                        viewrecords : true,
                        sortorder   : 'asc',
                        caption     : self.caption.sub
                    })
                    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });
                }
            });
        },
        beforeClose: function () {
            self.smode = 'update';
        }
    });

    $('#record_add').bind('click', function () {
        self.smode = 'insert';
        self.sGrid.addRowData(self.rowCounter, {});
        self.sGrid.editRow(self.rowCounter);
        self.rowCounter++;
    });

    self.form.bind('submit', function () {
        return false;
    });
});

var lookupUnit = function (data) {
    var tmp = [], str = '';
    $.each(data, function (index, obj) {
        tmp.push(obj.unit_id + ':' + obj.unitnameeng)
    });

    return tmp.join(';');
};

var lookupCurrency = function (data) {
    var tmp = [], str = '';
    $.each(data, function (index, obj) {
        tmp.push(obj.currency_id + ':' + obj.currabbveng)
    });

    return tmp.join(';');
};

Array.prototype.swap = function (x,y) {
    var t = this[x];
    this[x] = this[y];
    this[y] = t;
    return this;
}