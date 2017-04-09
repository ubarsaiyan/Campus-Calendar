window.onload=function(){
    //initialise variables
    var gid; //google ID
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth(); //January is 0
    var yyyy = today.getFullYear();
    var date1 = new Date(yyyy,mm,1);    
    var day1 = date1.getDay();
    if(day1===0)
        day1=7;
    var daysInMonth=[31,28,31,30,31,30,31,31,30,31,30,31];
    if(yyyy%400===0||(yyyy%4===0&&yyyy%100!==0)) 
        daysInMonth[1]=29;
    //put dates in the calendar accoding to the month and add click events
    var cell=document.getElementById("calendarTable").getElementsByTagName("td");
    for(var i=day1-1,d=1;d<=daysInMonth[mm];i++,d++){
        cell[i].innerHTML=d;
        cell[i].onclick = function(){
            showPopup(this,this.innerHTML,mm,yyyy);
        }
    }
    var clickedCell;
    //var clickedDate = new Date();
    //show event form popup
    function showPopup(cCell,d,m,y){
        document.getElementById("eventPopup").style.display="block";
        m++;
        if(m<10) 
            m="0"+m;
        if(d<10)
            d="0"+d;
        clickedCell=cCell;
        //clickedDate=Date(y,m,d);
        document.getElementById("eventDate").value=y+"-"+m+"-"+d;
        //window.alert(y+"-"+m+"-"+d);
    }
    //make present date different bgcolor
    cell[day1+dd-2].style.backgroundColor="#d9d9d9";
    //convert month number to name
    var mname;
    switch (mm+1) {
        case 1: mname = "January"; break;
        case 2: mname = "February"; break;
        case 3: mname = "March"; break;
        case 4: mname = "April"; break;
        case 5: mname = "May"; break;
        case 6: mname = "June"; break;
        case 7: mname = "July"; break;
        case 8: mname = "August"; break;
        case 9: mname = "September"; break;
        case 10: mname = "October"; break;
        case 11: mname = "November"; break;
        case 12: mname = "December"; break; 
    }
    //display month and year at top of calendar
    document.getElementById("heading2").innerHTML=mname+", "+yyyy; 
    //add close popup funtionality
    document.getElementById("closePopupButton").onclick = function(){
        document.getElementById("eventPopup").style.display="none";
    }
    //show event on calendar
    document.getElementById("eventSave").onclick = function(){
        var eventTitle = document.getElementById("eventTitle").value;
        var node = document.createElement("DIV");
        var textnode = document.createTextNode(eventTitle);
        node.appendChild(textnode);
        clickedCell.appendChild(node);
        node.className += " event";
        //document.getElementById("eventPopup").style.display="none";
    }
    gapi.load('auth2', function () {
        auth2 = gapi.auth2.init();
        // Sign the user in, and then retrieve their ID.
        auth2.signIn().then(function () {
            gid=auth2.currentUser.get().getBasicProfile().getId();
            console.log(gid);
            document.getElementById("googleID").value=gid;
        });
    });
    /*
    var email;
    window.onLoadCallback = function(){
        if (auth2.isSignedIn.get()) {
        var profile = auth2.currentUser.get().getBasicProfile();
        console.log('ID: ' + profile.getId());
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());
        email=profile.getEmail();
        }
    }
    */
    /*function onSignIn(googleUser) {
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("done");
    }
    */
}