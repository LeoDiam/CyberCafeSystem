<?php 
	if((time()-$_SESSION['active_at'])>=3420)
    {
        echo "<script> toastr['info']('Your account will be expired a few minutes later.', 'Info');</script>";
    }
    if((time()-$_SESSION['active_at'])>=3600)
    {
        echo "<script> window.location.assign('logout.php');</script>";
    }
?>
<script>
    var no = 0;
    var per = 0;
    setInterval(myInterval, 1000);
    var left_time = "<?php echo $_SESSION['left_time']; ?>";

    function myInterval()
    {
        left_time--;
        $.ajax({
            url: 'ajax.php/time_save',
            method: 'post',
            dataType : 'json',
            data: {
                name: "<?php echo $_SESSION['name']; ?>",
                left_time : left_time
            },
            success : function(data) {
                
            },
            error : function() {
                // toastr['error']('Discover any errors in server.', 'Error');
            }
        });
        console.log(left_time)
        per = ((3600-left_time)/3600) *100;
        console.log(left_time);
        var minutes = Math.floor(left_time / 60);
        new_left_time = left_time - minutes*60;
        var seconds = Math.floor(new_left_time);
        if(minutes < 10) {
            minutes = '0'+minutes;
        }
        if(seconds < 10){
            seconds = '0'+seconds;
        }
        console.log(minutes+':'+seconds);
        // $('#mylefttime').html(new Date().toLocaleTimeString("en-US", {timeZone: "US/Pacific"}));
        if(per >= 30 && per < 60) {
            $('#timebar').removeClass('progress-bar-info');
            $('#timebar').addClass('progress-bar-success');
        }
        if(per >= 60 && per < 90) {
            $('#timebar').removeClass('progress-bar-success');
            $('#timebar').addClass('progress-bar-warning');
        }
        if(per >= 90 && per < 100) {
            $('#timebar').removeClass('progress-bar-warning');
            $('#timebar').addClass('progress-bar-danger');
            if(per == 90){
                toastr['info']('Your account will be expired a few minutes later.', 'Info');
            }
        }
        if(per == 100) {
            
            window.location.assign('logout.php');
        }
        if(per > 100) {
            $('#percent').hide();
        }
        $('#timebar').attr('aria-valuenow', per);
        $('#timebar').attr('style', 'width:'+per+'%');
        $('#percent').html(minutes+' : '+seconds);
        
        
    }
</script>