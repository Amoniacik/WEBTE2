var m_edit = false;
var m_attVar = 0;
var m_beginDay = 0;
var m_endDay = 0;
var m_currUser = 0;
var m_isDelete = false;
var m_year = 0;
var m_month = 0;
var m_openPop;

 function ajaxFunction(){
 var ajaxRequest;  // The variable that makes Ajax possible!

 try{
   // Opera 8.0+, Firefox, Safari
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   // Internet Explorer Browsers
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         // Something went wrong
         alert("Your browser broke!");
         return false;
      }
   }
 }
}

function ToggleEditMode(event)
{
    m_edit = !m_edit;
    var i = 1;
    while (true)
    {
        var obj = document.getElementById("editm"+i);
        if (obj == null)
            break;

        obj.className = m_edit ? "btn btn-success" : "btn btn-danger";
    
        var att_1 = document.getElementById("att"+i+"m1");
        att_1.className = m_edit ? "btn btn-success" : "btn btn-success disabled";
    
        var att_2 = document.getElementById("att"+i+"m2");
        att_2.className = m_edit ? "btn btn-warning" : "btn btn-warning disabled";
    
        var att_3 = document.getElementById("att"+i+"m3");
        att_3.className = m_edit ? "btn btn-primary" : "btn btn-primary disabled";
    
        var att_4 = document.getElementById("att"+i+"m4");
        att_4.className = m_edit ? "btn btn-danger" : "btn btn-danger disabled";
        ++i;
    }

    var obj = document.getElementById("editx");
    obj.className = m_edit ? "btn btn-success" : "btn btn-danger";

    var att_1 = document.getElementById("attx1");
    att_1.className = m_edit ? "btn btn-success" : "btn btn-success disabled";

    var att_2 = document.getElementById("attx2");
    att_2.className = m_edit ? "btn btn-warning" : "btn btn-warning disabled";

    var att_3 = document.getElementById("attx3");
    att_3.className = m_edit ? "btn btn-primary" : "btn btn-primary disabled";

    var att_4 = document.getElementById("attx4");
    att_4.className = m_edit ? "btn btn-danger" : "btn btn-danger disabled";
}

function SaveTable(event)
{
    if (!m_edit)
        return;
}

function ColorMe(event)
{
    if (!m_isDelete)
    {
        switch (m_attVar)
        {
            case 1:
                event.className = "btn-success td_tab";
                break;
            case 2:
                event.className = "btn-warning td_tab";
                break;
            case 3:
                event.className = "btn-primary td_tab";
                break;
            case 4:
                event.className = "btn-danger td_tab";
                break;
        }
    }
    else
        event.className = "btn-default td_tab";

    var otherId;
    if (!isNaN(Number(event.id.split("x")[0])))
        otherId = event.id.replace("x", "m");
    else
        otherId = event.id.replace("m", "x");

    var otherField = document.getElementById(otherId);
    if (!m_isDelete)
    {
        switch (m_attVar)
        {
            case 1:
                otherField.className = "btn-success td_tab";
                break;
            case 2:
                otherField.className = "btn-warning td_tab";
                break;
            case 3:
                otherField.className = "btn-primary td_tab";
                break;
            case 4:
                otherField.className = "btn-danger td_tab";
                break;
        }
    }
    else
        otherField.className = "btn-default td_tab";
}

function OnFieldOver(event)
{
    if (!m_currUser)
        return;

    var x = Number(event.id.split("x")[0]);
    var m = Number(event.id.split("m")[0]);

    if ((!isNaN(x) && x != m_currUser) || (!isNaN(m) && m != m_currUser))
        return;

    ColorMe(event);
}

function CallQuery(id, ttype, date)
{ 
    var year = window.localStorage.getItem("year");
    var month = window.localStorage.getItem("month");
    var date = year+'-'+(month < 10 ? "0" : "")+month+'-'+(date < 10 ? "0" : "")+date;
    var remove = m_isDelete ? 0 : ttype;
    var myData={"id_user":m_currUser,"id_nepritomnost":remove,"id_date":date};

    $.ajax({
        url : "mysql.php",
        type: "POST",
        data : myData,
        success: function(data,status,xhr)
        {
            //if success then just output the text to the status div then clear the form inputs to prepare for new data
            //window.alert("OK");
        }
    
    })
}

