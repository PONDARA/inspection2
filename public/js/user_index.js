
$(document).ready(function () {
    $('#stuffTable').hide();
    $('#securityGuardTable').hide();
    $('#add_stuff').hide();
    $('#add_security_guard').hide();
    $('#adminTable').show();
    $('#add_admin').show();
    $('#inputGroupSelect01')[0].selectedIndex = "0";
            $('#inputGroupSelect01').change(function () {
                if (this.value == "Admin") {
                    $('#adminTable').show();
                    $('#stuffTable').hide();
                    $('#securityGuardTable').hide();
                    $('#add_admin').show();
                    $('#add_stuff').hide();
                    $('#add_security_guard').hide();
                } else if(this.value=="Stuff") {
                    $('#adminTable').hide();
                    $('#stuffTable').show();
                    $('#securityGuardTable').hide();
                    $('#add_admin').hide();
                    $('#add_stuff').show();
                    $('#add_security_guard').hide();
                }else{
                    $('#adminTable').hide();
                    $('#stuffTable').hide();
                    $('#securityGuardTable').show();
                    $('#add_admin').hide();
                    $('#add_stuff').hide();
                    $('#add_security_guard').show();
                }

            });
        });

