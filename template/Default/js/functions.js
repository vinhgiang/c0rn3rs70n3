$(document).ready(function(){

    $("#file-import").fileinput({
        uploadUrl: $("#file-import").data('url'),
        uploadAsync: false,
        showPreview: false,
        allowedFileExtensions: ['csv', 'xls', 'xlsx'],
    }).on('fileuploaderror', function (event, data, msg) {
        $('.pop-msg').html(msg);
        $('.alert-danger').removeClass('hidden');
    }).on('fileclear', function(event) {
        $('.alert-danger').addClass('hidden');
    }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
        var result = "<p>New Product: " + data.response.new + "</p>" +
                "<p>Updated: " + data.response.updated + "</p>" +
                "<p>Duplicated: " + data.response.duplicated + "</p>";

        $('.pop-msg').html(result);
        $('.alert-info').removeClass('hidden');
        $('#file-import').fileinput('reset');
    });

    $('#formDetail, #formCreate, .ajax-form').submit(function () {
        var url = $(this).attr('action');
        $.post(url, $(this).serialize(), function (response) {
            if(response.code == 1) {
                window.location.reload();
            } else {
                $('.pop-msg').html(response.msg);
                $('.alert-danger').removeClass('hidden');

                $('.modal').modal('hide')
            }
        }, 'JSON');
        return false;
    });

    $('.confirm-box').on('click', function () {
        var $form = $(this).closest('form');
        console.log($form);
        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        }).one('click', '.btn-confirmed', function(e) {
            $form.trigger('submit');
        });
    });

    $('.cbSchool').on('change', function() {
        var schoolCode = $(this).val();
        $('.cbSchool').val(schoolCode);
        $('.schoolCode').val(schoolCode);
        return false;
    });

    // search student dialog
    $('#search-student-dialog').submit(function() {
        var url = $(this).attr('action');
        var resultArea = $(this).parent().find('.result');

        $.post(url, $(this).serialize(), function (response) {
            $(resultArea).html(response);
        });
        return false;
    });

    $(document).on('click', '.select-referrer', function () {
        var studentCode = $(this).data('student-code');
        $('#reference').val(studentCode);
    });
});

/* Common script */

function isEmail(s) {
    if (s.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]{2,4}$/) != -1)
        return true;
    return false;
}

function resetForm(formID){
    $("#" + formID).each (function() { this.reset(); });
    return false;
}

function split( val ) {
    return val.split( /,\s*/ );
}
function extractLast( term ) {
    return split( term ).pop();
}

function checkExtensions(fileName){
    if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(fileName)) {
        return false;
    }
}

function isDate(txtDate){
    var currVal = txtDate;
    if(currVal == '')
       return false;
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{1,4})$/;
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    if (dtArray == null)
        return false;
    //Checks for mm/dd/yyyy format.
    dtMonth = dtArray[1];
    dtDay= dtArray[3];
    dtYear = dtArray[5];
    if (dtMonth < 1 || dtMonth > 12)
        return false;
    else if (dtDay < 1 || dtDay> 31)
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
        return false;
    else if (dtMonth == 2){
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap))
            return false;
    }
  return true;
}

function get_os() {
    var OsName = navigator.appVersion;

    if (navigator.appVersion.indexOf("Win") != -1) OsName="Windows";
    if (navigator.appVersion.indexOf("Mac") != -1) OsName="MacOS";
    if (navigator.appVersion.indexOf("X11") != -1) OsName="UNIX";
    if (navigator.appVersion.indexOf("Linux") != -1) OsName="Linux";

    return OsName
}

function get_browser() {
    var nVer = navigator.appVersion;
    var nAgt = navigator.userAgent;
    var browserName  = navigator.appName;
    var fullVersion  = '' + parseFloat(navigator.appVersion); 
    var majorVersion = parseInt(navigator.appVersion,10);
    var nameOffset, verOffset, ix;

    // In Opera, the true version is after "Opera" or after "Version"
    if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
     browserName = "Opera";
     fullVersion = nAgt.substring(verOffset+6);
     if ((verOffset=nAgt.indexOf("Version"))!=-1) 
       fullVersion = nAgt.substring(verOffset+8);
    }
    // In MSIE, the true version is after "MSIE" in userAgent
    else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
     browserName = "Microsoft Internet Explorer";
     fullVersion = nAgt.substring(verOffset+5);
    }
    // In Chrome, the true version is after "Chrome" 
    else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
     browserName = "Chrome";
     fullVersion = nAgt.substring(verOffset+7);
    }
    // In Safari, the true version is after "Safari" or after "Version" 
    else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
     browserName = "Safari";
     fullVersion = nAgt.substring(verOffset+7);
     if ((verOffset=nAgt.indexOf("Version"))!=-1) 
       fullVersion = nAgt.substring(verOffset+8);
    }
    // In Firefox, the true version is after "Firefox" 
    else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
     browserName = "Firefox";
     fullVersion = nAgt.substring(verOffset+8);
    }
    // In most other browsers, "name/version" is at the end of userAgent 
    else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
              (verOffset=nAgt.lastIndexOf('/')) ) 
    {
     browserName = nAgt.substring(nameOffset,verOffset);
     fullVersion = nAgt.substring(verOffset+1);
     if (browserName.toLowerCase()==browserName.toUpperCase()) {
      browserName = navigator.appName;
     }
    }
    // trim the fullVersion string at semicolon/space if present
    if ((ix=fullVersion.indexOf(";"))!=-1)
       fullVersion=fullVersion.substring(0,ix);
    if ((ix=fullVersion.indexOf(" "))!=-1)
       fullVersion=fullVersion.substring(0,ix);

    majorVersion = parseInt(''+fullVersion,10);
    if (isNaN(majorVersion)) {
     fullVersion  = ''+parseFloat(navigator.appVersion); 
     majorVersion = parseInt(navigator.appVersion,10);
    }

    return browserInfo = {name: browserName, version: fullVersion, userAgent: navigator.userAgent, width: screen.width, height: screen.height }
}