window.onload = function ()
{
    var year = window.localStorage.getItem("year");
    if (year !== "undefined")
    {
        var sel = document.getElementById('rok');
        var opts = sel.options;
        for(var opt, j = 0; opt = opts[j]; j++) {
            if(opt.value == year) {
                sel.selectedIndex = j;
                break;
            }
        }
    }

    var month = window.localStorage.getItem("month");
    if (month !== "undefined")
    {
        var sel = document.getElementById('mesiac');
        var opts = sel.options;
        for(var opt, j = 0; opt = opts[j]; j++) {
            if(opt.value == month) {
                sel.selectedIndex = j;
                break;
            }
        }
    }
    document.getElementById('showBtn').addEventListener('click', function()
    {
        var yy = document.getElementById("rok");
        var mm = document.getElementById("mesiac");
    
        window.localStorage.setItem("year", Number(yy[yy.selectedIndex].value));
        window.localStorage.setItem("month", Number(mm[mm.selectedIndex].value));
    }
    );
};

function OnFieldRelease(event)
{
    var x = Number(event.id.split("x")[0]);
    var m = Number(event.id.split("m")[0]);
    if (isNaN(x) && isNaN(m))
        return

    if (x != m_currUser && m != m_currUser)
        return;

    var x_d = Number(event.id.split("x")[1]);
    var m_d = Number(event.id.split("m")[1]);
    if (isNaN(x_d) && isNaN(m_d))
        return;

    m_endDay = isNaN(x_d) ? m_d : x_d;
    
    if (m_beginDay > m_endDay)
    {
        var tmp = m_beginDay;
        m_beginDay = m_endDay;
        m_endDay = tmp;
    }

    for (var i = m_beginDay; i <= m_endDay; ++i)
    {
        var name = m_currUser+(isNaN(x_d) ? "m" : "x")+i;
        var field = document.getElementById(name);
        ColorMe(field);
        CallQuery(m_currUser, m_attVar, i);
        var obj = document.getElementById(m_currUser+(isNaN(m_d) ? "m" : "x")+i);
        if (obj != null)
            ColorMe(obj);
    }

    m_beginDay = 0;
    m_endDay = 0;
    m_currUser = 0;
    m_isDelete = false;
}

function OnFieldClick(event)
{
    if (!m_edit)
        return;

    var e = window.event;
    if (e.which)
        m_isDelete = (e.which == 3);
    else if (e.button)
        m_isDelete = (e.button == 2);

    var u_x = Number(event.id.split("x")[0]);
    var u_m = Number(event.id.split("m")[0]);
    if (isNaN(u_x) && isNaN(u_m))
        return;

    var d_x = Number(event.id.split("x")[1]);
    var d_m = Number(event.id.split("m")[1]);
    if (isNaN(d_x) && isNaN(d_m))
        return;

    m_currUser = isNaN(u_x) ? u_m : u_x;
    m_beginDay = isNaN(d_x) ? d_m : d_x;
    ColorMe(event);
}

function OnAttSel(event)
{
    if (!m_edit)
        return;

    if (m_attVar != 0)
    {
        var att = document.getElementById("attx"+m_attVar);
        switch (m_attVar)
        {
            case 1:
                att.className = "btn btn-success";
                break;
            case 2:
                att.className = "btn btn-warning";
                break;
            case 3:
                att.className = "btn btn-primary";
                break;
            case 4:
                att.className = "btn btn-danger";
                break;
        }

        var i = 1;
        while (true)
        {
            var att = document.getElementById("att"+i+"m"+m_attVar);
            if (att == null)
                break;
    
            switch (m_attVar)
            {
                case 1:
                    att.className = "btn btn-success";
                    break;
                case 2:
                    att.className = "btn btn-warning";
                    break;
                case 3:
                    att.className = "btn btn-primary";
                    break;
                case 4:
                    att.className = "btn btn-danger";
                    break;
            }
            ++i;
        }
    }

    m_attVar = Number(event.id.split("x")[1]);
    if (isNaN(m_attVar))
        m_attVar = Number(event.id.split("m")[1]);

    var att = document.getElementById("attx"+m_attVar);
    switch (m_attVar)
    {
        case 1:
            att.className = "btn btn-success disabled";
            break;
        case 2:
            att.className = "btn btn-warning disabled";
            break;
        case 3:
            att.className = "btn btn-primary disabled";
            break;
        case 4:
            att.className = "btn btn-danger disabled";
            break;
    }

    var i = 1;
    while (true)
    {
        var att = document.getElementById("att"+i+"m"+m_attVar);
        if (att == null)
            break;
    
        switch (m_attVar)
        {
            case 1:
                att.className = "btn btn-success disabled";
                break;
            case 2:
                att.className = "btn btn-warning disabled";
                break;
            case 3:
                att.className = "btn btn-primary disabled";
                break;
            case 4:
                att.className = "btn btn-danger disabled";
                break;
        }
        ++i;
    }
}

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
