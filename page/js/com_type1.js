/**
 * javacript file com_type1.js
 * Narong Rammanee
 * ranarong@gmail.com
 *
 * Latest Release: Aug 2012
 * 
 */
$(function () {
    self.getAllURL  =  '../page/common/getDataAll.php',
    self.getByIdURL =  '../page/common/getDataById.php',
    self.saveURL    =  '../page/common/saveData.php',
    self.colId      = self.table + '_id',
    self.mode       = $('#mode'),
    self.grid       = $('#list-' + self.table),
    self.anchor     = $('a[class^="' + self.table + '"]'),
    self.form       = $('#customForm'),
    self.recovery   = $('#recovery'),
    self.del        = $('#delete'),
    self.date       = $('#date'),
    self.by         = $('#by'),
    self.options    = $('<option />'),
    self.picture    = $('.picture'),
    self.img        = $('<img />'),
    self.btnSumit   = $('button:submit'),
    self.file       = $('#file');
    self.fakeFile   = $('#ffile');
    self.grid.jqGrid({
        url         : self.getAllURL,
        datatype    : 'json',
        postData    : { columns : function () { return self.columns }, table: function () { return self.table } },
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
        caption     : self.caption
    })
    .navGrid('#pager', { edit: false, add:false, del: false, search: false, refresh: true });

    self.anchor.fancybox({
        title: 'Registration process',
        helpers:  {
            title:  null
        },
        beforeLoad: function () {
            _self = this;
                var mode;
                mode = $(_self.element.innerHTML).get(0).getAttribute('title'),
                buttons = ['save', 'cancle', 'delete', 'recovery'];
                fmode = mode;

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
                        self.picture.empty();
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

            if (mode == 'new' && self.table != 'goods') {
                self.setElementValue(mode);
            } else {
                $.ajax({
                    type        : 'GET',
                    cache       : false,
                    datatype    : 'json',
                    url         : self.getByIdURL,
                    data        : { table: self.table, id: $(_self.element.innerHTML).get(0).getAttribute('value') },
                    success     : function (data) {
                        self.setElementValue(mode, data);
                    }
                });
            }
        },
        afterClose: function () {
            self.form.clearForm();
        }
    });

    self.file.bind('change', function () {
        self.fakeFile.val($(this).val());
    });

    self.form.bind('submit', function () {
        if (self.table == 'goods') {
            console.debug(self.fakeFile.val());
            var img_name = self.fakeFile.val().replace(/C:\\fakepath\\/i, '');
            if (self.fakeFile.val() != '') {
                var gpic = [{ name: 'goodspicture', value: img_name }];
                serialize = $.merge($(this).serializeArray(), gpic);
                serialize.swap(6, 9)
            } else {
                serialize = $(this).serializeArray();
            }
            $.ajax({
                type        : 'POST',
                cache       : false,
                url         : self.saveURL,
                data        : serialize,
                success     : function (data) {
                    $.fancybox(data);
                    self.grid.trigger('reloadGrid');
                }
            });

            return self.clickupload();
        } else {
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
        }
    });

    self.clickupload = function () {
        $('#file').val();
        return true;
    }

    window.parent.uploadok = function (pathfile) {
        pathfile = '../page/' + pathfile;
        self.picture.empty().append(self.img.clone().attr({ src: pathfile, width: 320, height: 250 }));
        return true ;
    }

     self.del.bind('click', function () {
        $.ajax({
            type        : 'POST',
            cache       : false,
            url         : self.saveURL,
            data        : { table: self.table, id: $('#' + self.table + '_id').val(), mode: 'delete', deleteflag: 1 },
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
            data        : { table: self.table, id: $('#' + self.table + '_id').val(), mode: 'delete', deleteflag: 0 },
            success     : function (data) {
                $.fancybox(data);
                self.grid.trigger('reloadGrid');
            }
        });
    });
});

self.setElementValue = function (mode, data) {
    console.debug(mode, data);
    dd = data;
    var style, text;
    if (mode == 'new') {
        $('#deleteflag').show();
        $('#delflag').remove();

        $.each(self.columns, function (index, column) {
            $('#' + column).removeAttr('readonly');
        });

        if (typeof data !== 'undefined') {
            $('#text_goodstype_id').remove();
            $('#goodstype_id').show().empty().append(
                self.options.clone().val(-1).text('-- Please Select --')
            );

            $.each(data.goodstype, function(k, obj) {
                $('#goodstype_id').append(
                    self.options.clone()
                        .val(obj.goodstype_id)
                        .text(obj.goodstype_eng)
                );
            });

            $('#goodstype_id').val(data.goodstype_id);
        }

    } else {
        $.each(self.columns, function (index, column) {
            if (self.colId == column) {
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
                    $('<input />').attr({
                        id: 'delflag',
                        type: 'text',
                        value: text,
                        style: style,
                        readonly: 'readonly'
                    }).insertAfter('#deleteflag');
                } else if (column == 'goodstype_id') {
                    if (mode == 'edit') {
                        $('#text_goodstype_id').remove();
                        $('#goodstype_id').show().empty().append(
                            self.options.clone().val(-1).text('-- Please Select --')
                        );
                        $.each(data.goodstype, function(k, obj) {
                            $('#goodstype_id').append(
                                self.options.clone()
                                    .val(obj.goodstype_id)
                                    .text(obj.goodstype_eng)
                            );
                        });

                        $('#goodstype_id').val(data.goodstype_id);
                    } else {
                        $('#text_goodstype_id').remove();
                        $('#goodstype_id').hide();
                        $('<input />').attr({
                            id: 'text_goodstype_id',
                            type: 'text',
                            value: data.goodstype[parseInt(data['goodstype_id']) - 1 ].goodstype_th,
                            readonly: 'readonly'
                        }).insertAfter('#goodstype_id');
                    }
                } else if (column == 'goodspicture') {
                    self.picture.append(self.img.attr({ src:'../page/images_upload/thumb/zeed_' + data.goodspicture, width: 320, height: 250 }));
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

Array.prototype.swap = function (x,y) {
    var t = this[x];
    this[x] = this[y];
    this[y] = t;
    return this;
}