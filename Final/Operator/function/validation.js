/**
 * Created by kobi.ktk on 12/3/17.
 */

//POST TENDER'S Validation part

function validate() {

    //var x = document.forms["pTender"]["tenderId"].value;
    if(document.pTender.org.value==""){
        alert("Organisation must be filled out");
        document.pTender.org.focus();
        return false;

    }
    if(document.pTender.ttype.value=="-1"){
        alert("Tender Type must be filled out");
        //document.pTender.org.focus();
        return false;

    }
    if(document.pTender.file1.value==""){
        alert("Tender Detail must be filled out");
        document.pTender.file1.focus();
        return false;

    }
    if (document.pTender.tenderId.value == "") {
        alert("Tender ID must be filled out");
        document.pTender.tenderId.focus();
        return false;
    }
    if (document.pTender.biddate.value == "") {
        alert("Bid Submision Date must be filled out");
        document.pTender.biddate.focus();
        return false;
    }
    if (document.pTender.bidtime.value == "") {
        alert("Bid Submision Time must be filled out");
        document.pTender.bidtime.focus();
        return false;
     }
    if(document.pTender.title.value==""){
        alert("Tender Opening Date & Time must be filled out");
        documet.pTender.topendd.focus();
        return false;
    }
    // if(document.pTender.topendt.value==""){
    //     alert("Tender Opening Date & Time must be filled out");
    //     documet.pTender.topendt.focus();
    //     return false;
    // }


        confirm('Tender Id ='+ document.pTender.tenderId.value +'\n Bid Submision Date ='+ document.pTender.biddate.value +'\n Bid Submision Time ='+ document.pTender.bidtime.value + '\n Organisation ='+ document.pTender.org.value +'\n \n Are Sure to Post it? ' );



    return(true);
}


