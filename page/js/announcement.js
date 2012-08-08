var self = this;
$(function () {
    self.colNames = [
        'announce_id', 'announce_no','announce_head', 'announce_detail',
        'start_date', 'end_date', 'deleteflag', 'action'
    ],
    self.colModel = [
        {name: 'announce_id', index:'announce_id', hidden: true},
        {name: 'announce_no', index: 'announce_no', width: 100, align: 'center'},
        {name: 'announce_head', index: 'announce_head', width: 200, align: 'center'},
        {name: 'announce_detail', index: 'announce_detail', width: 130, align: 'center'},
        {name: 'start_date', index: 'start_date', hidden: true},
        {name: 'end_date', index: 'end_date', hidden: true},
        {name: 'deleteflag', index: 'deleteflag', width: 130, align: 'center'},
        {name: 'action',index: 'action', width:80, align: 'center'}
    ],
    self.getAllURL  =  '../page/common/getDataAll.php',
    self.getByIdURL =  '../page/common/getDataById.php',
    self.saveURL    =  '../page/common/saveData.php',
    self.table      = 'announce',
    self.colId      = self.table + '_id',
    self.mode       = $('#mode'),
    self.grid       = $('#list-' + self.table),
    self.anchor     = $('a[class^="' + self.table + '"]'),
    self.custom     = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete');
    self.date       = $('#date');
    self.by         = $('#by');

    self.grid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : { columns : function () { return self.colNames }, table: function () { return self.table } },
        height      : 350,
        colNames    : self.colNames,
        colModel    : self.colModel,
        rowNum      : 15,
        autowidth   : true,
        shrinkToFit : false,
        rowList     : [10, 20, 30],
        pager       : $('#pager'),
        sortname    : self.colId,
        viewrecords : true,
        sortorder   : 'desc',
        caption     : 'Count Announcement List:'
    })
    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });

    self.anchor.fancybox({
        title: 'Registration process',
        helpers:  {
            title:  null
        },
        beforeLoad: function () {
            var _self = this,
                mode = $(_self.element.innerHTML).get(0).getAttribute('title'),
                buttons = ['save', 'cancle', 'delete', 'recovery'];

            switch (mode) {
                case 'new':
                case 'edit':
                    $.each(buttons, function (index, value) {
                        $('#' + value).show();
                    });

                    if (mode == 'new') {
                        self.mode.val('insert');
                        self.del.hide();
                        self.recovery.hide();
                        self.date.attr({ name: 'create_date'});
                        self.by.attr({ name: 'create_by'});
                    } else {
                        self.mode.val('update');
                        self.date.attr({ name: 'lastupdate_date'});
                        self.by.attr({ name: 'lastupdate_by'});
                    }
                break;

                case 'view':
                    $.each(buttons, function (index, value) {
                        $('#' + value).hide();
                    });
                break;

                default:
                    console.debug('MODE NOT FOUND!!!');
            }

            if (mode == 'new') {
                self.setElementValue(mode);
            } else {
                $.ajax({
                    type        : 'GET',
                    cache       : false,
                    datatype    : 'json',
                    url         : self.getByIdURL,
                    data        : { table: self.table, unit_id: $(_self.element.innerHTML).get(0).getAttribute('value') },
                    success     : function (data) {
                        self.setElementValue(mode, data);
                    }
                });
            }
        },
        afterClose: function () {
            self.custom.clearForm();
        }
    });

    self.custom.bind('submit', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : $(this).serializeArray(),
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });

        return false;
    });

     self.del.bind('click', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : {table: self.table, unit_id: $('#' + self.colId).val(), mode: 'delete', deleteflag: 1 },
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });
    });

    self.recovery.bind('click', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : {table: self.table, unit_id: $('#' + self.colId).val(), mode: 'delete', deleteflag: 0 },
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });
    });
});

self.setElementValue = function (mode, data) {
    var style, text;
    if (mode == 'new') {
        $('#deleteflag').show();
        $('#delflag').remove();
    } else {
        $.each(self.colNames, function (index, column) {
            if (self.colId ==  column) {
                $('#' + column).val(data[column]);
            } else {
                if (column == 'deleteflag') {
                    if (data[column] == 1) {
                        style = 'color:red;font-weight:bold';
                        text  = 'Unuse';
                    } else {
                        style = 'color:green;font-weight:bold';
                        text  = 'Used';
                    }
                    $('#' + column).hide();
                    $('#delflag').remove();
                    $('<input />').attr({id: 'delflag',type: 'text', value: text, style: style, readonly: 'readonly'}).insertAfter('#deleteflag');
                } else {
                    if (mode == 'view') {
                        $('#' + column).val(data[column]).attr('readonly','readonly');
                    } else {
                        $('#' + column).val(data[column]).removeAttr('readonly');
                    }
                }
            }
        });
    }
};

$.fn.clearForm = function () {
    return this.each(function () {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form') {
            return $(':input',this).clearForm();
        }

        if (type == 'text' || type == 'password' || tag == 'textarea') {
            this.value = '';
        } else if (type == 'checkbox' || type == 'radio') {
            this.checked = false;
        } else if (tag == 'select') {
            this.selectedIndex = -1;
        }
    });
};