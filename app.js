$(function(){
    //頁面進來先載入一次
    fnLoadData();

    //每五秒更新資料
    setInterval(function() {
        fnLoadData()
    }, 5*1000); 

    //載入資料
    function fnLoadData(){
        $.ajax({
            url: "api.php",            
            type: "GET",
            cache:false,
            dataType: 'json',
            contentType: "application/json",
            success: function (data) {

                $("#result").val(data);

            },

            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }

})