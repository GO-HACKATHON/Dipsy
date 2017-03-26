function checkFNameLength(fn)
    {
        if (fn.value.length < 1)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            fn.insertAdjacentHTML('afterend', '<div id="warnFName" class="alert alert-danger alert-dismissable fade in"><strong>Please enter your firstname</strong></div>');                                                        
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
        }
    }
    
    function checkLNameLength(ln)
    {
        if (ln.value.length < 1)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            ln.insertAdjacentHTML('afterend', '<div id="warnFName" class="alert alert-danger alert-dismissable fade in"><strong>Please enter your lastname</strong></div>');                                                        
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
        }
    }

    function checkNameLength(ln)
    {
        if (ln.value.length < 1)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            ln.insertAdjacentHTML('afterend', '<div id="warnName" class="alert alert-danger alert-dismissable fade in"><strong>Please enter your name</strong></div>');                                                        
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
        }
    }
    
    function checkUNameLength(un)
    {
        var illegalchars = /\W/;
        if (un.value.length < 1)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            un.insertAdjacentHTML('afterend', '<div id="warnUName" class="alert alert-danger alert-dismissable fade in"><strong>Please enter your username</strong></div>');                                                        
        }
        else if (un.value.length < 5)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            un.insertAdjacentHTML('afterend', '<div id="warnUName" class="alert alert-danger alert-dismissable fade in"><strong>Username must be at least 5 characters</strong></div>');                                                        
        }
        else if(illegalchars.test(un.value))
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            un.insertAdjacentHTML('afterend', '<div id="warnUName" class="alert alert-danger alert-dismissable fade in"><strong>Username can only contains letters, numbers, and underscores</strong></div>'); 
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
        }
    } 

    
    function verifyEmail(em)
    {
        var status = false;     
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (em.value.search(emailRegEx) == -1)
            {
                var btn = document.getElementById('btn_signin');
                btn.disabled = true;
                em.insertAdjacentHTML('afterend', '<div id="warnEmail" class="alert alert-danger alert-dismissable fade in"><strong>Please enter a valid email address</strong></div>');
            }
            else
            {
                var btn = document.getElementById('btn_signin');
                btn.disabled = false;
                status = true;
             }
            return status;
    }   
    
    function checkPasswdLength(el)
    {
        if (el.value.length < 8)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            el.insertAdjacentHTML('afterend', '<div id="warn" class="alert alert-danger alert-dismissable fade in"><strong>Password must be at least 8 characters</strong></div>');                                                        
        }
        else if (el.value.length > 20)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            el.insertAdjacentHTML('afterend', '<div id="warn" class="alert alert-danger alert-dismissable fade in"><strong>Only 20 characters allowed, you entered more, huhuhu :(</strong></div>');                                                        
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
        }
    }

    function checkPasswdULength(el)
    {
        if (el.value.length < 8 && el.value.length > 0)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            el.insertAdjacentHTML('afterend', '<div id="warnPasswdU" class="alert alert-danger alert-dismissable fade in"><strong>Password must be at least 8 characters</strong></div>');                                                        
        }
        else if (el.value.length > 20)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            el.insertAdjacentHTML('afterend', '<div id="warnPasswdU" class="alert alert-danger alert-dismissable fade in"><strong>Only 20 characters allowed, you entered more, huhuhu :(</strong></div>');                                                        
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
        }
    }
    /*
    function kedua(pwd)
    {
        var p1 = getElementById('password1');
        p1.insertAdjacentHTML('afterend', p1.value);
        pwd.insertAdjacentHTML('afterend', pwd.value);
        if (pwd.value != p1.value)
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = true;
            pwd.insertAdjacentHTML('afterend', '<div id="warn2" class="alert alert-danger alert-dismissable fade in"><strong>Make sure you enter the right password</strong></div>');                                                        
        }
        else
        {
            var btn = document.getElementById('btn_signin');
            btn.disabled = false;
            pwd.insertAdjacentHTML('afterend', '<div id="warn2" class="alert alert-danger alert-dismissable fade in"><strong>Match</strong></div>');  
        }
    }
    */
    function dismissFName()
    {
        $("#warnFName").fadeTo(200, 500).slideUp(500, function(){
            $("#warnFName").alert('close');
        });
    }
    
    function dismissLName()
    {
        $("#warnLName").fadeTo(200, 500).slideUp(500, function(){
            $("#warnLName").alert('close');
        });
    }
    
    function dismissLName()
    {
        $("#warnName").fadeTo(200, 500).slideUp(500, function(){
            $("#warnName").alert('close');
        });
    }

    function dismissUName()
    {
        $("#warnUName").fadeTo(200, 500).slideUp(500, function(){
            $("#warnUName").alert('close');
        });
    }

    function dismissEmail()
    {
        $("#warnEmail").fadeTo(200, 500).slideUp(500, function(){
            $("#warnEmail").alert('close');
        });
    }

    function dismissPasswd()
    {
        $("#warn").fadeTo(200, 500).slideUp(500, function(){
            $("#warn").alert('close');
        });
    }

    function dismissPasswdU()
    {
        $("#warnPasswdU").fadeTo(200, 500).slideUp(500, function(){
            $("#warnPasswdU").alert('close');
        });
    }
    /*
    function dismissPasswd2()
    {
        $("#warn2").fadeTo(200, 500).slideUp(500, function(){
            $("#warn2").alert('close');
        });
    }
    */
